<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../auth/database.php';
require_once __DIR__ . '/_helpers.php';

// Enforce API key for write actions
require_api_key_or_die();

$response = ['success' => false, 'order_id' => null, 'error' => null];

// Expect JSON payload or form data
$input = json_decode(file_get_contents('php://input'), true);
if (!$input) {
    $input = $_POST;
}

$user_id = isset($input['user_id']) ? intval($input['user_id']) : null;
$product_id = isset($input['product_id']) ? intval($input['product_id']) : null;
$quantity = isset($input['quantity']) ? intval($input['quantity']) : 1;

if (!$user_id || !$product_id) {
    echo json_encode(['success' => false, 'error' => 'Missing user_id or product_id']);
    exit;
}

try {
    // Begin transaction
    $con->begin_transaction();

    // Get product price and stock
    $stmt = $con->prepare('SELECT unit_price, stock FROM products WHERE product_id = ? FOR UPDATE');
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if (!$res || $res->num_rows === 0) {
        throw new Exception('Product not found');
    }
    $prod = $res->fetch_assoc();
    $price = floatval($prod['unit_price']);
    $stock = intval($prod['stock']);

    if ($stock < $quantity) {
        throw new Exception('Insufficient stock');
    }

    $total = $price * $quantity;

    // Insert order
    $ins = $con->prepare('INSERT INTO orders (user_id, product_id, quantity, order_status, order_date, total_amount) VALUES (?, ?, ?, ?, NOW(), ?)');
    $status = 'pending';
    $ins->bind_param('iiisd', $user_id, $product_id, $quantity, $status, $total);
    if (!$ins->execute()) {
        throw new Exception('Failed to create order: ' . $ins->error);
    }
    $orderId = $con->insert_id;

    // Update product stock
    $newStock = $stock - $quantity;
    $up = $con->prepare('UPDATE products SET stock = ? WHERE product_id = ?');
    $up->bind_param('ii', $newStock, $product_id);
    if (!$up->execute()) {
        throw new Exception('Failed to update stock: ' . $up->error);
    }

    $con->commit();
    $response['success'] = true;
    $response['order_id'] = $orderId;
} catch (Exception $e) {
    $con->rollback();
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
