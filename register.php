<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "canteen_db");

$message = "";

if (isset($_POST['register'])) {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 🔴 VALIDATIONS
    if ($name == '' || $email == '' || $phone == '' || $password == '') {
        $message = "All fields are required!";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format!";
    }
    elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $message = "Phone must be exactly 10 digits!";
    }
    elseif (strlen($password) < 4) {
        $message = "Password must be at least 4 characters!";
    }
    else {
        // 🔍 CHECK IF EMAIL EXISTS
        $check = "SELECT * FROM student WHERE email='$email'";
        $res = mysqli_query($conn, $check);

        if (mysqli_num_rows($res) > 0) {
            $message = "Email already registered!";
        } else {
            // ✅ INSERT
            $sql = "INSERT INTO student (name, email, phone, password)
                    VALUES ('$name', '$email', '$phone', '$password')";

            if (mysqli_query($conn, $sql)) {
                $message = "Registration Successful!";
            } else {
                $message = "Error occurred!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            margin: 0;
            background: #0f0f0f;
            font-family: Arial;
            color: white;
        }

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

        .message {
            margin-bottom: 10px;
            color: #ffcc00;
        }
    </style>
</head>
<body>

<div class="center-box">
    <div class="login-card">
        <h2>Register 👤</h2>

        <!-- MESSAGE -->
        <?php if ($message != "") { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>

        <!-- FORM -->
        <form method="POST">

            <input type="text" name="name" placeholder="Name"
                   pattern="[A-Za-z ]+"
                   title="Only letters allowed"
                   required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="text" name="phone" placeholder="Phone"
                   pattern="[0-9]{10}"
                   maxlength="10"
                   title="Enter 10 digit number"
                   required>

            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="register">Register</button>

        </form>

        <p style="margin-top:10px;">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
</div>

<!-- RIPPLE EFFECT -->
<script>
document.querySelectorAll("button").forEach(button => {
    button.addEventListener("click", function(e) {

        const rect = button.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;

        let ripple = document.createElement("span");
        ripple.style.position = "absolute";
        ripple.style.background = "rgba(255,255,255,0.5)";
        ripple.style.borderRadius = "50%";
        ripple.style.width = "20px";
        ripple.style.height = "20px";
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