@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CHANGE YOUR PASSWORD OR ELSE</title>

<style>
    body {
        background: #000 !important;
        color: red;
        overflow: hidden;
        font-family: "Arial Black", sans-serif;
        animation: flicker 0.2s infinite;
    }

    @keyframes flicker {
        0%, 100% { opacity: 1; }
        50% { opacity: .97; }
    }

    .warning-top {
        background: red;
        color: white;
        padding: 10px;
        text-align: center;
        font-size: 22px;
        animation: blink 0.5s infinite;
    }

    @keyframes blink {
        0%,100% { opacity: 1; }
        50% { opacity: 0.2; }
    }

    .card-chaos {
        width: 480px;
        margin: 190px auto;
        padding: 40px;
        background: #111;
        text-align: center;
        border: 4px solid red;
        box-shadow: 0 0 30px red;
        animation: shake 0.2s infinite;
    }

    @keyframes shake {
        0% { transform: translate(0,0); }
        50% { transform: translate(2px,-2px); }
        100% { transform: translate(-2px,2px); }
    }

    .g-input {
        width: 100%;
        margin-top: 18px;
        padding: 12px;
        font-size: 18px;
        border: 3px solid red;
        background: black;
        color: white;
    }

    .btn-chaos {
        margin-top: 25px;
        padding: 15px 25px;
        font-size: 22px;
        background: red;
        border: none;
        color: white;
        cursor: pointer;
        width: 100%;
        animation: pulse 0.3s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.15); }
        100% { transform: scale(1); }
    }

    /* random floating error messages */
    .float-error {
        position: absolute;
        color: red;
        font-size: 14px;
        animation: floatUp 1s linear forwards;
    }

    @keyframes floatUp {
        0% { transform: translateY(0px); opacity: 1; }
        100% { transform: translateY(-60px); opacity: 0; }
    }

    .countdown {
        font-size: 25px;
        margin-top: 20px;
        color: white;
        text-shadow: 0 0 10px red;
    }
</style>
</head>

<body>

<div class="warning-top">
    ⚠️ SYSTEM BREACH DETECTED — CHANGE YOUR PASSWORD IMMEDIATELY ⚠️
</div>

<div class="card-chaos">

    <h2 style="color:white;">CHANGE PASSWORD NOW</h2>

    <p style="color:#ff4444; font-size:15px;">
        Failure to update your password will result in  
        <br><br>
        <span style="font-size:27px; color:red;">GRADE: 75 😈</span>
        <br><br>
        And possibly your laptop exploding 💥
    </p>

    <!-- COUNTDOWN TIMER -->
    <div class="countdown">
        Time remaining: <span id="timer">15</span> seconds
    </div>

    <form method="POST" action="/change-password">
        @csrf

        <input type="password" name="current_password" class="g-input" placeholder="Current Password">
        <br>

        <input type="password" name="new_password" class="g-input" placeholder="New Password">
        <br>

        <input type="password" name="new_password_confirmation" class="g-input" placeholder="Confirm Password">
        <br>

        <button class="btn-chaos" type="submit">SAVE BEFORE IT'S TOO LATE</button>
    </form>
</div>

<script>
// COUNTDOWN — PAGE EXPLODES (kidding… maybe)
let timeLeft = 15;
let timer = setInterval(() => {
    document.getElementById("timer").innerText = timeLeft;

    if (timeLeft <= 0) {
        alert("TOO LATE. YOU HAVE FAILED YOUR INSTRUCTOR 😈");
        window.location.href = "/instructor-message";
    }

    timeLeft--;
}, 1000);


// RANDOM FLOATING ERRORS
setInterval(() => {
    const msg = document.createElement("div");
    msg.className = "float-error";
    msg.style.left = Math.random() * window.innerWidth + "px";
    msg.style.top = Math.random() * window.innerHeight + "px";
    msg.innerText = "⚠ SYSTEM ERROR 0x00" + Math.floor(Math.random() * 999);

    document.body.appendChild(msg);
    setTimeout(() => msg.remove(), 1000);
}, 400);


// RANDOM SCREEN SHAKE
setInterval(() => {
    document.body.style.transform = "translate(3px, -3px)";
    setTimeout(() => document.body.style.transform = "translate(0,0)", 80);
}, 700);

</script>

</body>
</html>
@endsection
