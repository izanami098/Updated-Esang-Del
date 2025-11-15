<?php
require_once 'auth/database.php';
header('Content-Type: application/json');

$response = [
    'users' => 0,
    'products' => 0,
    'orders' => 0,
    'details' => []
];

try {
    // Count users
    $userResult = $con->query("SELECT COUNT(*) as count FROM users");
    $response['users'] = $userResult->fetch_assoc()['count'];
    
    // Count products
    $productResult = $con->query("SELECT COUNT(*) as count FROM products");
    $response['products'] = $productResult->fetch_assoc()['count'];
    
    // Count orders
    $orderResult = $con->query("SELECT COUNT(*) as count FROM orders");
    $response['orders'] = $orderResult->fetch_assoc()['count'];

    // Get sample order data
    $ordersQuery = "SELECT * FROM orders LIMIT 5";
    $ordersResult = $con->query($ordersQuery);
    
    if ($ordersResult) {
        $response['details'][] = "Orders in database:";
        while ($row = $ordersResult->fetch_assoc()) {
            $response['details'][] = $row;
        }
    }

} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>
