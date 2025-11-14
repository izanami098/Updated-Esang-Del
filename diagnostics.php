<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Setup Diagnostics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #2c3e50; border-bottom: 3px solid #3498db; padding-bottom: 10px; }
        h2 { color: #34495e; margin-top: 30px; }
        .status { padding: 15px; margin: 15px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
        .warning { background: #fff3cd; color: #856404; border-left: 4px solid #ffc107; }
        .error { background: #f8d7da; color: #721c24; border-left: 4px solid #dc3545; }
        .info { background: #d1ecf1; color: #0c5460; border-left: 4px solid #17a2b8; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #3498db; color: white; }
        tr:hover { background: #f5f5f5; }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px 5px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn:hover { background: #2980b9; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #218838; }
        .code { background: #f4f4f4; padding: 10px; border-radius: 5px; font-family: monospace; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Analytics Setup - Pre-Installation Diagnostics</h1>
        
        <?php
        require_once 'auth/database.php';
        
        $allGood = true;
        
        // Check 1: Database Connection
        echo "<h2>1️⃣ Database Connection</h2>";
        if ($con->connect_error) {
            echo "<div class='status error'>❌ Database connection failed: " . $con->connect_error . "</div>";
            $allGood = false;
        } else {
            echo "<div class='status success'>✅ Database connection successful (esang)</div>";
        }
        
        // Check 2: Users Table
        echo "<h2>2️⃣ Users in Database</h2>";
        $userQuery = "SELECT user_id, CONCAT(first_name, ' ', last_name) as name, user_type, email FROM users ORDER BY user_id";
        $userResult = $con->query($userQuery);
        
        if ($userResult && $userResult->num_rows > 0) {
            echo "<div class='status success'>✅ Found " . $userResult->num_rows . " user(s) in database</div>";
            echo "<table>";
            echo "<thead><tr><th>User ID</th><th>Name</th><th>Type</th><th>Email</th></tr></thead>";
            echo "<tbody>";
            $userIds = [];
            while ($row = $userResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td><strong>{$row['user_id']}</strong></td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['user_type']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "</tr>";
                $userIds[] = $row['user_id'];
            }
            echo "</tbody></table>";
            echo "<div class='code'>User IDs that will be used: " . implode(", ", array_slice($userIds, 0, 3)) . "</div>";
        } else {
            echo "<div class='status error'>❌ No users found in database! Please create users first.</div>";
            $allGood = false;
        }
        
        // Check 3: Orders Table Structure
        echo "<h2>3️⃣ Orders Table Structure</h2>";
        $tableCheck = $con->query("DESCRIBE orders");
        if ($tableCheck) {
            echo "<div class='status success'>✅ Orders table exists</div>";
            $columns = [];
            while ($row = $tableCheck->fetch_assoc()) {
                $columns[] = $row['Field'];
            }
            
            // Check for required columns
            $requiredCols = ['order_id', 'user_id', 'product_id', 'order_status', 'payment_method', 'order_date'];
            $missingCols = array_diff($requiredCols, $columns);
            
            if (empty($missingCols)) {
                echo "<div class='status success'>✅ All required columns present</div>";
            } else {
                echo "<div class='status warning'>⚠️ Missing columns: " . implode(", ", $missingCols) . "</div>";
            }
            
            // Check for new columns
            if (in_array('total_amount', $columns)) {
                echo "<div class='status info'>ℹ️ Column 'total_amount' already exists (will skip adding)</div>";
            } else {
                echo "<div class='status info'>ℹ️ Column 'total_amount' will be added</div>";
            }
            
            if (in_array('quantity', $columns)) {
                echo "<div class='status info'>ℹ️ Column 'quantity' already exists (will skip adding)</div>";
            } else {
                echo "<div class='status info'>ℹ️ Column 'quantity' will be added</div>";
            }
        } else {
            echo "<div class='status error'>❌ Orders table not found!</div>";
            $allGood = false;
        }
        
        // Check 4: Products Table
        echo "<h2>4️⃣ Products/Inventory Table</h2>";
        $productQuery = "SELECT product_id, product_name, unit_price FROM inventory LIMIT 5";
        $productResult = $con->query($productQuery);
        
        if ($productResult && $productResult->num_rows > 0) {
            echo "<div class='status success'>✅ Found products in inventory</div>";
            echo "<table>";
            echo "<thead><tr><th>Product ID</th><th>Name</th><th>Price</th></tr></thead>";
            echo "<tbody>";
            while ($row = $productResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td><strong>{$row['product_id']}</strong></td>";
                echo "<td>{$row['product_name']}</td>";
                echo "<td>₱" . number_format($row['unit_price'], 2) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
            echo "<div class='code'>Sample orders will use product_id: 1</div>";
        } else {
            echo "<div class='status warning'>⚠️ No products found. Sample data will still insert (may need manual product addition).</div>";
        }
        
        // Check 5: Foreign Key Constraints
        echo "<h2>5️⃣ Foreign Key Constraints</h2>";
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
            echo "<div class='status info'>ℹ️ Found foreign key constraints (will be respected):</div>";
            echo "<table>";
            echo "<thead><tr><th>Constraint</th><th>Column</th><th>References</th></tr></thead>";
            echo "<tbody>";
            while ($row = $fkResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['CONSTRAINT_NAME']}</td>";
                echo "<td>{$row['COLUMN_NAME']}</td>";
                echo "<td>{$row['REFERENCED_TABLE_NAME']}.{$row['REFERENCED_COLUMN_NAME']}</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='status info'>ℹ️ No foreign key constraints detected</div>";
        }
        
        // Check 6: Existing Orders
        echo "<h2>6️⃣ Existing Orders Check</h2>";
        $existingOrders = $con->query("SELECT COUNT(*) as count FROM orders");
        if ($existingOrders) {
            $count = $existingOrders->fetch_assoc()['count'];
            if ($count > 0) {
                echo "<div class='status warning'>⚠️ Found {$count} existing order(s). New sample data will be added to existing orders.</div>";
            } else {
                echo "<div class='status success'>✅ No existing orders. Fresh start!</div>";
            }
        }
        
        $con->close();
        
        // Final Status
        echo "<h2>📋 Setup Status</h2>";
        if ($allGood) {
            echo "<div class='status success'>";
            echo "<h3>✅ All checks passed! Ready to proceed with setup.</h3>";
            echo "<p>Your database is properly configured and ready for sample data installation.</p>";
            echo "</div>";
            echo "<a href='setup_analytics_data.php' class='btn btn-success'>▶️ Proceed with Setup</a>";
        } else {
            echo "<div class='status error'>";
            echo "<h3>❌ Some issues detected</h3>";
            echo "<p>Please resolve the issues above before proceeding with setup.</p>";
            echo "</div>";
            echo "<a href='setup_analytics_data.php' class='btn'>⚠️ Try Setup Anyway</a>";
        }
        
        echo "<a href='pages/admin/analytics.php' class='btn'>📊 View Analytics Dashboard</a>";
        ?>
        
        <h2>📚 Quick Links</h2>
        <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 10px;">
            <p><strong>Documentation:</strong></p>
            <ul>
                <li>📖 <a href="README_ANALYTICS.md">Complete Setup Guide</a></li>
                <li>⚡ <a href="QUICKSTART.md">Quick Start Guide</a></li>
                <li>🔧 <a href="FIX_APPLIED.md">Recent Fixes</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
