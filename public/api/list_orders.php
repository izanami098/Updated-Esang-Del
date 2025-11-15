<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../auth/database.php';

$response = ['success' => false, 'orders' => [], 'error' => null];

try {
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 20;

    $sql = "SELECT o.order_id, o.user_id, o.product_id, o.quantity, o.order_status, o.order_date, o.total_amount, 
                   CONCAT(u.first_name, ' ', u.last_name) as customer_name
            FROM orders o
            LEFT JOIN users u ON o.user_id = u.user_id
            ORDER BY o.order_date DESC
            LIMIT " . $limit;

    $res = $con->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $response['orders'][] = $row;
        }
    }

    $response['success'] = true;
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
