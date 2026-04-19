<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "canteen_db");

$student_id = $_SESSION['student_id']; // later we will make dynamic

$order_query = mysqli_query($conn, "SELECT * FROM orders WHERE student_id = $student_id ORDER BY order_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>My Orders 📦</h2>
    <div class="nav-right">
        <a href="dashboard.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="main">

<?php while ($order = mysqli_fetch_assoc($order_query)) { ?>

    <div class="order-card">

        <h3>Order #<?php echo $order['order_id']; ?></h3>
        <p>Total: ₹<?php echo $order['total_amount']; ?></p>
        <p>Payment: <?php echo $order['payment_method']; ?></p>
        <p>Status: <?php echo $order['status']; ?></p>

        <h4>Items:</h4>

        <?php
        $order_id = $order['order_id'];
        $items = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = $order_id");

        while ($item = mysqli_fetch_assoc($items)) {
        ?>
            <div class="order-item">
                <?php echo $item['food_name']; ?> - ₹<?php echo $item['price']; ?>
            </div>
        <?php } ?>

    </div>

<?php } ?>

</div>

</body>
</html>