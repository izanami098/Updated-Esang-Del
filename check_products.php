<?php
require_once 'auth/database.php';

echo "<style>
body { font-family: Arial; padding: 20px; }
table { border-collapse: collapse; width: 100%; margin: 20px 0; }
th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
th { background: #4CAF50; color: white; }
.error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 15px 0; }
.info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; margin: 15px 0; }
.success { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 15px 0; }
h2 { color: #333; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; }
</style>";

echo "<h1>🔍 Database Product Check</h1>";

// Check products table
echo "<h2>Products Table</h2>";
$productsCheck = $con->query("SELECT * FROM products LIMIT 10");
if ($productsCheck && $productsCheck->num_rows > 0) {
    echo "<div class='success'>✅ Found {$productsCheck->num_rows} product(s) in products table</div>";
    echo "<table><thead><tr><th>Product ID</th><th>Category ID</th><th>Name</th><th>Price</th><th>Available</th></tr></thead><tbody>";
    while ($row = $productsCheck->fetch_assoc()) {
        echo "<tr>";
        echo "<td><strong>{$row['id']}</strong></td>";
        echo "<td>{$row['category_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>₱" . number_format($row['price'], 2) . "</td>";
        echo "<td>" . ($row['is_available'] ? 'Yes' : 'No') . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='error'>❌ No products found in products table</div>";
}

// Check inventory table
echo "<h2>Inventory Table</h2>";
$inventoryCheck = $con->query("SELECT * FROM inventory LIMIT 10");
if ($inventoryCheck && $inventoryCheck->num_rows > 0) {
    echo "<div class='success'>✅ Found {$inventoryCheck->num_rows} product(s) in inventory table</div>";
    echo "<table><thead><tr><th>Product ID</th><th>Name</th><th>Price</th><th>Stock</th></tr></thead><tbody>";
    while ($row = $inventoryCheck->fetch_assoc()) {
        echo "<tr>";
        echo "<td><strong>{$row['product_id']}</strong></td>";
        echo "<td>{$row['product_name']}</td>";
        echo "<td>₱" . number_format($row['unit_price'], 2) . "</td>";
        echo "<td>{$row['stock']}</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='error'>❌ No products found in inventory table</div>";
}

// Check foreign keys on orders table
echo "<h2>Foreign Key Constraints on Orders Table</h2>";
$fkQuery = "SELECT 
                CONSTRAINT_NAME, 
                COLUMN_NAME, 
                REFERENCED_TABLE_NAME, 
                REFERENCED_COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
            WHERE TABLE_NAME = 'orders' 
            AND TABLE_SCHEMA = 'esang'
            AND REFERENCED_TABLE_NAME IS NOT NULL";
$fkResult = $con->query($fkQuery);

if ($fkResult && $fkResult->num_rows > 0) {
    echo "<div class='info'>ℹ️ Foreign key constraints found:</div>";
    echo "<table><thead><tr><th>Constraint</th><th>Column</th><th>References</th></tr></thead><tbody>";
    while ($row = $fkResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['CONSTRAINT_NAME']}</td>";
        echo "<td><strong>{$row['COLUMN_NAME']}</strong></td>";
        echo "<td>{$row['REFERENCED_TABLE_NAME']}.{$row['REFERENCED_COLUMN_NAME']}</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}

// Check what table the FK references
echo "<h2>📋 Recommendations</h2>";
$productFKCheck = $con->query("SELECT REFERENCED_TABLE_NAME 
                               FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
                               WHERE TABLE_NAME = 'orders' 
                               AND COLUMN_NAME = 'product_id'
                               AND TABLE_SCHEMA = 'esang'");

if ($productFKCheck && $productFKCheck->num_rows > 0) {
    $fkTable = $productFKCheck->fetch_assoc()['REFERENCED_TABLE_NAME'];
    echo "<div class='info'>";
    echo "<strong>The 'orders.product_id' references: {$fkTable} table</strong><br><br>";
    
    // Check if that table has products
    $checkTable = $con->query("SELECT COUNT(*) as count FROM {$fkTable} WHERE " . 
                              ($fkTable == 'products' ? 'id' : 'product_id') . " > 0");
    if ($checkTable) {
        $count = $checkTable->fetch_assoc()['count'];
        if ($count > 0) {
            echo "✅ Found {$count} valid product(s) in {$fkTable} table<br>";
            echo "The sample data script should work now.";
        } else {
            echo "❌ No valid products found in {$fkTable} table<br>";
            echo "<strong>ACTION REQUIRED:</strong> Please add a product to the {$fkTable} table first.<br><br>";
            
            if ($fkTable == 'products') {
                echo "You can add a product using SQL:<br>";
                echo "<pre style='background: #f4f4f4; padding: 10px; border-radius: 5px;'>
INSERT INTO products (category_id, name, description, price, is_available) 
VALUES (1, 'Sample Product', 'Description', 100.00, 1);</pre>";
            } else {
                echo "You can add a product using SQL:<br>";
                echo "<pre style='background: #f4f4f4; padding: 10px; border-radius: 5px;'>
INSERT INTO inventory (product_name, product_description, product_image, unit_price, stock, category) 
VALUES ('Sample Product', 'Description', 'image.jpg', 100.00, 10, 1);</pre>";
            }
        }
    }
    echo "</div>";
}

$con->close();
?>

<div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 10px;">
    <h3>🔗 Quick Actions</h3>
    <a href="pages/admin/analytics.php" style="display: inline-block; padding: 10px 20px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px; margin: 5px;">Analytics Page</a>
    <a href="add_sample_data.php" style="display: inline-block; padding: 10px 20px; background: #2196F3; color: white; text-decoration: none; border-radius: 5px; margin: 5px;">Test API Directly</a>
</div>
