
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "faimly_system");
if ($conn->connect_error) {
    die("DB Error");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dash.css">
</head>

<div class="actions">
    <a href="shopping.php" class="btn">🛒 Shopping</a>
    <a href="videos.php" class="btn">🎥 Videos</a>
    <a href="update_profile.php" class="btn">👤 Profile</a>
     <a href="history.php" class="btn">📊 Watch History</a>

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
        <a href="admin/admin_ban_users.php">🚫 Ban Users</a>

    <?php } ?>
</div>




<div class="dashboard-container">
  <h2>Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h2>

  <div class="user-info">
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>CNIC: <?php echo htmlspecialchars($user['cnic']); ?></p>
    <p>JazzCash: <?php echo htmlspecialchars($user['jazzcash']); ?></p>
    <p>EasyPaisa: <?php echo htmlspecialchars($user['easypaisa']); ?></p>
  </div>

  <div class="actions">
    <a href="update_profile.php" class="btn">Update Profile</a>
    <a href="logout.php" class="btn logout-button">Logout</a>
  </div>
</div>
<div class="video-section">
    <h2>Informative Videos</h2>
    <div class="video-grid">
        <!-- Video 1 -->
        <div class="video-card">
            <iframe width="100%" height="200" src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
            title="Video 1" frameborder="0" allowfullscreen></iframe>
            <p>Video 1: Example Topic</p>
        </div>

        <!-- Video 2 -->
        <div class="video-card">
            <iframe width="100%" height="200" src="https://youtube.com/shorts/Dan-5oBwrJQ?si=9xIY-9WC3OC76uzW" 
            title="Video 2" frameborder="0" allowfullscreen></iframe>
            <p>Video 2: Example Topic</p>
        </div>

        <!-- Video 3 -->
        <div class="video-card">
            <iframe width="100%" height="200" src="https://www.youtube.com/embed/3JZ_D3ELwOQ" 
            title="Video 3" frameborder="0" allowfullscreen></iframe>
            <p>Video 3: Example Topic</p>
        </div>
    </div>
</div>
<div class="video-section">
    <h2>Informative Videos</h2>

    <div class="video-grid">
        <?php
        $video_sql = "SELECT * FROM videos";
        $videos = $conn->query($video_sql);

        while ($video = $videos->fetch_assoc()) {
        ?>
            <div class="video-card">
                <iframe 
                    src="<?php echo htmlspecialchars($video['youtube_link']); ?>" 
                    frameborder="0" 
                    allowfullscreen>
                </iframe>
                <p><?php echo htmlspecialchars($video['title']); ?></p>
            </div>
        <?php } ?>
    </div>
</div>
<div class="actions">
    <a href="shopping.php" class="btn">🛒 Shopping</a>
    <a href="videos.php" class="btn">🎥 Videos</a>
    <a href="update_profile.php" class="btn">👤 Profile</a>
    <a href="admin/ban_user.php?id=<?= $row['id'] ?>&action=ban">Ban</a>


</div>



</body>
</html>

