<?php
require_once 'auth/database.php';
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Analytics Debug</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .section { margin: 20px 0; padding: 10px; border: 1px solid #ccc; }
        .success { color: green; }
        .error { color: red; }
        table { border-collapse: collapse; width: 100%; margin: 10px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h1>📊 Analytics Debug</h1>

    <div class="section">
        <h2>Orders Table Structure</h2>
        <?php
        $colQuery = "SHOW COLUMNS FROM orders";
        $colResult = $con->query($colQuery);
        if ($colResult) {
            echo "<table><tr><th>Field</th><th>Type</th><th>Key</th></tr>";
            while ($row = $colResult->fetch_assoc()) {
                echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Key']}</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

    <div class="section">
        <h2>Total Orders Count</h2>
        <?php
        $countQuery = "SELECT COUNT(*) as total FROM orders";
        $countResult = $con->query($countQuery);
        if ($countResult) {
            $count = $countResult->fetch_assoc()['total'];
            echo "<p class='success'>Total orders in database: <strong>{$count}</strong></p>";
        }
        ?>
    </div>

    <div class="section">
        <h2>Orders by Status</h2>
        <?php
        $statusQuery = "SELECT order_status, COUNT(*) as count FROM orders GROUP BY order_status";
        $statusResult = $con->query($statusQuery);
        if ($statusResult) {
            echo "<table><tr><th>Status</th><th>Count</th></tr>";
            while ($row = $statusResult->fetch_assoc()) {
                echo "<tr><td>{$row['order_status']}</td><td>{$row['count']}</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

    <div class="section">
        <h2>Sample Orders (First 10)</h2>
        <?php
        $sampleQuery = "SELECT 
            o.order_id,
            o.user_id,
            o.product_id,
            o.order_status,
            o.order_date,
            o.total_amount,
            o.payment_method
        FROM orders o 
        LIMIT 10";
        $sampleResult = $con->query($sampleQuery);
        if ($sampleResult && $sampleResult->num_rows > 0) {
            echo "<table><tr><th>Order ID</th><th>User ID</th><th>Product ID</th><th>Status</th><th>Date</th><th>Amount</th><th>Payment</th></tr>";
            while ($row = $sampleResult->fetch_assoc()) {
                $amount = isset($row['total_amount']) ? '₱' . number_format($row['total_amount'], 2) : 'N/A';
                echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['product_id']}</td>
                    <td>{$row['order_status']}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$amount}</td>
                    <td>{$row['payment_method']}</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='error'>No orders found!</p>";
        }
        ?>
    </div>

    <div class="section">
        <h2>Weekly Analytics Query Test</h2>
        <?php
        $weekQuery = "
            SELECT 
                WEEK(order_date, 1) as week_num,
                COUNT(*) as order_count,
                SUM(total_amount) as total
            FROM orders
            WHERE order_status = 'delivered'
                AND order_date >= DATE_SUB(NOW(), INTERVAL 4 WEEK)
                AND order_date <= NOW()
            GROUP BY week_num
            ORDER BY week_num ASC
        ";
        
        echo "<p><strong>Query:</strong> " . htmlspecialchars($weekQuery) . "</p>";
        
        $weekResult = $con->query($weekQuery);
        if ($weekResult && $weekResult->num_rows > 0) {
            echo "<table><tr><th>Week</th><th>Orders</th><th>Total Amount</th></tr>";
            while ($row = $weekResult->fetch_assoc()) {
                $total = isset($row['total']) ? '₱' . number_format($row['total'], 2) : 'N/A';
                echo "<tr><td>{$row['week_num']}</td><td>{$row['order_count']}</td><td>{$total}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='error'>No data for last 4 weeks!</p>";
            echo "<p>Current date: " . date('Y-m-d H:i:s') . "</p>";
            echo "<p>4 weeks ago: " . date('Y-m-d H:i:s', strtotime('-4 weeks')) . "</p>";
        }
        ?>
    </div>

    <div class="section">
        <h2>API Response Test</h2>
        <?php
        echo "<p><a href='public/api/get_analytics.php?period=weekly' target='_blank'>Test Weekly API</a></p>";
        echo "<p><a href='public/api/get_analytics.php?period=monthly' target='_blank'>Test Monthly API</a></p>";
        echo "<p><a href='public/api/get_analytics.php?period=yearly' target='_blank'>Test Yearly API</a></p>";
        ?>
    </div>

    <?php $con->close(); ?>
</body>
</html>
