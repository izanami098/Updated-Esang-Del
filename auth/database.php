<?php
// Database connection configuration

// Load environment variables from .env
$envFile = __DIR__ . '/../.env';
// Prefer vlucas/phpdotenv if available
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
    if (class_exists('Dotenv\\Dotenv') || class_exists('Dotenv\\Loader')) {
        try {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
            $dotenv->safeLoad();
        } catch (Exception $e) {
            // ignore and fall back
        }
    }
}

// Fallback: parse .env into $_ENV and environment if not already set
if (file_exists($envFile)) {
    $pairs = parse_ini_file($envFile, false, INI_SCANNER_RAW);
    if ($pairs && is_array($pairs)) {
        foreach ($pairs as $k => $v) {
            if (!isset($_ENV[$k])) {
                $_ENV[$k] = $v;
            }
            if (getenv($k) === false) {
                putenv("$k=$v");
            }
        }
    }
}

// Read values from environment or defaults
$host = getenv('DB_HOST') ?: ($_ENV['DB_HOST'] ?? 'localhost');
$user = getenv('DB_USER') ?: ($_ENV['DB_USER'] ?? 'root');
$password = getenv('DB_PASSWORD') ?: ($_ENV['DB_PASSWORD'] ?? '');
$database = getenv('DB_NAME') ?: ($_ENV['DB_NAME'] ?? 'esang_del');

// Create connection
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set charset to utf8mb4
$con->set_charset("utf8mb4");
?>
