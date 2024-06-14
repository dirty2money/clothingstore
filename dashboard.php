<?php
session_start();
include('databaseConnection.php');

if (!isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?></h1>
    <ul>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_products.php">Manage Products</a></li>
        <li><a href="view_transactions.php">View Transactions</a></li>
        <li><a href="admin_logout.php">Logout</a></li>
    </ul>
</body>
</html>
