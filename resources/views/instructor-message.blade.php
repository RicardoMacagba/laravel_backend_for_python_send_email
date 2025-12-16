@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>MESSAGE FROM YOUR INSTRUCTOR</title>

<style>
    body {
        background: #111 !important;
        color: white;
        font-family: "Arial Black", sans-serif;
        overflow: hidden;
    }

    .ad {
        position: absolute;
        background: yellow;
        color: black;
        padding: 10px;
        font-size: 14px;
        border: 2px solid red;
        transform: rotate(-2deg);
        animation: shake 0.3s infinite;
        pointer-events: none;
    }

    @keyframes shake {
        0% { transform: rotate(-2deg) translate(0,0); }
        50% { transform: rotate(3deg) translate(2px,-2px); }
        100% { transform: rotate(-2deg) translate(-2px,2px); }
    }

    .card-chaos {
        width: 500px;
        margin: 120px auto;
        background: #222;
        padding: 40px;
        text-align: center;
        border-radius: 8px;
        border: 3px solid red;
        box-shadow: 0 0 20px red;
    }

    .btn-chaos {
        margin-top: 20px;
        padding: 15px 25px;
        font-size: 18px;
        background: red;
        border: none;
        color: white;
        cursor: pointer;
        animation: btnPulse 0.3s infinite;
    }

    @keyframes btnPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.07); }
        100% { transform: scale(1); }
    }
</style>
</head>

<body>

<!-- FAKE ADS -->
<div class="ad" style="top:20px; left:10px;">🔥 BUY 1 TAKE 99 LAPTOPS</div>
<div class="ad" style="top:60px; right:20px;">💰 EARN ₱500,000/hr</div>
<div class="ad" style="bottom:40px; left:30px;">⚡ FREE LOAD 10GB</div>
<div class="ad" style="bottom:80px; right:10px;">🍔 FREE BURGER?</div>

<div class="card-chaos">
    <h2 style="color:red; margin-bottom:20px;">MESSAGE FROM YOUR INSTRUCTOR</h2>

    <p style="font-size:18px;">
        I AM YOUR INSTRUCTOR  
        <br><br>
        AND I COMMAND YOU  
        <br><br>
        TO CHANGE YOUR PASSWORD  
        <br><br>
        OR YOUR GRADE WILL BE:  
        <br><span style="font-size:40px; color:red;">75 😈</span>  
        <br><br>
        DO NOT TEST ME.
    </p>

    <button class="btn-chaos" onclick="window.location.href='/change-password'">
        CHANGE PASSWORD NOW
    </button>
</div>

</body>
</html>
@endsection
