<?php
$conn = new mysqli("localhost", "root", "", "faimly_system");

if ($conn->connect_error) {
    die("DB Error");
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
if ($_POST['secret'] !== 'MY_ADMIN_SECRET_123') {
    die("Unauthorized access");
}

$sql = "INSERT INTO users (full_name, email, password, role)
        VALUES ('$full_name', '$email', '$password', 'admin')";

if ($conn->query($sql)) {
    echo "Admin Created Successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>
