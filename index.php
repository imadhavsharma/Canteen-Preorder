<!DOCTYPE html>
<html>
<head>
    <title>Canteen System</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .center-box {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-card {
            background: #1a1a1a;
            padding: 40px;
            border-radius: 10px;
            width: 320px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: #00ffcc;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="food-bg"></div>
<div class="center-box">
    <div class="home-card">
        <h1>Canteen 🍽️</h1>
        <p>Pre-order your food easily</p>

        <br>

        <a href="login.php">
            <button>Login 🔐</button>
        </a>

        <a href="register.php">
            <button>Register 👤</button>
        </a>
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