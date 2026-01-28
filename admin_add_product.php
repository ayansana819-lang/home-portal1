<?php
session_start(); // later we’ll restrict admin only
?>
<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
    <h2>Add Product</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" required><br><br>

        <select name="category" required>
            <option value="">Select Category</option>
            <option value="Electronics">Electronics</option>
            <option value="Groceries">Groceries</option>
            <option value="Clothing">Clothing</option>
        </select><br><br>

        <input type="text" name="daraz_link" placeholder="Daraz Product Link" required><br><br>

        <button class="btn">Add Product</button>
    </form>

    <a href="dashboard.php" class="btn logout-button">⬅ Back</a>
</div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "faimly_system");

    $name = $_POST['name'];
    $category = $_POST['category'];
    $link = $_POST['daraz_link'];

    $conn->query("INSERT INTO products (name, category, daraz_link) VALUES ('$name','$category','$link')");
}
?>
