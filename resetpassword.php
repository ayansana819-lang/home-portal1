<?php
$conn = mysqli_connect("localhost", "root", "", "faimly_system");

$email = $_POST['email'];
$code = $_POST['code'];
$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

$query = mysqli_query($conn,
"SELECT * FROM users WHERE email='$email' AND reset_code='$code' AND reset_expires > NOW()"
);

if (mysqli_num_rows($query) == 1) {

    mysqli_query($conn,
    "UPDATE users SET password='$new_password', reset_code=NULL, reset_expires=NULL WHERE email='$email'"
    );

    echo "Password reset successful!";
} else {
    echo "Invalid or expired reset code.";
}
?>
