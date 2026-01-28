<?php
// TURN MAINTENANCE ON / OFF
$maintenance = true; // false = site online

// Pages that should STILL work
$allowed_pages = [
    "offline.html",
    "admin_dashboard.php",
    "login.php"
];

$current_page = basename($_SERVER['PHP_SELF']);

if ($maintenance && !in_array($current_page, $allowed_pages)) {
    header("Location: offline.html");
    exit;
}
?>
