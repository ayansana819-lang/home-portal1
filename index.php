<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "faimly_system");
if ($conn->connect_error) {
    die("DB Error");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // login success
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Wrong password!";
    }
} else {
    echo "User not found!";
}
if ($user['banned'] == 1) {
    die("Your account has been banned by admin.");
}

$conn->close();
$_SESSION['user_id'] = $user['id'];
$_SESSION['role'] = $user['role'];
$_SESSION['role'] = $user['role'];

if ($user['role'] === 'admin') {
    header("Location: dashboard.php");
} else {
    header("Location: dashboard.php");
}
$_SESSION['role'] = $user['role'];

if ($user['role'] === 'admin') {
    header("Location: admin_dashboard.php");
} else {
    header("Location: dashboard.php");
}
if ($user['banned'] == 1) {
    die("Your account has been banned. Contact admin.");
}
