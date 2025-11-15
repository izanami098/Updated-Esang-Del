<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../auth/database.php';

$response = ['success' => false, 'product' => null, 'error' => null];

try {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
        throw new Exception('Missing or invalid product id');
    }

    $stmt = $con->prepare('SELECT product_id, product_name, product_description, product_image, unit_price, stock, category, is_available FROM products WHERE product_id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res && $res->num_rows > 0) {
        $response['product'] = $res->fetch_assoc();
        $response['success'] = true;
    } else {
        throw new Exception('Product not found');
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>
