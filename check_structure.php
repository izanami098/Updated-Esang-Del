<!DOCTYPE html>
<html>
<head>
    <title>Database Structure Check</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        table { border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h1>🔍 Database Structure Check</h1>

<?php
require_once 'auth/database.php';

echo "<h2>Products Table Structure</h2>";
$colQuery = "SHOW COLUMNS FROM products";
$colResult = $con->query($colQuery);
if ($colResult) {
    echo "<table><tr><th>Field</th><th>Type</th><th>Key</th></tr>";
    while ($row = $colResult->fetch_assoc()) {
        echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Key']}</td></tr>";
    }
    echo "</table>";
}

echo "<h2>Inventory Table Structure</h2>";
$invColQuery = "SHOW COLUMNS FROM inventory";
$invColResult = $con->query($invColQuery);
if ($invColResult) {
    echo "<table><tr><th>Field</th><th>Type</th><th>Key</th></tr>";
    while ($row = $invColResult->fetch_assoc()) {
        echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Key']}</td></tr>";
    }
    echo "</table>";
}

echo "<h2>Products Table Data</h2>";
$prodQuery = "SELECT * FROM products";
$prodResult = $con->query($prodQuery);
if ($prodResult && $prodResult->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Product Name</th><th>Price</th><th>Category ID</th></tr>";
    while ($row = $prodResult->fetch_assoc()) {
        $id = $row['id'] ?? $row['product_id'] ?? 'N/A';
        $name = $row['product_name'] ?? $row['name'] ?? 'N/A';
        $price = $row['price'] ?? 'N/A';
        $catId = $row['category_id'] ?? 'N/A';
        echo "<tr><td>{$id}</td><td>{$name}</td><td>{$price}</td><td>{$catId}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>No products found in products table</p>";
}

echo "<h2>Inventory Table Data</h2>";
$invQuery = "SELECT * FROM inventory";
$invResult = $con->query($invQuery);
if ($invResult && $invResult->num_rows > 0) {
    echo "<table><tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Stock</th></tr>";
    while ($row = $invResult->fetch_assoc()) {
        echo "<tr><td>{$row['product_id']}</td><td>{$row['product_name']}</td><td>{$row['unit_price']}</td><td>{$row['stock']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>No products found in inventory table</p>";
}

echo "<h2>Foreign Key Check</h2>";
$fkQuery = "SELECT 
    CONSTRAINT_NAME,
    TABLE_NAME,
    COLUMN_NAME,
    REFERENCED_TABLE_NAME,
    REFERENCED_COLUMN_NAME
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = 'esang'
AND TABLE_NAME = 'orders'
AND COLUMN_NAME = 'product_id'
AND REFERENCED_TABLE_NAME IS NOT NULL";

$fkResult = $con->query($fkQuery);
if ($fkResult && $fkResult->num_rows > 0) {
    echo "<table><tr><th>Constraint</th><th>Table</th><th>Column</th><th>References</th></tr>";
    while ($row = $fkResult->fetch_assoc()) {
        echo "<tr><td>{$row['CONSTRAINT_NAME']}</td><td>{$row['TABLE_NAME']}</td><td>{$row['COLUMN_NAME']}</td><td>{$row['REFERENCED_TABLE_NAME']}.{$row['REFERENCED_COLUMN_NAME']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='info'>No foreign key constraint found for orders.product_id</p>";
}

$con->close();
?>

</body>
</html>
