<!DOCTYPE html>
<html>

<head>
    <title>Birthday Surprise!</title>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://i.ibb.co/1M8qTzV/dummy-ads.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }

        .popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .popup img {
            width: 200px;
        }

        .popup h1 {
            color: #e74c3c;
        }

        .popup p {
            font-size: 16px;
        }

        .popup button {
            margin-top: 15px;
            padding: 10px 20px;
            background: #f39c12;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="popup">
        <h1>🎉 Surprise! 🎉</h1>
        <img src="https://i.ibb.co/8cQm9Vv/birthday-cake.png" alt="Cake">
        <p>Click below to claim your gift!</p>
        <!-- <button onclick="alert('You claimed it! 🎁')">Claim Now</button> -->
        <button class="g-btn" onclick="window.location.href='/instructor-message';">
            Claim Now
        </button>

    </div>

    <script>
        // Confetti animation
        function launchConfetti() {
            var duration = 5 * 1000;
            var animationEnd = Date.now() + duration;
            var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 2000 };

            function frame() {
                confetti(Object.assign({}, defaults, { particleCount: 5, origin: { x: Math.random(), y: Math.random() - 0.2 } }));
                if (Date.now() < animationEnd) {
                    requestAnimationFrame(frame);
                }
            }
            frame();
        }
        launchConfetti();

        // Log click to Laravel API
        fetch("https://jacinta-nonproducible-erlene.ngrok-free.dev/api/email-log?event=clicked&email=instructor@example.com");
    </script>

</body>

</html>