<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "faimly_system");
$result = $conn->query("
    SELECT payments.*, users.full_name 
    FROM payments 
    JOIN users ON payments.user_id = users.id
    ORDER BY payments.created_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Payments</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
<h2>Payment Approvals</h2>

<table width="100%" border="1" cellpadding="8">
<tr>
<th>User</th>
<th>Product</th>
<th>Amount</th>
<th>Method</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= htmlspecialchars($row['full_name']) ?></td>
<td><?= htmlspecialchars($row['product_name']) ?></td>
<td><?= htmlspecialchars($row['amount']) ?></td>
<td><?= htmlspecialchars($row['payment_method']) ?></td>
<td><?= htmlspecialchars($row['status']) ?></td>
<td>
<a href="update_payment.php?id=<?= $row['id'] ?>&status=Approved" class="btn">Approve</a>
<a href="update_payment.php?id=<?= $row['id'] ?>&status=Rejected" class="btn logout-button">Reject</a>
</td>
</tr>
<?php } ?>

</table>

<a href="dashboard.php" class="btn">⬅ Back</a>
</div>

</body>
</html>
