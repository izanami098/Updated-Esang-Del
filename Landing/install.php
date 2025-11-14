<?php
require_once __DIR__ . '/../app/config/database.php';

json_headers();

// Allow GET trigger only
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$db = Database::getConnection();

// Path to the SQL file provided by user
$defaultPath = 'C:\\Users\\maryr\\Downloads\\EsangDB.txt';
$sqlPath = isset($_GET['path']) && $_GET['path'] !== '' ? $_GET['path'] : $defaultPath;

if (!file_exists($sqlPath)) {
    http_response_code(400);
    echo json_encode([
        'ok' => false,
        'message' => 'SQL file not found',
        'path' => $sqlPath,
    ]);
    exit;
}

$sql = file_get_contents($sqlPath);
if ($sql === false || trim($sql) === '') {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'SQL file is empty or unreadable']);
    exit;
}

// Split on semicolons while preserving DELIMITER edge-cases (not present here, but safe)
$statements = preg_split('/;\s*(?=([^\'\"]*([\'\"][^\'\"]*[\'\"])*)*[^\'\"])$/m', $sql);

$executed = 0;
$errors = [];
foreach ($statements as $raw) {
    $stmt = trim($raw);
    if ($stmt === '' || stripos($stmt, '--') === 0) {
        continue;
    }
    if (!$db->query($stmt)) {
        $errors[] = [
            'statement' => mb_substr($stmt, 0, 200) . (mb_strlen($stmt) > 200 ? '...' : ''),
            'error' => $db->error,
        ];
    } else {
        $executed++;
    }
}

echo json_encode([
    'ok' => count($errors) === 0,
    'executedStatements' => $executed,
    'errors' => $errors,
]);

?>


