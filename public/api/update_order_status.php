<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../auth/database.php';
require_once __DIR__ . '/_helpers.php';

// Enforce API key for write actions
require_api_key_or_die();

$response = ['success' => false, 'error' => null];

$input = json_decode(file_get_contents('php://input'), true);
if (!$input) {
    $input = $_POST;
}

$order_id = isset($input['order_id']) ? intval($input['order_id']) : null;
$new_status = isset($input['order_status']) ? $con->real_escape_string($input['order_status']) : null;

if (!$order_id || !$new_status) {
    echo json_encode(['success' => false, 'error' => 'Missing order_id or order_status']);
    exit;
}

try {
    $stmt = $con->prepare('UPDATE orders SET order_status = ?, updated_at = NOW() WHERE order_id = ?');
    $stmt->bind_param('si', $new_status, $order_id);
    if (!$stmt->execute()) {
        throw new Exception('Failed to update order: ' . $stmt->error);
    }

    $response['success'] = true;
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
