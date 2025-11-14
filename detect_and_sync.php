<?php
require_once 'auth/database.php';

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => '',
    'details' => []
];

try {
    // First, detect the actual products table structure
    $columnsQuery = "SHOW COLUMNS FROM products";
    $columnsResult = $con->query($columnsQuery);
    
    $productColumns = [];
    while ($col = $columnsResult->fetch_assoc()) {
        $productColumns[] = $col['Field'];
    }
    
    $response['details'][] = "✓ Products table columns: " . implode(', ', $productColumns);
    
    // Detect inventory structure
    $invColumnsQuery = "SHOW COLUMNS FROM inventory";
    $invColumnsResult = $con->query($invColumnsQuery);
    
    $invColumns = [];
    while ($col = $invColumnsResult->fetch_assoc()) {
        $invColumns[] = $col['Field'];
    }
    
    $response['details'][] = "✓ Inventory table columns: " . implode(', ', $invColumns);
    
    // Determine the primary key column in products
    $pkColumn = in_array('id', $productColumns) ? 'id' : 'product_id';
    $response['details'][] = "✓ Using primary key: {$pkColumn}";
    
    // Get all products from inventory
    $inventoryQuery = "SELECT * FROM inventory";
    $inventoryResult = $con->query($inventoryQuery);
    
    if (!$inventoryResult || $inventoryResult->num_rows === 0) {
        $response['message'] = "No products found in inventory table";
        echo json_encode($response);
        exit;
    }
    
    $response['details'][] = "✓ Found {$inventoryResult->num_rows} products in inventory";
    
    // Get the next available ID
    $maxIdQuery = "SELECT COALESCE(MAX({$pkColumn}), 0) as max_id FROM products";
    $maxIdResult = $con->query($maxIdQuery);
    $nextId = 1;
    
    if ($maxIdResult) {
        $row = $maxIdResult->fetch_assoc();
        $nextId = $row['max_id'] + 1;
    }
    
    $response['details'][] = "✓ Starting product ID: {$nextId}";
    
    // Build INSERT query based on detected columns
    $insertedCount = 0;
    
    // Detect actual schema:
    // Your schema: product_id, product_name, description, price, category_id, image
    
    $hasProductName = in_array('product_name', $productColumns);
    $hasCategoryId = in_array('category_id', $productColumns);
    
    if ($hasProductName && $hasCategoryId) {
        // Your actual schema: product_id, product_name, description, price, category_id, image
        $response['details'][] = "ℹ️ Detected: product_id, product_name, category_id schema";
        
        // Build column list dynamically
        $insertCols = [$pkColumn, 'product_name', 'description', 'price', 'category_id'];
        $insertVals = ['?', '?', '?', '?', '?'];
        
        if (in_array('image', $productColumns)) {
            $insertCols[] = 'image';
            $insertVals[] = '?';
        }
        if (in_array('item_type', $productColumns)) {
            $insertCols[] = 'item_type';
            $insertVals[] = "'single-price'";
        }
        
        $insertSQL = "INSERT INTO products (" . implode(', ', $insertCols) . ") VALUES (" . implode(', ', $insertVals) . ")";
        $response['details'][] = "ℹ️ SQL: " . $insertSQL;
        
        $stmt = $con->prepare($insertSQL);
        
        // Get first category ID from inventory
        while ($invProduct = $inventoryResult->fetch_assoc()) {
            $name = $invProduct['product_name'];
            $desc = $invProduct['product_description'] ?? '';
            $price = $invProduct['unit_price'];
            $categoryId = $invProduct['category_id'] ?? 1;
            $image = $invProduct['product_image'] ?? '';
            
            // Check if exists
            $checkQuery = "SELECT {$pkColumn} FROM products WHERE product_name = ?";
            $checkStmt = $con->prepare($checkQuery);
            $checkStmt->bind_param("s", $name);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();
            
            if ($checkResult->num_rows > 0) {
                $existing = $checkResult->fetch_assoc();
                $response['details'][] = "⚠ Product '{$name}' already exists (ID: {$existing[$pkColumn]})";
                
                // Update inventory with this ID
                $updateInv = $con->prepare("UPDATE inventory SET product_id = ? WHERE product_name = ?");
                $updateInv->bind_param("is", $existing[$pkColumn], $name);
                $updateInv->execute();
                $updateInv->close();
                
                $checkStmt->close();
                continue;
            }
            $checkStmt->close();
            
            // Bind params based on columns
            if (in_array('image', $productColumns)) {
                $stmt->bind_param("issdis", $nextId, $name, $desc, $price, $categoryId, $image);
            } else {
                $stmt->bind_param("issdi", $nextId, $name, $desc, $price, $categoryId);
            }
            
            if ($stmt->execute()) {
                $response['details'][] = "✓ Created: {$name} (ID: {$nextId}, Price: ₱{$price})";
                
                // Update inventory
                $updateInv = $con->prepare("UPDATE inventory SET product_id = ? WHERE product_name = ?");
                $updateInv->bind_param("is", $nextId, $name);
                $updateInv->execute();
                $updateInv->close();
                
                $insertedCount++;
                $nextId++;
            } else {
                $response['details'][] = "✗ Failed: {$name} - " . $stmt->error;
            }
        }
        $stmt->close();
        
    } else {
        // Schema 2 - old schema matching inventory
        $response['details'][] = "ℹ️ Using Schema 2 (product_id, product_name, etc.)";
        
        $stmt = $con->prepare("INSERT INTO products (product_id, product_name, product_description, product_image, unit_price, stock, category) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        while ($invProduct = $inventoryResult->fetch_assoc()) {
            $name = $invProduct['product_name'];
            $desc = $invProduct['product_description'];
            $image = $invProduct['product_image'];
            $price = $invProduct['unit_price'];
            $stock = 0;
            $category = $invProduct['category'];
            
            // Check if exists
            $checkQuery = "SELECT product_id FROM products WHERE product_name = ?";
            $checkStmt = $con->prepare($checkQuery);
            $checkStmt->bind_param("s", $name);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();
            
            if ($checkResult->num_rows > 0) {
                $existing = $checkResult->fetch_assoc();
                $response['details'][] = "⚠ Product '{$name}' already exists (ID: {$existing['product_id']})";
                
                // Update inventory
                $updateInv = $con->prepare("UPDATE inventory SET product_id = ? WHERE product_name = ?");
                $updateInv->bind_param("is", $existing['product_id'], $name);
                $updateInv->execute();
                $updateInv->close();
                
                $checkStmt->close();
                continue;
            }
            $checkStmt->close();
            
            $stmt->bind_param("isssdii", $nextId, $name, $desc, $image, $price, $stock, $category);
            
            if ($stmt->execute()) {
                $response['details'][] = "✓ Created: {$name} (ID: {$nextId}, Price: ₱{$price})";
                
                // Update inventory
                $updateInv = $con->prepare("UPDATE inventory SET product_id = ? WHERE product_name = ?");
                $updateInv->bind_param("is", $nextId, $name);
                $updateInv->execute();
                $updateInv->close();
                
                $insertedCount++;
                $nextId++;
            } else {
                $response['details'][] = "✗ Failed: {$name} - " . $stmt->error;
            }
        }
        $stmt->close();
    }
    
    if ($insertedCount > 0) {
        $response['success'] = true;
        $response['message'] = "Successfully synced {$insertedCount} products!";
        $response['details'][] = "✓ Products are now ready for sample orders!";
    } else {
        $response['message'] = "No new products added (may already exist)";
        $response['success'] = true;
    }
    
} catch (Exception $e) {
    $response['message'] = "Error: " . $e->getMessage();
    $response['details'][] = "✗ " . $e->getMessage();
}

$con->close();
echo json_encode($response);
?>
