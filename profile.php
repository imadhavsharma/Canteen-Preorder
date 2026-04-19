<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "canteen_db");

$email = $_SESSION['email'];

$result = mysqli_query($conn, "SELECT * FROM student WHERE email='$email'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="center-box">
    <div class="card">
        <h2>Student Profile 👤</h2>

        <p><b>Name:</b> <?php echo $row['name']; ?></p>
        <p><b>Email:</b> <?php echo $row['email']; ?></p>
        <p><b>Reg No:</b> <?php echo $row['reg_no']; ?></p>

        <a href="dashboard.php">
            <button>Back</button>
        </a>
    </div>
</div>

</body>
</html>