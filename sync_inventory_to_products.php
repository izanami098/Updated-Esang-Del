<?php
require_once 'auth/database.php';

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => '',
    'details' => []
];

try {
    // Get all products from inventory
    $inventoryQuery = "SELECT product_name, product_description, unit_price, category FROM inventory";
    $inventoryResult = $con->query($inventoryQuery);
    
    if (!$inventoryResult || $inventoryResult->num_rows === 0) {
        $response['message'] = "No products found in inventory table";
        echo json_encode($response);
        exit;
    }
    
    $response['details'][] = "✓ Found {$inventoryResult->num_rows} products in inventory";
    
    // Get the next available product_id
    $maxIdQuery = "SELECT COALESCE(MAX(product_id), 0) as max_id FROM products";
    $maxIdResult = $con->query($maxIdQuery);
    $nextId = 1;
    
    if ($maxIdResult) {
        $row = $maxIdResult->fetch_assoc();
        $nextId = $row['max_id'] + 1;
    }
    
    $response['details'][] = "✓ Starting product ID: {$nextId}";
    
    // Get default category from inventory (it's an integer ID)
    $defaultCategoryId = 1;
    
    $response['details'][] = "✓ Using category ID: {$defaultCategoryId}";
    
    // Insert products from inventory to products table
    $insertedCount = 0;
    $stmt = $con->prepare("INSERT INTO products (product_id, product_name, product_description, product_image, unit_price, stock, category) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    while ($invProduct = $inventoryResult->fetch_assoc()) {
        $productName = $invProduct['product_name'];
        $productDesc = $invProduct['product_description'] ?? $productName;
        $productPrice = $invProduct['unit_price'];
        $productImage = $invProduct['product_image'] ?? '';
        $productStock = 0; // Set to 0 for sample data
        $productCategory = $invProduct['category'];
        
        // Check if product already exists by name
        $checkQuery = "SELECT product_id FROM products WHERE product_name = ?";
        $checkStmt = $con->prepare($checkQuery);
        $checkStmt->bind_param("s", $productName);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        
        if ($checkResult->num_rows > 0) {
            $existingRow = $checkResult->fetch_assoc();
            $response['details'][] = "⚠ Product '{$productName}' already exists (ID: {$existingRow['product_id']})";
            
            // Update inventory with this ID
            $updateInvQuery = "UPDATE inventory SET product_id = ? WHERE product_name = ? AND product_id = 0";
            $updateStmt = $con->prepare($updateInvQuery);
            $updateStmt->bind_param("is", $existingRow['product_id'], $productName);
            $updateStmt->execute();
            $updateStmt->close();
            
            $checkStmt->close();
            continue;
        }
        $checkStmt->close();
        
        // Insert new product with same structure as inventory
        $stmt->bind_param("isssdii", $nextId, $productName, $productDesc, $productImage, $productPrice, $productStock, $productCategory);
        
        if ($stmt->execute()) {
            $response['details'][] = "✓ Created product: {$productName} (ID: {$nextId}, Price: ₱{$productPrice})";
            
            // Update inventory table with the new product_id
            $updateInvQuery = "UPDATE inventory SET product_id = ? WHERE product_name = ? AND product_id = 0";
            $updateStmt = $con->prepare($updateInvQuery);
            $updateStmt->bind_param("is", $nextId, $productName);
            
            if ($updateStmt->execute() && $updateStmt->affected_rows > 0) {
                $response['details'][] = "  → Updated inventory product_id to {$nextId}";
            }
            $updateStmt->close();
            
            $insertedCount++;
            $nextId++;
        } else {
            $response['details'][] = "✗ Failed to create product: {$productName} - " . $stmt->error;
        }
    }
    
    $stmt->close();
    
    if ($insertedCount > 0) {
        $response['success'] = true;
        $response['message'] = "Successfully synced {$insertedCount} products from inventory to products table";
        $response['details'][] = "✓ Products are now ready for sample orders!";
    } else {
        $response['message'] = "No new products were added (may already exist)";
    }
    
} catch (Exception $e) {
    $response['message'] = "Error: " . $e->getMessage();
    $response['details'][] = "✗ " . $e->getMessage();
}

$con->close();
echo json_encode($response);
?>
