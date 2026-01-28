<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "faimly_system");
if ($conn->connect_error) {
    die("DB Error");
}

$user_id = $_SESSION['user_id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $jazzcash = $_POST['jazzcash'];
    $easypaisa = $_POST['easypaisa'];

    $sql = "UPDATE users SET full_name='$full_name', email='$email', cnic='$cnic', jazzcash='$jazzcash', easypaisa='$easypaisa' WHERE id='$user_id'";
    if ($conn->query($sql)) {
        $success = "Profile updated successfully!";
    } else {
        $error = "Update failed!";
    }
}

// Fetch current user data
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
    <h2>Update Profile</h2>

    <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" placeholder="Full Name" required><br><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Email" required><br><br>
        <input type="text" name="cnic" value="<?php echo htmlspecialchars($user['cnic']); ?>" placeholder="CNIC" required><br><br>
        <input type="text" name="jazzcash" value="<?php echo htmlspecialchars($user['jazzcash']); ?>" placeholder="JazzCash Number"><br><br>
        <input type="text" name="easypaisa" value="<?php echo htmlspecialchars($user['easypaisa']); ?>" placeholder="EasyPaisa Number"><br><br>
        <button type="submit" class="btn">Update Profile</button>
    </form>

    <a href="dashboard.php" class="btn logout-button">Back to Dashboard</a>
</div>

</body>
</html>
