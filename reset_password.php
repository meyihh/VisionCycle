<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/reset_password.css" rel="stylesheet">
</head>
<body>

<!-- Reset Password Card -->
<div class="card shadow">

    <div class="text-center mb-4">
        <img src="drawable/logo.png" alt="Logo" class="logo-img">
        <div class="brand">VisionCycle</div>
    </div>

    <div class="text-center mb-4">
        <div class="page-title">Reset Password</div>
    </div>

    <div class="mb-3">
        <label for="emailField">Email</label>
        <input type="email" id="emailField" class="form-control mt-1" placeholder="example@gmail.com">
    </div>

    <div class="mb-3">
        <label for="newPass">New Password</label>
        <div class="pass-wrap mt-1">
            <input type="password" id="newPass" class="form-control" placeholder="Enter new password">
            <button type="button" class="eye-btn" onclick="togglePass('newPass', 'eyeNew')" aria-label="Toggle new password">
                <img src="drawable/close_password.png" id="eyeNew" alt="">
            </button>
        </div>
    </div>

    <div class="mb-4">
        <label for="confirmPass">Confirm Password</label>
        <div class="pass-wrap mt-1">
            <input type="password" id="confirmPass" class="form-control" placeholder="Re-enter your password">
            <button type="button" class="eye-btn" onclick="togglePass('confirmPass', 'eyeConfirm')" aria-label="Toggle confirm password">
                <img src="drawable/close_password.png" id="eyeConfirm" alt="">
            </button>
        </div>
        <div id="passError" style="color:#dc3545;font-size:13px;margin-top:6px;display:none;"></div>
    </div>

    <button class="btn-reset mt-2" onclick="resetPassword()">Reset Password</button>

</div>

<!-- Success Overlay -->
<div class="overlay" id="successOverlay">
    <div class="success-modal shadow">
        <div class="success-title">Reset Password</div>
        <div class="success-msg">Password updated successfully</div>
        <button class="btn-okay" onclick="goLogin()">Okay</button>
    </div>
</div>

<script src="js/reset_password.js"></script>
</body>
</html>