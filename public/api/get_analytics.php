<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../auth/database.php';

$period = $_GET['period'] ?? 'week';
$response = [
    'success' => false,
    'stats' => [],
    'orders' => [],
    'trend' => []
];

try {
    // Get overall stats
    $statsQuery = "SELECT 
                    COUNT(*) as total_orders,
                    SUM(total_amount) as total_revenue,
                    AVG(total_amount) as avg_order_value
                   FROM orders";
    
    $statsResult = $con->query($statsQuery);
    if ($statsResult) {
        $response['stats'] = $statsResult->fetch_assoc();
    }

    // Get orders by status
    $statusQuery = "SELECT order_status, COUNT(*) as count 
                    FROM orders 
                    GROUP BY order_status";
    
    $statusResult = $con->query($statusQuery);
    $statusData = [];
    if ($statusResult) {
        while ($row = $statusResult->fetch_assoc()) {
            $statusData[$row['order_status']] = $row['count'];
        }
    }
    $response['status_breakdown'] = $statusData;

    // Get recent orders
    $ordersQuery = "SELECT o.order_id, o.user_id, o.order_status, o.order_date, o.total_amount, 
                           CONCAT(u.first_name, ' ', u.last_name) as customer_name
                    FROM orders o
                    LEFT JOIN users u ON o.user_id = u.user_id
                    ORDER BY o.order_date DESC 
                    LIMIT 10";
    
    $ordersResult = $con->query($ordersQuery);
    if ($ordersResult) {
        while ($row = $ordersResult->fetch_assoc()) {
            $response['orders'][] = $row;
        }
    }

    // Get trend data (weekly, monthly, or yearly based on period)
    if ($period === 'month') {
        $trendQuery = "SELECT DATE(order_date) as date, COUNT(*) as orders, SUM(total_amount) as revenue
                       FROM orders
                       WHERE order_date >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                       GROUP BY DATE(order_date)
                       ORDER BY date ASC";
    } elseif ($period === 'yearly') {
        $trendQuery = "SELECT DATE_FORMAT(order_date, '%Y-%m') as date, COUNT(*) as orders, SUM(total_amount) as revenue
                       FROM orders
                       WHERE order_date >= DATE_SUB(NOW(), INTERVAL 365 DAY)
                       GROUP BY DATE_FORMAT(order_date, '%Y-%m')
                       ORDER BY date ASC";
    } else {
        $trendQuery = "SELECT DATE(order_date) as date, COUNT(*) as orders, SUM(total_amount) as revenue
                       FROM orders
                       WHERE order_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                       GROUP BY DATE(order_date)
                       ORDER BY date ASC";
    }
    
    $trendResult = $con->query($trendQuery);
    if ($trendResult) {
        while ($row = $trendResult->fetch_assoc()) {
            $response['trend'][] = $row;
        }
    }

    $response['success'] = true;

} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>
