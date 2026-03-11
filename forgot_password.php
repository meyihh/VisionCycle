<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/forgot_password.css" rel="stylesheet">
</head>
<body>

<!-- Forgot Password Card -->
<div class="card shadow">

    <div class="text-center mb-4">
        <img src="drawable/logo.png" alt="Logo" class="logo-img">
        <div class="brand">VisionCycle</div>
    </div>

    <div class="text-center mb-4">
        <div class="page-title mb-3">Forgot Password</div>
        <p class="desc">Enter your email address and we'll send you a code to reset your password</p>
    </div>

    <div class="mb-3">
        <label for="emailInput">Email</label>
        <input type="email" id="emailInput" class="form-control mt-1" placeholder="example@gmail.com">
        <div id="emailError" style="color:#dc3545;font-size:13px;margin-top:4px;display:none;">
            Please enter your email.
        </div>
    </div>

    <button class="btn-send mt-3" onclick="showOTP()">Send</button>

</div>

<!-- OTP Modal -->
<div class="overlay" id="otpOverlay">
    <div class="otp-modal shadow">

        <div class="otp-title">Enter OTP</div>
        <div class="otp-desc">We sent a 6-digit code to your email.</div>

        <div class="otp-boxes">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
            <input type="text" maxlength="1" class="otp-input">
        </div>

        <div class="otp-actions">
            <button class="btn-cancel" onclick="closeOTP()">Cancel</button>
            <button class="btn-verify" onclick="verifyOTP()">Verify OTP</button>
        </div>

        <div id="otpError" style="color:#dc3545;font-size:13px;margin-top:10px;text-align:center;display:none;">
            Please enter all 6 digits.
        </div>

    </div>
</div>

<script src="js/forgot_password.js"></script>
</body>
</html>