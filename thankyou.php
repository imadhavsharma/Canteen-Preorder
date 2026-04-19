<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>

    <style>
        body {
            margin: 0;
            background: #0f0f0f;
            color: white;
            font-family: Arial;
            overflow: hidden;
        }

        /* 🔥 SNACK BACKGROUND */
        #snack-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        .snack {
            position: absolute;
            top: -50px;
            opacity: 0.3;
            animation: fall linear forwards;
        }

        @keyframes fall {
            to {
                transform: translateY(110vh) rotate(360deg);
            }
        }

        /* MAIN UI */
        .thankyou-container {
            width: 100%;
            max-width: 900px;
            margin: auto;
            margin-top: 100px;
            text-align: center;
            padding: 40px;
            background: #1a1a1a;
            border-radius: 12px;
            position: relative;
            z-index: 2;
        }

        .checkmark {
            font-size: 60px;
            color: #00ffcc;
        }

        h1 {
            color: #00ffcc;
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #00ffcc;
            color: black;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .timer {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>

<!-- ✅ REQUIRED FOR ANIMATION -->
<div id="snack-container"></div>

<div class="thankyou-container">

    <div class="checkmark">✔</div>

    <h1>Order Placed Successfully!</h1>
    <p>Your food is being prepared 🍽️</p>

    <div>
        <a href="orders.php" class="btn">📦 View Orders</a>
        <a href="menu.php" class="btn">🍔 Order Again</a>
    </div>

    <!-- 🍔 25 MIN TIMER -->
    <p id="prep-timer" class="timer" style="color:#ffcc00;">
        Preparing your food...
    </p>

    <!-- 🔄 REDIRECT -->
    <p id="redirect-timer" class="timer" style="color:gray;">
        Redirecting in 5 seconds...
    </p>

</div>

<script>
// 🍔 FOOD TIMER (25 minutes)
let prepTime = 25 * 60;

setInterval(() => {
    let min = Math.floor(prepTime / 60);
    let sec = prepTime % 60;
    sec = sec < 10 ? "0" + sec : sec;

    document.getElementById("prep-timer").innerText =
        "🍽️ Food ready in " + min + ":" + sec;

    prepTime--;

    if (prepTime < 0) {
        document.getElementById("prep-timer").innerText =
            "✅ Your order is ready!";
    }
}, 1000);

// 🔄 REDIRECT TIMER
let time = 5;

let countdown = setInterval(() => {
    time--;

    document.getElementById("redirect-timer").innerText =
        "Redirecting in " + time + " seconds...";

    if (time <= 0) {
        clearInterval(countdown);
        window.location.href = "dashboard.php";
    }
}, 1000);
</script>

<!-- 🔥 YOUR SCRIPT (UNCHANGED) -->
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

</body>
</html>