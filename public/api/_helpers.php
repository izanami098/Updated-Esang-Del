<?php
// Common helpers for API endpoints
if (!defined('API_HELPERS_INCLUDED')) {
    define('API_HELPERS_INCLUDED', true);
}

function get_expected_api_key() {
    $key = getenv('API_KEY');
    if ($key === false) {
        $key = $_ENV['API_KEY'] ?? null;
    }
    return $key;
}

function get_request_api_key() {
    // Header (X-API-KEY)
    $key = null;
    foreach (array('HTTP_X_API_KEY', 'X-API-KEY') as $h) {
        if (!empty($_SERVER[$h])) {
            $key = trim($_SERVER[$h]);
            break;
        }
    }
    // Fallback to POST/GET or JSON body
    if (!$key) {
        if (isset($_POST['api_key'])) $key = trim($_POST['api_key']);
        elseif (isset($_GET['api_key'])) $key = trim($_GET['api_key']);
        else {
            $body = json_decode(file_get_contents('php://input'), true);
            if (is_array($body) && isset($body['api_key'])) $key = trim($body['api_key']);
        }
    }
    return $key;
}

function require_api_key_or_die() {
    $expected = get_expected_api_key();
    $provided = get_request_api_key();
    if (!$expected || !$provided || $provided !== $expected) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Unauthorized. Missing or invalid API key.']);
        exit;
    }
}

function json_response($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
    exit;
}

?>
