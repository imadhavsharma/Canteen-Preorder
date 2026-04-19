<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$conn = mysqli_connect("localhost", "root", "", "canteen_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result); // ✅ GET DATA

        $_SESSION['email'] = $row['email'];
        $_SESSION['student_id'] = $row['student_id']; // ✅ ADD THIS

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .center-box {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: #1a1a1a;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: #111;
            border: 1px solid #333;
            color: white;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #00ffcc;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="snack-container"></div>
<div class="center-box">
    <div class="login-card">
        <h2>Login 🔐</h2>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login">Login</button>
        </form>

        <p style="margin-top:10px;">
            Don't have an account? <a href="register.php">Register</a>
        </p>
    </div>
</div>

</body>
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
</html>
<script>
const snacks = [
  "🍔","🍟","🍕","🍩","🍪","🌭",
  "🥪","🌮","🌯","🍿","🥨","🧁",
  "🍫","🍬","🍭","🥐","🥞","🧇"
];
function createSnack() {
  const snack = document.createElement("div");
  snack.classList.add("snack");

  snack.innerText = snacks[Math.floor(Math.random() * snacks.length)];

  snack.style.left = Math.random() * 100 + "vw";
  snack.style.fontSize = (40 + Math.random() * 40) + "px";
  snack.style.animationDuration = (3 + Math.random() * 5) + "s";

  document.getElementById("snack-container").appendChild(snack);

  setTimeout(() => {
    snack.remove();
  }, 12000);
}

setInterval(() => {
  for (let i = 0; i < 3; i++) {
    createSnack();
  }
}, 300);
</script>