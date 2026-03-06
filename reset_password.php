<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            background: linear-gradient(180deg, #EBF4DD 0%, #90AB8B 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 460px;
            border-radius: 15px;
            border: none;
            background: #F8F9FA;
            padding: 36px 52px 44px;
        }

        .logo-img   { width: 90px; height: 90px; object-fit: contain; }
        .brand      { font-size: 24px; font-weight: 700; color: #75B06F; }
        .page-title { font-size: 24px; font-weight: 600; color: #75B06F; }

        label { font-size: 15px; color: #2C2C2C; }

        .form-control {
            height: 42px;
            font-size: 15px;
            border: 1px solid #B3B3B3;
            border-radius: 8px;
            background: #F8F9FA;
        }
        .form-control:focus {
            border: 2px solid #75B06F;
            box-shadow: none;
            background: #F8F9FA;
        }

        .pass-wrap { position: relative; }
        .pass-wrap .form-control { padding-right: 50px; }
        .eye-btn {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none; padding: 0; cursor: pointer;
        }
        .eye-btn img { width: 25px; height: 25px; opacity: .6; }
        .eye-btn:hover img { opacity: 1; }

        .btn-reset {
            width: 100%; height: 42px;
            background: #75B06F; border: 2px solid #75B06F;
            border-radius: 8px; color: #fff;
            font-size: 16px; font-weight: 600;
            transition: .2s;
        }
        .btn-reset:hover { background: transparent; color: #75B06F; }

        /* ── Overlay ── */
        .overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,.45); z-index: 100;
            align-items: center; justify-content: center;
        }
        .overlay.active { display: flex; }

        /* ── Success Dialog ── */
        .success-modal {
            width: 420px; background: #fff; border-radius: 10px;
            padding: 32px 36px 36px; text-align: center;
        }
        .success-title { font-size: 24px; font-weight: 500; color: #000; margin-bottom: 16px; }
        .success-msg   { font-size: 18px; color: #000; margin-bottom: 24px; }
        .btn-okay {
            width: 160px; height: 42px;
            background: #75B06F; border: 2px solid #75B06F;
            border-radius: 5px; color: #fff;
            font-size: 18px; font-weight: 500; transition: .2s;
        }
    </style>
</head>
<body>

<div class="card shadow">

    <!-- Logo -->
    <div class="text-center mb-4">
        <img src="drawable/logo.png" alt="Logo" class="logo-img">
        <div class="brand">VisionCycle</div>
    </div>

    <!-- Title -->
    <div class="text-center mb-4">
        <div class="page-title">Reset Password</div>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control mt-1" placeholder="example@gmail.com">
    </div>

    <!-- New Password -->
    <div class="mb-3">
        <label>New Password</label>
        <div class="pass-wrap mt-1">
            <input type="password" id="newPass" class="form-control" placeholder="Enter new password">
            <button type="button" class="eye-btn" onclick="togglePass('newPass', 'eyeNew')">
                <img src="drawable/close_password.png" id="eyeNew">
            </button>
        </div>
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <label>Confirm Password</label>
        <div class="pass-wrap mt-1">
            <input type="password" id="confirmPass" class="form-control" placeholder="Re-enter your password">
            <button type="button" class="eye-btn" onclick="togglePass('confirmPass', 'eyeConfirm')">
                <img src="drawable/close_password.png" id="eyeConfirm">
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
        <div class="success-msg">Password updated succesfully</div>
        <button class="btn-okay" onclick="goLogin()">Okay</button>
    </div>
</div>

<script>
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.src = 'drawable/open_password.png';
    } else {
        input.type = 'password';
        icon.src = 'drawable/close_password.png';
    }
}

function resetPassword() {
    const np = document.getElementById('newPass').value;
    const cp = document.getElementById('confirmPass').value;
    const passError = document.getElementById('passError');
    if (!np || !cp) {
        passError.textContent = 'Please fill in all fields.';
        passError.style.display = 'block';
        return;
    }
    if (np !== cp) {
        passError.textContent = 'Passwords do not match.';
        passError.style.display = 'block';
        return;
    }
    passError.style.display = 'none';
    document.getElementById('successOverlay').classList.add('active');
}

function goLogin() {
    window.location.href = 'login.php';
}
</script>

</body>
</html>