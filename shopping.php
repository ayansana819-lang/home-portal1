<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
    <h2>Shopping Categories</h2>

    <div class="cards">
        <div class="card">
            <h3>Electronics</h3>
            <a href="electronics.html" class="btn">View</a>
        </div>

        <div class="card">
            <h3>Groceries</h3>
            <a href="groceries.php" class="btn">View</a>
        </div>

        <div class="card">
            <h3>Clothing</h3>
            <a href="clothing.php" class="btn">View</a>
        </div>
    </div>

    <a href="dashboard.php" class="btn logout-button">⬅ Back</a>
</div>

</body>
</html>
