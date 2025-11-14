<?php
require_once 'auth/database.php';

// Get all users
$query = "SELECT user_id, first_name, last_name, user_type FROM users ORDER BY user_id";
$result = $con->query($query);

echo "<h2>Available Users in Database:</h2>";
echo "<table border='1' style='border-collapse: collapse; padding: 10px;'>";
echo "<tr><th>User ID</th><th>Name</th><th>User Type</th></tr>";

$userIds = [];
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['user_id']}</td>";
    echo "<td>{$row['first_name']} {$row['last_name']}</td>";
    echo "<td>{$row['user_type']}</td>";
    echo "</tr>";
    $userIds[] = $row['user_id'];
}
echo "</table>";

echo "<h3>User IDs to use in sample data:</h3>";
echo "<pre>" . implode(", ", $userIds) . "</pre>";

$con->close();
?>
