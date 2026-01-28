<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "faimly_system");

// Analytics queries
$total_users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$total_products = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$total_payments = $conn->query("SELECT COUNT(*) AS total FROM payments")->fetch_assoc()['total'];
$approved = $conn->query("SELECT COUNT(*) AS total FROM payments WHERE status='Approved'")->fetch_assoc()['total'];
$pending = $conn->query("SELECT COUNT(*) AS total FROM payments WHERE status='Pending'")->fetch_assoc()['total'];

// Recent payments
$recent = $conn->query("
    SELECT payments.*, users.full_name 
    FROM payments 
    JOIN users ON payments.user_id = users.id 
    ORDER BY payments.created_at DESC 
    LIMIT 5
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
<h2>Admin Dashboard</h2>

<!-- Stats -->
<div class="cards">
    <div class="card"><h3>Total Users</h3><p><?= $total_users ?></p></div>
    <div class="card"><h3>Total Products</h3><p><?= $total_products ?></p></div>
    <div class="card"><h3>Total Payments</h3><p><?= $total_payments ?></p></div>
    <div class="card"><h3>Approved</h3><p><?= $approved ?></p></div>
    <div class="card"><h3>Pending</h3><p><?= $pending ?></p></div>
</div>

<h3 style="margin-top:30px;">Recent Payments</h3>

<table width="100%" border="1" cellpadding="8">
<tr>
<th>User</th>
<th>Product</th>
<th>Amount</th>
<th>Status</th>
</tr>

<?php while ($r = $recent->fetch_assoc()) { ?>
<tr>
<td><?= htmlspecialchars($r['full_name']) ?></td>
<td><?= htmlspecialchars($r['product_name']) ?></td>
<td><?= htmlspecialchars($r['amount']) ?></td>
<td><?= htmlspecialchars($r['status']) ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="admin_payments.php" class="btn">Manage Payments</a>
<a href="admin_add_product.php" class="btn">Add Product</a>
<a href="dashboard.php" class="btn logout-button">Back</a>
<a href="admin_ban_users.php" class="btn">🚫 Ban Users</a>


</div>

</body>
</html>
