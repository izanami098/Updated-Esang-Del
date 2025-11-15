<?php
require_once 'auth/database.php';
header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => '',
    'details' => []
];

try {
    // Insert sample users
    $users = [
        ['John', 'Doe', 'john@example.com', 'CUSTOMER', 'password123', '09123456789'],
        ['Jane', 'Smith', 'jane@example.com', 'CUSTOMER', 'password123', '09987654321'],
        ['Mark', 'Johnson', 'mark@example.com', 'RIDER', 'password123', '09111111111'],
        ['Admin', 'User', 'admin@example.com', 'ADMIN', 'password123', '09222222222']
    ];

    $stmt = $con->prepare("INSERT INTO users (first_name, last_name, email, user_type, password, phone) VALUES (?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $con->error);
    }

    $addedCount = 0;
    foreach ($users as $user) {
        $hashedPassword = password_hash($user[4], PASSWORD_BCRYPT);
        $stmt->bind_param("ssssss", $user[0], $user[1], $user[2], $user[3], $hashedPassword, $user[5]);
        
        if ($stmt->execute()) {
            $addedCount++;
            $response['details'][] = "✓ Added user: {$user[0]} {$user[1]} ({$user[3]})";
        } else {
            $response['details'][] = "✗ Failed to add user: {$user[0]} {$user[1]} - " . $stmt->error;
        }
    }

    $stmt->close();

    if ($addedCount > 0) {
        $response['success'] = true;
        $response['message'] = "Successfully added {$addedCount} users!";
    } else {
        $response['message'] = "No users were added. Check if they already exist.";
    }

    // Get all users
    $userQuery = "SELECT user_id, first_name, last_name, user_type, email FROM users";
    $userResult = $con->query($userQuery);
    
    if ($userResult && $userResult->num_rows > 0) {
        $response['details'][] = "\n📋 Current Users in Database:";
        while ($row = $userResult->fetch_assoc()) {
            $response['details'][] = "  ID: {$row['user_id']} | {$row['first_name']} {$row['last_name']} | {$row['user_type']} | {$row['email']}";
        }
    }

} catch (Exception $e) {
    $response['message'] = "Error: " . $e->getMessage();
    $response['details'][] = $e->getTraceAsString();
}

$con->close();
echo json_encode($response, JSON_PRETTY_PRINT);
?>
