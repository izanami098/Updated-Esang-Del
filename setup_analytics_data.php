<?php
/**
 * Setup Script for Analytics Sample Data
 * Run this file once to set up the sample transaction data
 * Access via: http://localhost/ordering/setup_analytics_data.php
 */

require_once 'auth/database.php';

$success = true;
$messages = [];

// First, get available user IDs
$userQuery = "SELECT user_id FROM users WHERE user_type = 'CUSTOMER' LIMIT 3";
$userResult = $con->query($userQuery);
$availableUsers = [];

if ($userResult && $userResult->num_rows > 0) {
    while ($row = $userResult->fetch_assoc()) {
        $availableUsers[] = $row['user_id'];
    }
}

// If we don't have enough users, get any users
if (count($availableUsers) < 3) {
    $userQuery = "SELECT user_id FROM users LIMIT 3";
    $userResult = $con->query($userQuery);
    $availableUsers = [];
    
    if ($userResult && $userResult->num_rows > 0) {
        while ($row = $userResult->fetch_assoc()) {
            $availableUsers[] = $row['user_id'];
        }
    }
}

// Check if we have users
if (count($availableUsers) == 0) {
    $messages[] = "✗ Error: No users found in database. Please create users first.";
    $success = false;
} else {
    $messages[] = "✓ Found " . count($availableUsers) . " users to use for sample data";
    $user1 = $availableUsers[0];
    $user2 = isset($availableUsers[1]) ? $availableUsers[1] : $availableUsers[0];
    $user3 = isset($availableUsers[2]) ? $availableUsers[2] : $availableUsers[0];
}

// First, add the columns if they don't exist
$alterQueries = [
    "ALTER TABLE `orders` ADD COLUMN IF NOT EXISTS `total_amount` DECIMAL(10,2) NOT NULL DEFAULT 0.00 AFTER `order_date`",
    "ALTER TABLE `orders` ADD COLUMN IF NOT EXISTS `quantity` INT(11) NOT NULL DEFAULT 1 AFTER `product_id`"
];

foreach ($alterQueries as $query) {
    if ($con->query($query) === TRUE) {
        $messages[] = "✓ Table structure updated successfully";
    } else {
        // Check if column already exists
        if (strpos($con->error, 'Duplicate column') !== false) {
            $messages[] = "✓ Table columns already exist";
        } else {
            $messages[] = "✗ Error altering table: " . $con->error;
            $success = false;
        }
    }
}

// Sample data insertion (only proceed if we have users)
if ($success && count($availableUsers) > 0) {
    
$sampleOrders = [
    // November 2025 Orders (Week 1: Nov 1-7)
    [$user1, 1, 2, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-11-01 10:30:00', 140.00],
    [$user2, 1, 1, 'delivered', 1, 'COD', 'delivery', 0, '2025-11-02 14:20:00', 70.00],
    [$user3, 1, 3, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-11-03 09:15:00', 210.00],
    [$user1, 1, 1, 'delivered', 1, 'Gcash', 'pickup', 0, '2025-11-04 16:45:00', 70.00],
    [$user2, 1, 2, 'delivered', 1, 'COD', 'delivery', 0, '2025-11-05 11:30:00', 140.00],
    [$user3, 1, 4, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-11-06 13:20:00', 280.00],
    [$user1, 1, 1, 'delivered', 1, 'Bank Transfer', 'pickup', 0, '2025-11-07 15:10:00', 70.00],
    
    // November 2025 Orders (Week 2: Nov 8-14)
    [$user1, 1, 3, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-11-08 10:00:00', 210.00],
    [$user2, 1, 2, 'delivered', 1, 'COD', 'delivery', 0, '2025-11-09 12:30:00', 140.00],
    [$user3, 1, 1, 'delivered', 1, 'Bank Transfer', 'pickup', 0, '2025-11-09 14:45:00', 70.00],
    [$user1, 1, 5, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-11-10 09:20:00', 350.00],
    [$user2, 1, 2, 'delivered', 1, 'COD', 'delivery', 0, '2025-11-11 11:15:00', 140.00],
    [$user3, 1, 3, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-11-12 16:30:00', 210.00],
    [$user1, 1, 2, 'delivered', 1, 'Gcash', 'pickup', 0, '2025-11-13 10:45:00', 140.00],
    [$user2, 1, 4, 'delivered', 1, 'COD', 'delivery', 0, '2025-11-14 13:00:00', 280.00],
    
    // October 2025 Orders
    [$user1, 1, 3, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-10-05 10:30:00', 210.00],
    [$user2, 1, 4, 'delivered', 1, 'COD', 'delivery', 0, '2025-10-10 14:20:00', 280.00],
    [$user3, 1, 5, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-10-15 09:15:00', 350.00],
    [$user1, 1, 2, 'delivered', 1, 'Gcash', 'pickup', 0, '2025-10-20 16:45:00', 140.00],
    [$user2, 1, 3, 'delivered', 1, 'COD', 'delivery', 0, '2025-10-25 11:30:00', 210.00],
    
    // September 2025
    [$user1, 1, 2, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-09-05 10:30:00', 140.00],
    [$user2, 1, 3, 'delivered', 1, 'COD', 'delivery', 0, '2025-09-12 14:20:00', 210.00],
    [$user3, 1, 4, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-09-18 09:15:00', 280.00],
    [$user1, 1, 2, 'delivered', 1, 'Gcash', 'pickup', 0, '2025-09-25 16:45:00', 140.00],
    
    // August 2025
    [$user1, 1, 5, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-08-08 10:30:00', 350.00],
    [$user2, 1, 3, 'delivered', 1, 'COD', 'delivery', 0, '2025-08-15 14:20:00', 210.00],
    [$user3, 1, 4, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-08-22 09:15:00', 280.00],
    
    // July 2025
    [$user1, 1, 3, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-07-10 10:30:00', 210.00],
    [$user2, 1, 2, 'delivered', 1, 'COD', 'delivery', 0, '2025-07-18 14:20:00', 140.00],
    [$user3, 1, 4, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-07-25 09:15:00', 280.00],
    
    // June 2025
    [$user1, 1, 6, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-06-05 10:30:00', 420.00],
    [$user2, 1, 4, 'delivered', 1, 'COD', 'delivery', 0, '2025-06-15 14:20:00', 280.00],
    [$user3, 1, 5, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-06-25 09:15:00', 350.00],
    
    // May 2025
    [$user1, 1, 4, 'delivered', 1, 'Gcash', 'delivery', 0, '2025-05-08 10:30:00', 280.00],
    [$user2, 1, 5, 'delivered', 1, 'COD', 'delivery', 0, '2025-05-18 14:20:00', 350.00],
    [$user3, 1, 3, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2025-05-28 09:15:00', 210.00],
    
    // 2024 Orders
    [$user1, 1, 50, 'delivered', 1, 'Gcash', 'delivery', 0, '2024-06-15 10:30:00', 3500.00],
    [$user2, 1, 40, 'delivered', 1, 'COD', 'delivery', 0, '2024-08-20 14:20:00', 2800.00],
    [$user3, 1, 45, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2024-10-10 09:15:00', 3150.00],
    
    // 2023 Orders
    [$user1, 1, 45, 'delivered', 1, 'Gcash', 'delivery', 0, '2023-05-15 10:30:00', 3150.00],
    [$user2, 1, 35, 'delivered', 1, 'COD', 'delivery', 0, '2023-07-20 14:20:00', 2450.00],
    [$user3, 1, 40, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2023-09-10 09:15:00', 2800.00],
    
    // 2022 Orders
    [$user1, 1, 40, 'delivered', 1, 'Gcash', 'delivery', 0, '2022-04-15 10:30:00', 2800.00],
    [$user2, 1, 30, 'delivered', 1, 'COD', 'delivery', 0, '2022-08-20 14:20:00', 2100.00],
    [$user3, 1, 35, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2022-11-10 09:15:00', 2450.00],
    
    // 2021 Orders
    [$user1, 1, 35, 'delivered', 1, 'Gcash', 'delivery', 0, '2021-03-15 10:30:00', 2450.00],
    [$user2, 1, 25, 'delivered', 1, 'COD', 'delivery', 0, '2021-07-20 14:20:00', 1750.00],
    [$user3, 1, 30, 'delivered', 1, 'Bank Transfer', 'delivery', 0, '2021-10-10 09:15:00', 2100.00]
];

$insertQuery = "INSERT INTO `orders` (`user_id`, `product_id`, `quantity`, `order_status`, `details_id`, `payment_method`, `order_type`, `rider_id`, `order_date`, `total_amount`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($insertQuery);

$insertedCount = 0;
foreach ($sampleOrders as $order) {
    $stmt->bind_param("iiiisisssd", $order[0], $order[1], $order[2], $order[3], $order[4], $order[5], $order[6], $order[7], $order[8], $order[9]);
    if ($stmt->execute()) {
        $insertedCount++;
    } else {
        $messages[] = "✗ Error inserting order: " . $stmt->error;
        $success = false;
    }
}

$messages[] = "✓ Successfully inserted {$insertedCount} sample orders";

$stmt->close();

} else {
    $messages[] = "✗ Skipped sample data insertion due to missing users";
}

$con->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Setup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            font-family: monospace;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .warning {
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border: 1px solid #ffeaa7;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Analytics Sample Data Setup</h1>
        
        <?php if ($success): ?>
            <div class="message success">
                <strong>✓ Setup completed successfully!</strong>
            </div>
        <?php else: ?>
            <div class="message error">
                <strong>✗ Setup completed with errors</strong>
            </div>
        <?php endif; ?>
        
        <h3>Setup Results:</h3>
        <?php foreach ($messages as $message): ?>
            <div class="message <?php echo (strpos($message, '✗') !== false) ? 'error' : 'success'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endforeach; ?>
        
        <div class="warning">
            <strong>⚠ Important:</strong> This script should only be run once. Running it multiple times will create duplicate data.
        </div>
        
        <div style="margin-top: 30px;">
            <a href="pages/admin/analytics.php" class="btn">View Analytics Dashboard</a>
            <a href="public/api/get_analytics.php?period=weekly" class="btn" style="background-color: #2196F3;">Test API</a>
        </div>
        
        <div style="margin-top: 30px; padding: 15px; background-color: #f9f9f9; border-left: 4px solid #4CAF50;">
            <h4>Next Steps:</h4>
            <ol>
                <li>Visit the Analytics Dashboard to see the sample data in action</li>
                <li>Test the API endpoint to verify data is being returned correctly</li>
                <li>Switch between Weekly, Monthly, and Yearly views</li>
                <li>Check the transaction table for recent orders</li>
            </ol>
        </div>
    </div>
</body>
</html>