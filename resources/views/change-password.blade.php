@extends('layouts.app')

@section('content')

<div class="g-card">
    <h2 class="g-title">Change password</h2>

    <!-- Alerts -->
    @if(session('success'))
        <div id="success-message" class="g-alert success show">{{ session('success') }}</div>
    @endif
    <div id="error-message" class="g-alert error">Passwords do not match!</div>

    <form id="change-password-form" method="POST" action="{{ url('/change-password') }}">
        @csrf

        <div class="g-input-group">
            <input type="password" name="current_password" class="g-input" placeholder=" " required>
            <label class="g-label">Current password</label>
        </div>

        <div class="g-input-group">
            <input type="password" name="new_password" class="g-input" placeholder=" " required>
            <label class="g-label">New password</label>
        </div>

        <div class="g-input-group">
            <input type="password" name="new_password_confirmation" class="g-input" placeholder=" " required>
            <label class="g-label">Confirm new password</label>
        </div>

        <button class="g-btn" type="submit">Save password</button>
    </form>
</div>

<style>
/* Include your pixel-perfect Gmail CSS here (from previous HTML) */
.g-card { width:450px; margin:60px auto; background:#fff; padding:36px 40px 48px; border-radius:8px; border:1px solid #dadce0; box-shadow:0 1px 3px rgba(60,64,67,.3),0 4px 8px rgba(60,64,67,.15); position:relative; }
.g-title { font-size:24px; font-weight:400; color:#202124; margin-bottom:28px; }
.g-input-group { position:relative; margin-top:24px; }
.g-input { width:100%; padding:14px 12px 14px; font-size:16px; border:1px solid #dadce0; border-radius:4px; background:transparent; transition: all 0.15s ease-out; }
.g-input:focus { border:2px solid #1a73e8; padding:13px 11px 13px; outline:none; }
.g-label { position:absolute; left:12px; top:16px; font-size:16px; font-weight:400; color:#5f6368; pointer-events:none; transition:0.2s ease all; background:#fff; padding:0 4px; }
.g-input:focus + .g-label, .g-input:not(:placeholder-shown) + .g-label { top:-6px; font-size:12px; color:#1a73e8; font-weight:500; }
.g-alert { position:absolute; top:-60px; left:0; right:0; padding:12px; border-radius:4px; font-size:14px; opacity:0; transform:translateY(-20px); transition:all 0.3s ease-out; text-align:center; }
.g-alert.success { background:#e6f4ea; border-left:4px solid #137333; color:#137333; }
.g-alert.error { background:#fce8e6; border-left:4px solid #d93025; color:#d93025; }
.g-alert.show { opacity:1; transform:translateY(0); }
.g-btn { background-color:#1a73e8; color:white; padding:10px 24px; border:none; border-radius:4px; font-size:14px; font-weight:500; cursor:pointer; float:right; margin-top:28px; transition:background 0.2s ease-out; }
.g-btn:hover { background-color:#1765cc; }
@media(max-width:500px){.g-card{width:90%; padding:25px; margin:25px auto; box-shadow:none; border:none;}}
</style>

<script>
document.getElementById('change-password-form').addEventListener('submit', function(e) {
    const newPass = this.new_password.value;
    const confirmPass = this.new_password_confirmation.value;
    const errorAlert = document.getElementById('error-message');

    // Hide error initially
    errorAlert.classList.remove('show');

    if(newPass !== confirmPass) {
        e.preventDefault();
        errorAlert.classList.add('show');
    }
});
</script>

@endsection
