<?php
session_start();
if ($_SESSION['role'] !== 'admin') exit;

$conn = new mysqli("localhost", "root", "", "faimly_system");

$id = $_GET['id'];
$status = $_GET['status'];

$conn->query("UPDATE payments SET status='$status' WHERE id='$id'");

header("Location: admin_payments.php");
$conn->query("UPDATE payments SET status='$status' WHERE id='$id'");

$p = $conn->query("SELECT user_id FROM payments WHERE id='$id'")->fetch_assoc();
$msg = "Your payment has been $status.";

$conn->query("INSERT INTO notifications (user_id, message) VALUES ('{$p['user_id']}', '$msg')");
