@extends('layouts.app')

@section('content')

<style>
body {
    background: #f6f8fc;
    font-family: 'Roboto', sans-serif;
}

.g-card {
    width: 450px;
    margin: 80px auto;
    background: #fff;
    padding: 50px 40px 60px;
    border-radius: 8px;
    border: 1px solid #dadce0;
    box-shadow: 0 1px 3px rgba(60,64,67,.3), 0 4px 8px rgba(60,64,67,.15);
    text-align: center;
    position: relative;
}

.g-title {
    font-size: 24px;
    font-weight: 400;
    color: #202124;
    margin-bottom: 20px;
}

.g-message {
    font-size: 16px;
    color: #5f6368;
    margin-bottom: 30px;
}

.g-btn {
    background-color: #1a73e8;
    color: white;
    padding: 10px 24px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.2s ease;
}

.g-btn:hover {
    background-color: #1765cc;
}

/* Animated checkmark */
.checkmark-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: inline-block;
    border: 4px solid #34a853;
    position: relative;
    margin-bottom: 20px;
    animation: bounce 0.6s ease;
}

.checkmark {
    position: absolute;
    left: 22px;
    top: 12px;
    width: 18px;
    height: 36px;
    border: solid #34a853;
    border-width: 0 4px 4px 0;
    transform: rotate(45deg);
    animation: draw 0.4s ease 0.6s forwards;
    opacity: 0;
}

/* Animations */
@keyframes bounce {
    0% { transform: scale(0); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}

@keyframes draw {
    0% { height: 0; opacity: 0; }
    100% { height: 36px; opacity: 1; }
}

@media(max-width:500px){
    .g-card{
        width:90%;
        padding:25px;
        margin:50px auto;
        box-shadow:none;
        border:none;
    }
}
</style>

<div class="g-card">
    <div class="checkmark-circle">
        <div class="checkmark"></div>
    </div>
    <h2 class="g-title">Congratulations!</h2>
    <p class="g-message">You’ve successfully changed your password.</p>
    <a href="/change-password-ui" class="g-btn">Back to Login</a>
</div>

@endsection
