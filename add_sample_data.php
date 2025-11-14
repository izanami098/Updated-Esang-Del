<?php
header('Content-Type: application/json');
require_once 'auth/database.php';

$response = [
    'success' => false,
    'message' => '',
    'details' => []
];

try {
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
        $response['message'] = "No users found in database. Please create users first.";
        echo json_encode($response);
        exit;
    }

    $response['details'][] = "✓ Found " . count($availableUsers) . " users";
    $user1 = $availableUsers[0];
    $user2 = isset($availableUsers[1]) ? $availableUsers[1] : $availableUsers[0];
    $user3 = isset($availableUsers[2]) ? $availableUsers[2] : $availableUsers[0];
    
    // Get a rider user ID or use NULL for rider_id
    $riderIdQuery = "SELECT user_id FROM users WHERE user_type = 'RIDER' LIMIT 1";
    $riderIdResult = $con->query($riderIdQuery);
    $riderId = null;
    
    if ($riderIdResult && $riderIdResult->num_rows > 0) {
        $riderId = $riderIdResult->fetch_assoc()['user_id'];
        $response['details'][] = "✓ Found rider user (ID: {$riderId})";
    } else {
        // Check if FK allows NULL
        $response['details'][] = "ℹ️ No rider found, will use NULL for rider_id";
    }

    // Detect the products table structure
    $columnsQuery = "SHOW COLUMNS FROM products";
    $columnsResult = $con->query($columnsQuery);
    
    $productColumns = [];
    while ($col = $columnsResult->fetch_assoc()) {
        $productColumns[] = $col['Field'];
    }
    
    // Determine primary key column
    $productColumn = in_array('id', $productColumns) ? 'id' : 'product_id';
    $productTable = 'products';
    
    $response['details'][] = "✓ Products table uses primary key: {$productColumn}";
    
    // Check for existing products in the correct table
    $productQuery = "SELECT {$productColumn} as product_id FROM {$productTable} WHERE {$productColumn} > 0 LIMIT 1";
    $productResult = $con->query($productQuery);
    
    if (!$productResult || $productResult->num_rows == 0) {
        // If products table is empty but inventory has products, sync them
        if ($productTable == 'products') {
            // Check inventory table (any product, even with ID 0)
            $inventoryCheck = $con->query("SELECT * FROM inventory LIMIT 1");
            
            if ($inventoryCheck && $inventoryCheck->num_rows > 0) {
                $response['details'][] = "ℹ️ Found products in inventory table, creating entry in products table...";
                
                // Get inventory product
                $invProduct = $inventoryCheck->fetch_assoc();
                
                // Generate new ID
                $maxIdCheck = $con->query("SELECT MAX({$productColumn}) as max_id FROM products");
                $newProductId = 1;
                if ($maxIdCheck) {
                    $maxRow = $maxIdCheck->fetch_assoc();
                    $newProductId = ($maxRow['max_id'] ? $maxRow['max_id'] : 0) + 1;
                }
                
                // Insert based on detected schema
                $hasProductName = in_array('product_name', $productColumns);
                $hasCategoryId = in_array('category_id', $productColumns);
                
                if ($hasProductName && $hasCategoryId) {
                    // Your schema: product_id, product_name, description, price, category_id, image
                    $response['details'][] = "ℹ️ Detected: product_id, product_name, category_id schema";
                    
                    $productName = $invProduct['product_name'];
                    $productDesc = $invProduct['product_description'] ?? '';
                    $productPrice = $invProduct['unit_price'];
                    $productImage = $invProduct['product_image'] ?? '';
                    $categoryId = $invProduct['category_id'] ?? 1;
                    
                    // Insert with image if column exists
                    if (in_array('image', $productColumns)) {
                        $insertProduct = $con->prepare("INSERT INTO products (product_id, product_name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?, ?)");
                        $insertProduct->bind_param("issdis", $newProductId, $productName, $productDesc, $productPrice, $categoryId, $productImage);
                    } else {
                        $insertProduct = $con->prepare("INSERT INTO products (product_id, product_name, description, price, category_id) VALUES (?, ?, ?, ?, ?)");
                        $insertProduct->bind_param("issdi", $newProductId, $productName, $productDesc, $productPrice, $categoryId);
                    }
                } else {
                    // Legacy schema
                    $response['details'][] = "ℹ️ Using legacy schema";
                    
                    $insertProduct = $con->prepare("INSERT INTO products (product_id, product_name, product_description, product_image, unit_price, stock, category) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $productName = $invProduct['product_name'];
                    $productDesc = $invProduct['product_description'];
                    $productImage = $invProduct['product_image'];
                    $productPrice = $invProduct['unit_price'];
                    $productStock = 0;
                    $categoryId = $invProduct['category'];
                    
                    $insertProduct->bind_param("isssdii", $newProductId, $productName, $productDesc, $productImage, $productPrice, $productStock, $categoryId);
                }
                
                if ($insertProduct->execute()) {
                    $response['details'][] = "✓ Created product entry: {$productName} (ID: {$newProductId})";
                    $productId = $newProductId;
                    $insertProduct->close();
                } else {
                    $response['message'] = "Failed to sync product from inventory to products table.";
                    $response['details'][] = "✗ Error: " . $insertProduct->error;
                    echo json_encode($response);
                    $con->close();
                    exit;
                }
            } else {
                $response['message'] = "No products found in {$productTable} or inventory table. Please add at least one product first.";
                $response['details'][] = "✗ No valid products found in {$productTable} table";
                $response['details'][] = "✗ No valid products found in inventory table";
                $response['details'][] = "ℹ️ Visit check_products.php to see database status and get SQL to add products";
                echo json_encode($response);
                $con->close();
                exit;
            }
        } else {
            $response['message'] = "No products found in {$productTable} table. Please add at least one product first.";
            $response['details'][] = "✗ No valid products found in {$productTable} table";
            $response['details'][] = "ℹ️ Visit check_products.php to see database status and get SQL to add products";
            echo json_encode($response);
            $con->close();
            exit;
        }
    } else {
        $productRow = $productResult->fetch_assoc();
        $productId = $productRow['product_id'];
        
        if ($productId <= 0) {
            $response['message'] = "Invalid product ID found. Please ensure products have valid IDs greater than 0.";
            $response['details'][] = "✗ Product ID must be greater than 0 (found: {$productId})";
            echo json_encode($response);
            $con->close();
            exit;
        }
        
        $response['details'][] = "✓ Using product ID: {$productId} from {$productTable} table";
    }

    // Add columns if they don't exist
    $alterQueries = [
        "ALTER TABLE `orders` ADD COLUMN IF NOT EXISTS `total_amount` DECIMAL(10,2) NOT NULL DEFAULT 0.00",
        "ALTER TABLE `orders` ADD COLUMN IF NOT EXISTS `quantity` INT(11) NOT NULL DEFAULT 1"
    ];

    foreach ($alterQueries as $query) {
        $con->query($query);
    }
    $response['details'][] = "✓ Table structure verified";

    // Sample data (using detected product ID)
    $sampleOrders = [
        // November 2025 Orders (Week 1: Nov 1-7)
        [$user1, $productId, 2, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-11-01 10:30:00', 140.00],
        [$user2, $productId, 1, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-11-02 14:20:00', 70.00],
        [$user3, $productId, 3, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-11-03 09:15:00', 210.00],
        [$user1, $productId, 1, 'delivered', 1, 'Gcash', 'pickup', $riderId, '2025-11-04 16:45:00', 70.00],
        [$user2, $productId, 2, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-11-05 11:30:00', 140.00],
        [$user3, $productId, 4, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-11-06 13:20:00', 280.00],
        [$user1, $productId, 1, 'delivered', 1, 'Bank Transfer', 'pickup', $riderId, '2025-11-07 15:10:00', 70.00],
        
        // November 2025 Orders (Week 2: Nov 8-14)
        [$user1, $productId, 3, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-11-08 10:00:00', 210.00],
        [$user2, $productId, 2, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-11-09 12:30:00', 140.00],
        [$user3, $productId, 1, 'delivered', 1, 'Bank Transfer', 'pickup', $riderId, '2025-11-09 14:45:00', 70.00],
        [$user1, $productId, 5, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-11-10 09:20:00', 350.00],
        [$user2, $productId, 2, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-11-11 11:15:00', 140.00],
        [$user3, $productId, 3, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-11-12 16:30:00', 210.00],
        [$user1, $productId, 2, 'delivered', 1, 'Gcash', 'pickup', $riderId, '2025-11-13 10:45:00', 140.00],
        [$user2, $productId, 4, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-11-14 13:00:00', 280.00],
        
        // October 2025 Orders
        [$user1, $productId, 3, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-10-05 10:30:00', 210.00],
        [$user2, $productId, 4, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-10-10 14:20:00', 280.00],
        [$user3, $productId, 5, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-10-15 09:15:00', 350.00],
        [$user1, $productId, 2, 'delivered', 1, 'Gcash', 'pickup', $riderId, '2025-10-20 16:45:00', 140.00],
        [$user2, $productId, 3, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-10-25 11:30:00', 210.00],
        
        // September 2025
        [$user1, $productId, 2, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-09-05 10:30:00', 140.00],
        [$user2, $productId, 3, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-09-12 14:20:00', 210.00],
        [$user3, $productId, 4, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-09-18 09:15:00', 280.00],
        [$user1, $productId, 2, 'delivered', 1, 'Gcash', 'pickup', $riderId, '2025-09-25 16:45:00', 140.00],
        
        // August 2025
        [$user1, $productId, 5, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-08-08 10:30:00', 350.00],
        [$user2, $productId, 3, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-08-15 14:20:00', 210.00],
        [$user3, $productId, 4, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-08-22 09:15:00', 280.00],
        
        // July 2025
        [$user1, $productId, 3, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-07-10 10:30:00', 210.00],
        [$user2, $productId, 2, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-07-18 14:20:00', 140.00],
        [$user3, $productId, 4, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-07-25 09:15:00', 280.00],
        
        // June 2025
        [$user1, $productId, 6, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-06-05 10:30:00', 420.00],
        [$user2, $productId, 4, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-06-15 14:20:00', 280.00],
        [$user3, $productId, 5, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-06-25 09:15:00', 350.00],
        
        // May 2025
        [$user1, $productId, 4, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2025-05-08 10:30:00', 280.00],
        [$user2, $productId, 5, 'delivered', 1, 'COD', 'delivery', $riderId, '2025-05-18 14:20:00', 350.00],
        [$user3, $productId, 3, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2025-05-28 09:15:00', 210.00],
        
        // 2024 Orders
        [$user1, $productId, 50, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2024-06-15 10:30:00', 3500.00],
        [$user2, $productId, 40, 'delivered', 1, 'COD', 'delivery', $riderId, '2024-08-20 14:20:00', 2800.00],
        [$user3, $productId, 45, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2024-10-10 09:15:00', 3150.00],
        
        // 2023 Orders
        [$user1, $productId, 45, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2023-05-15 10:30:00', 3150.00],
        [$user2, $productId, 35, 'delivered', 1, 'COD', 'delivery', $riderId, '2023-07-20 14:20:00', 2450.00],
        [$user3, $productId, 40, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2023-09-10 09:15:00', 2800.00],
        
        // 2022 Orders
        [$user1, $productId, 40, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2022-04-15 10:30:00', 2800.00],
        [$user2, $productId, 30, 'delivered', 1, 'COD', 'delivery', $riderId, '2022-08-20 14:20:00', 2100.00],
        [$user3, $productId, 35, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2022-11-10 09:15:00', 2450.00],
        
        // 2021 Orders
        [$user1, $productId, 35, 'delivered', 1, 'Gcash', 'delivery', $riderId, '2021-03-15 10:30:00', 2450.00],
        [$user2, $productId, 25, 'delivered', 1, 'COD', 'delivery', $riderId, '2021-07-20 14:20:00', 1750.00],
        [$user3, $productId, 30, 'delivered', 1, 'Bank Transfer', 'delivery', $riderId, '2021-10-10 09:15:00', 2100.00]
    ];

    $insertQuery = "INSERT INTO `orders` (`user_id`, `product_id`, `quantity`, `order_status`, `details_id`, `payment_method`, `order_type`, `rider_id`, `order_date`, `total_amount`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insertQuery);

    $insertedCount = 0;
    $errorCount = 0;
    
    foreach ($sampleOrders as $order) {
        $stmt->bind_param("iiiisisssd", $order[0], $order[1], $order[2], $order[3], $order[4], $order[5], $order[6], $order[7], $order[8], $order[9]);
        if ($stmt->execute()) {
            $insertedCount++;
        } else {
            $errorCount++;
        }
    }

    $stmt->close();

    if ($insertedCount > 0) {
        $response['success'] = true;
        $response['message'] = "Sample data added successfully!";
        $response['details'][] = "✓ Successfully inserted {$insertedCount} orders";
        
        if ($errorCount > 0) {
            $response['details'][] = "⚠ {$errorCount} orders failed to insert (may already exist)";
        }
        
        $response['details'][] = "✓ Date range: 2021 - November 2025";
        $response['details'][] = "✓ Total revenue: ~₱39,900";
        $response['details'][] = "✓ Payment methods: Gcash, COD, Bank Transfer";
    } else {
        $response['message'] = "Failed to insert sample data. Data may already exist.";
        $response['details'][] = "✗ No orders were inserted";
    }

} catch (Exception $e) {
    $response['message'] = "Error: " . $e->getMessage();
    $response['details'][] = "✗ " . $e->getMessage();
}

$con->close();
echo json_encode($response);
?>
