<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "canteen_db");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

/* ADD TO CART LOGIC */
if (isset($_POST['add_to_cart'])) {
    $item = [
        "id" => $_POST['food_id'],
        "name" => $_POST['food_name'],
        "price" => $_POST['price'],
        "image" => $_POST['image']   

    ];

    $_SESSION['cart'][] = $item;
}

/* FETCH FOOD */
$sql = "SELECT * FROM food_item";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: rgba(255,255,255,0.05);
            margin: 15px;
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            text-align: center;
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .price {
            color: #00ffcc;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2>Canteen 🍽️</h2>
    <div>
        <a href="dashboard.php">Home</a>
        <a href="cart.php">Cart 🛒</a> <!-- ADD THIS -->
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="main">
    <h2>Menu</h2>

    <div class="menu-container">

        <?php while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="card">

        <!-- IMAGE HERE -->
        <img src="images/<?php echo $row['image']; ?>" 
             width="100%" height="150px" 
             style="border-radius:10px; object-fit:cover;">

        <h3><?php echo $row['food_name']; ?></h3>
        <p>₹<?php echo $row['price']; ?></p>

        <form method="POST">
            <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
            <input type="hidden" name="food_name" value="<?php echo $row['food_name']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="image" value="<?php echo $row['image']; ?>">

            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>

    </div>
<?php
}
?>

    </div>
</div>