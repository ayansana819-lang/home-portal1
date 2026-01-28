<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Offline Videos</title>
    <style>
        body {
            font-family: Arial;
            background: #111;
            color: white;
            padding: 20px;
        }
        .video-box {
            margin-bottom: 30px;
        }
        video {
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
        }
        a {
            color: #00c3ff;
        }
    </style>
</head>
<body>

<h2>🎬 Offline Videos</h2>

<div class="video-box">
    <h3>Video 1</h3>
    <video controls>
        <source src="videos/video1.mp4" type="video/mp4">
        Your browser does not support video.
    </video>
</div>

<div class="video-box">
    <h3>Video 2</h3>
    <video controls>
        <source src="videos/video2.mp4" type="video/mp4">
    </video>
</div>

<div class="video-box">
    <h3>Video 3</h3>
    <video controls>
        <source src="videos/video3.mp4" type="video/mp4">
    </video>
</div>

<br>
<a href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
