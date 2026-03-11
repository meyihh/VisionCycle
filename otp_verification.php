<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/otp_verification.css" rel="stylesheet">
</head>
<body>

<!-- OTP Verification Card -->
<div class="card shadow">

    <div class="text-center mb-4">
        <img src="drawable/logo.png" alt="Logo" class="logo-img">
        <div class="brand">VisionCycle</div>
    </div>

    <div class="text-center mb-4">
        <div class="page-title mb-3">Enter OTP</div>
        <p class="desc">We sent a 6-digit code to your email.</p>
    </div>

    <div class="otp-boxes mb-4">
        <input type="text" maxlength="1" class="otp-input">
        <input type="text" maxlength="1" class="otp-input">
        <input type="text" maxlength="1" class="otp-input">
        <input type="text" maxlength="1" class="otp-input">
        <input type="text" maxlength="1" class="otp-input">
        <input type="text" maxlength="1" class="otp-input">
    </div>

    <div id="otpError" style="color:#dc3545;font-size:13px;margin-bottom:12px;text-align:center;display:none;">
        Please enter all 6 digits.
    </div>

    <div class="otp-actions">
        <button class="btn-cancel" onclick="window.location.href='forgot_password.php'">Cancel</button>
        <button class="btn-verify" onclick="verifyOTP()">Verify OTP</button>
    </div>

</div>

<script src="js/otp_verification.js"></script>
</body>
</html>