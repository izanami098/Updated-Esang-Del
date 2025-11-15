<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../auth/database.php';

$response = ['success' => false, 'products' => [], 'error' => null];

try {
    // optional category filter
    $category = isset($_GET['category']) ? $con->real_escape_string($_GET['category']) : null;

    $sql = "SELECT product_id, product_name, product_description, unit_price, stock, category, is_available FROM products WHERE 1";
    if ($category) {
        $sql .= " AND category = '" . $category . "'";
    }
    $sql .= " ORDER BY product_name ASC";

    $res = $con->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $response['products'][] = $row;
        }
    }

    $response['success'] = true;
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
