<?php
session_start();
if (!isset($_SESSION['user_id'])) exit;
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Payment</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
<h2>Add Payment</h2>

<form method="POST">
<input name="product" placeholder="Product Name" required><br><br>
<input name="amount" placeholder="Amount" required><br><br>

<select name="method">
<option>JazzCash</option>
<option>EasyPaisa</option>
<option>Cash</option>
</select><br><br>

<button class="btn">Save</button>
</form>
</div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
$conn=new mysqli("localhost","root","","faimly_system");
$conn->query("INSERT INTO payments (user_id,product_name,amount,payment_method,status)
VALUES ('{$_SESSION['user_id']}','{$_POST['product']}','{$_POST['amount']}','{$_POST['method']}','Pending')");
}
?>
