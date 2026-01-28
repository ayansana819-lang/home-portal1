<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "faimly_system");
if ($conn->connect_error) {
    die("DB Error");
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$cnic = $_POST['cnic'];
$jazzcash = $_POST['jazzcash'];
$easypaisa = $_POST['easypaisa'];

$sql = "INSERT INTO users (full_name,email,password,cnic,jazzcash,easypaisa)
VALUES ('$full_name','$email','$password','$cnic','$jazzcash','$easypaisa')";

if ($conn->query($sql)) {
    echo "Signup successful";
} else {
    echo "Insert error";
}
