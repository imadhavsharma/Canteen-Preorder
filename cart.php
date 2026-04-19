<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "canteen_db");

/* REMOVE ITEM */
if (isset($_POST['remove'])) {
    $index = $_POST['index'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

/* PLACE ORDER */
if (isset($_POST['place_order'])) {

    $payment = $_POST['payment_method'];

    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }

    /* INSERT INTO ORDERS */
    $student_id = $_SESSION['student_id'];
    $order_sql = "INSERT INTO orders 
    (student_id, canteen_id, total_amount, payment_method, status, payment_status)
    VALUES 
    ('$student_id', 1, '$total', '$payment', 'Pending', 'Paid')";    mysqli_query($conn,   $order_sql);

    /* GET ORDER ID */
    $order_id = mysqli_insert_id($conn);

    /* INSERT ITEMS */
    foreach ($_SESSION['cart'] as $item) {
        $name = $item['name'];
        $price = $item['price'];

        $item_sql = "INSERT INTO order_items (order_id, food_name, price)
                     VALUES ('$order_id', '$name', '$price')";

        mysqli_query($conn, $item_sql);
    }

    unset($_SESSION['cart']);

    header("Location: thankyou.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>Cart 🛒</h2>
    <div>
        <a href="menu.php">Menu</a>
        <a href="dashboard.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">
    <h2>Your Cart</h2>

    <div class="menu-container">

  <?php
$total = 0;

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

    foreach ($_SESSION['cart'] as $index => $item) {
        $total += $item['price'];
?>
        <div class="card">

            <?php if (!empty($item['image'])) { ?>
                <img src="images/<?php echo $item['image']; ?>" 
                     width="100%" height="120px"
                     style="border-radius:10px; object-fit:cover;">
            <?php } else { ?>
                <img src="images/default.jpg" 
                     width="100%" height="120px"
                     style="border-radius:10px; object-fit:cover;">
            <?php } ?>

            <h3><?php echo $item['name']; ?></h3>
            <p>₹<?php echo $item['price']; ?></p>

            <form method="POST">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <button type="submit" name="remove">Remove</button>
            </form>

        </div>
<?php
    }

} else {
?>
    <h3 style="text-align:center; width:100%;">Cart is empty</h3>
<?php
}
?>
    </div>

    <!-- TOTAL + PAYMENT -->
    <?php if (!empty($_SESSION['cart'])) { ?>
        <h3>Total: ₹<?php echo $total; ?></h3>

        <form method="POST">
            <h3>Select Payment Method</h3>

            <select name="payment_method" required>
                <option value="">--Select--</option>
                <option value="Cash">Cash</option>
                <option value="UPI">UPI</option>
            </select>

            <br><br>
            <button type="submit" name="place_order">Place Order</button>
        </form>
    <?php } ?>

</div>

<!-- RIPPLE EFFECT -->
<script>
document.querySelectorAll("button").forEach(button => {
    button.addEventListener("click", function(e) {

        const rect = button.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;

        let ripple = document.createElement("span");
        ripple.style.left = x + "px";
        ripple.style.top = y + "px";

        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 500);
    });
});
</script>

</body>
</html>
