<?php
$conn = new mysqli("localhost", "root", "", "faimly_system");
$result = $conn->query("SELECT * FROM products WHERE category='Electronics'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Electronics</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

<div class="dashboard-container">
    <h2>Electronics</h2>

    <div class="cards">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card">
                <h3><?php echo $row['name']; ?></h3>
                <a href="<?php echo $row['https://www.daraz.pk/tag/google-pixel-price/']; ?>" target="_blank" class="btn">
                    Buy on Daraz
                </a>
            </div>
        <?php } ?>
    </div>

    <a href="shopping.php" class="btn logout-button">⬅ Back</a>
</div>

</body>
</html>
