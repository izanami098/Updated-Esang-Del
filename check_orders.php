<?php
require_once 'auth/database.php';
header('Content-Type: application/json');

$result = [
    'orders_count' => 0,
    'delivered_orders' => 0,
    'has_total_amount' => false,
    'sample_orders' => [],
    'error' => null
];

try {
    // Check if orders exist
    $countQuery = "SELECT COUNT(*) as total FROM orders";
    $countResult = $con->query($countQuery);
    if ($countResult) {
        $result['orders_count'] = $countResult->fetch_assoc()['total'];
    }
    
    // Check delivered orders
    $deliveredQuery = "SELECT COUNT(*) as total FROM orders WHERE order_status = 'delivered'";
    $deliveredResult = $con->query($deliveredQuery);
    if ($deliveredResult) {
        $result['delivered_orders'] = $deliveredResult->fetch_assoc()['total'];
    }
    
    // Check if total_amount column exists
    $columnsQuery = "SHOW COLUMNS FROM orders LIKE 'total_amount'";
    $columnsResult = $con->query($columnsQuery);
    $result['has_total_amount'] = ($columnsResult && $columnsResult->num_rows > 0);
    
    // Get sample orders
    $sampleQuery = "SELECT order_id, user_id, order_status, order_date, total_amount FROM orders LIMIT 5";
    $sampleResult = $con->query($sampleQuery);
    if ($sampleResult && $sampleResult->num_rows > 0) {
        while ($row = $sampleResult->fetch_assoc()) {
            $result['sample_orders'][] = $row;
        }
    }
    
} catch (Exception $e) {
    $result['error'] = $e->getMessage();
}

$con->close();
echo json_encode($result, JSON_PRETTY_PRINT);
?>
