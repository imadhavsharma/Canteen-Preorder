<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>Canteen 🍽️</h2>

    <div class="nav-right">
        <a href="menu.php">Menu</a>
        <a href="orders.php">My Orders</a>
        <a href="profile.php"><?php echo $_SESSION['email']; ?></a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- CENTER CONTENT -->
<div class="dashboard-center">
    <h1>Welcome 👋</h1>

    <div class="center-buttons">
        <a href="menu.php" class="btn">🍔 Menu</a>
        <a href="orders.php" class="btn">📦 Orders</a>
    </div>
</div>

</body>
</html>