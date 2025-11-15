<?php
header('Content-Type: application/json');
require_once 'auth/database.php';

$response = [
    'success' => false,
    'message' => '',
    'details' => []
];

try {
    // First, add sample categories
    $categories = [
        'Electronics',
        'Food & Beverages',
        'Clothing',
        'Home & Kitchen',
        'Books'
    ];

    $stmt = $con->prepare("INSERT IGNORE INTO categories (category_name, description) VALUES (?, ?)");
    
    foreach ($categories as $category) {
        $desc = "Products in " . $category;
        $stmt->bind_param("ss", $category, $desc);
        $stmt->execute();
    }
    $stmt->close();
    $response['details'][] = "✓ Categories added/verified";

    // Get a category ID for use
    $catResult = $con->query("SELECT category_id FROM categories LIMIT 1");
    $categoryId = $catResult ? $catResult->fetch_assoc()['category_id'] : 1;

    // Sample products
    $products = [
        [
            'name' => 'Wireless Headphones',
            'description' => 'High-quality wireless headphones with noise cancellation',
            'price' => 2500.00,
            'stock' => 50,
            'category' => 'Electronics'
        ],
        [
            'name' => 'Coffee Maker',
            'description' => 'Automatic coffee maker with timer',
            'price' => 1500.00,
            'stock' => 30,
            'category' => 'Home & Kitchen'
        ],
        [
            'name' => 'Running Shoes',
            'description' => 'Comfortable running shoes for daily use',
            'price' => 3000.00,
            'stock' => 45,
            'category' => 'Clothing'
        ],
        [
            'name' => 'Organic Coffee Beans',
            'description' => 'Premium organic coffee beans 1kg',
            'price' => 800.00,
            'stock' => 100,
            'category' => 'Food & Beverages'
        ],
        [
            'name' => 'Programming Book',
            'description' => 'Learn PHP and MySQL Development',
            'price' => 950.00,
            'stock' => 25,
            'category' => 'Books'
        ]
    ];

    // Insert into products table
    $stmt = $con->prepare("INSERT INTO products (category_id, product_name, product_description, unit_price, stock, category, is_available) 
                          VALUES (?, ?, ?, ?, ?, ?, 1)");
    
    $addedCount = 0;
    foreach ($products as $product) {
        $stmt->bind_param("issdis", 
            $categoryId,
            $product['name'],
            $product['description'],
            $product['price'],
            $product['stock'],
            $product['category']
        );
        
        if ($stmt->execute()) {
            $addedCount++;
            $response['details'][] = "✓ Added product: {$product['name']}";
        }
    }
    $stmt->close();

    // Also add to inventory table
    $stmt = $con->prepare("INSERT INTO inventory (product_name, product_description, unit_price, stock, category) 
                          VALUES (?, ?, ?, ?, ?)");
    
    foreach ($products as $product) {
        $stmt->bind_param("ssdis",
            $product['name'],
            $product['description'],
            $product['price'],
            $product['stock'],
            $product['category']
        );
        $stmt->execute();
    }
    $stmt->close();

    $response['success'] = true;
    $response['message'] = "Successfully added {$addedCount} products to the system!";
    $response['details'][] = "\n✓ Products also added to inventory table";

    // Get product count
    $countResult = $con->query("SELECT COUNT(*) as total FROM products");
    $count = $countResult->fetch_assoc()['total'];
    $response['details'][] = "📊 Total products in database: {$count}";

} catch (Exception $e) {
    $response['message'] = "Error: " . $e->getMessage();
    $response['details'][] = $e->getTraceAsString();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>
