@extends('layouts.app')

@section('content')

<style>
body {
    background: black;
    color: white;
    font-family: 'Roboto', sans-serif;
    overflow: hidden;
    position: relative;
}

/* Screen flickering */
@keyframes flicker {
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 1; }
    20%, 22%, 24%, 55% { opacity: 0.3; }
}
body {
    animation: flicker 0.12s infinite;
}

/* Glitch text animation */
@keyframes glitch {
    0% { clip-path: inset(0 0 0 0); }
    20% { clip-path: inset(20% 0 40% 0); }
    40% { clip-path: inset(40% 0 20% 0); }
    60% { clip-path: inset(60% 0 10% 0); }
    80% { clip-path: inset(10% 0 60% 0); }
    100% { clip-path: inset(0 0 0 0); }
}

/* Glitch noise overlay */
.noise {
    pointer-events: none;
    position: fixed;
    width: 100%;
    height: 100%;
    background-image: url('https://media.giphy.com/media/oEI9uBYSzLpBK/giphy.gif');
    background-size: cover;
    opacity: 0.2;
    mix-blend-mode: screen;
    z-index: 999;
}

/* Floating warnings */
.warning {
    position: absolute;
    color: red;
    font-weight: bold;
    font-size: 22px;
    opacity: 0.9;
    animation: float 4s infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

/* Random glitch text */
.glitch-text {
    position: absolute;
    color: #ff4444;
    font-size: 18px;
    animation: glitch 0.4s infinite;
    opacity: 0.9;
}

/* Main horror card */
.scary-card {
    width: 600px;
    padding: 40px;
    background: rgba(70,0,0,0.95);
    border: 5px solid red;
    border-radius: 10px;
    margin: 100px auto;
    text-align: center;
    z-index: 20;
    animation: shake 0.5s infinite;
}

/* Violent shaking */
@keyframes shake {
    0% { transform: translate(0px, 0px) rotate(0deg); }
    25% { transform: translate(5px, -5px) rotate(-2deg); }
    50% { transform: translate(-5px, 5px) rotate(2deg); }
    75% { transform: translate(5px, 5px) rotate(-1deg); }
    100% { transform: translate(0px, 0px) rotate(0deg); }
}

.scary-title {
    font-size: 32px;
    font-weight: 900;
    color: red;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.scary-message {
    font-size: 18px;
    margin-top: 20px;
    color: #ffcccc;
    line-height: 1.6;
}

/* Panic button */
.scary-btn {
    background: red;
    color: white;
    font-weight: bold;
    padding: 16px 30px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 30px;
    font-size: 20px;
    animation: pulse 0.4s infinite;
    text-decoration: none;
    display: inline-block;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.25); background: darkred; }
    100% { transform: scale(1); }
}

#countdown {
    color: yellow;
    font-size: 30px;
    margin-top: 15px;
}
</style>

<!-- Noise overlay -->
<div class="noise"></div>

<!-- Main Chaos Card -->
<div class="scary-card">
    <div class="scary-title glitch">You've been hacked!! 😡</div>
    
    <p class="scary-message">
        YOU MUST CHANGE YOUR PASSWORD **IMMEDIATELY**!!!  
        If you refuse:  
        <br><br>
        Your grade will be PERMANENTLY LOCKED to  
        <b style="color:yellow;">75%</b>  
        <br><br>
        SYSTEM WILL SELF-DESTRUCT IN:
    </p>

    <div id="countdown">10</div>

    <a href="/change-password" class="scary-btn">CHANGE PASSWORD NOW!!!</a>
</div>

<script>
// Countdown
let t = 10;
setInterval(() => {
    if (t > 0) {
        t--;
        document.getElementById('countdown').innerText = t;
    }
}, 1000);

// Random glitch text spawner
setInterval(() => {
    const text = document.createElement("div");
    text.className = "glitch-text";
    text.innerText = "SYSTEM FAILURE!";
    text.style.top = Math.random() * window.innerHeight + "px";
    text.style.left = Math.random() * window.innerWidth + "px";
    document.body.appendChild(text);

    setTimeout(() => text.remove(), 900);
}, 300);

// Random floating warnings
setInterval(() => {
    const warn = document.createElement("div");
    warn.className = "warning";
    warn.innerText = "⚠️ WARNING ⚠️";
    warn.style.top = Math.random() * window.innerHeight + "px";
    warn.style.left = Math.random() * window.innerWidth + "px";
    document.body.appendChild(warn);

    setTimeout(() => warn.remove(), 4000);
}, 800);
</script>

@endsection
