<?php
$conn = mysqli_connect("localhost", "root", "", "faimly_system");

$email = $_POST['email'];

$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($check) == 1) {

    $code = rand(100000, 999999);
    $expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    mysqli_query($conn, "UPDATE users SET reset_code='$code', reset_expires='$expiry' WHERE email='$email'");

    $subject = "Password Reset Code";
    $message = "Your password reset code is: $code\nValid for 10 minutes.";
    $headers = "From: noreply@yourwebsite.com";

    mail($email, $subject, $message, $headers);

    echo "Reset code sent to your email.";
} else {
    echo "Email not found.";
}
?>
