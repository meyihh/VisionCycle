<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Roboto', sans-serif; }

        body {
            min-height: 100vh;
            background: linear-gradient(180deg, #EBF4DD 0%, #90AB8B 100%);
            display: flex; align-items: center; justify-content: center;
        }

        .card {
            width: 460px; border-radius: 15px; border: none;
            background: #F8F9FA; padding: 36px 52px 44px;
        }
        .logo-img   { width: 90px; height: 90px; object-fit: contain; }
        .brand      { font-size: 24px; font-weight: 700; color: #75B06F; }
        .page-title { font-size: 24px; font-weight: 600; color: #75B06F; }
        .desc       { font-size: 15px; color: #2C2C2C; text-align: center; }
        label       { font-size: 15px; color: #2C2C2C; }

        .form-control {
            height: 42px; font-size: 15px;
            border: 1px solid #B3B3B3; border-radius: 8px; background: #F8F9FA;
        }
        .form-control:focus {
            border-color: #75B06F;
            box-shadow: 0 0 0 3px rgba(117,176,111,.2);
            background: #F8F9FA;
        }
        .btn-send {
            width: 100%; height: 42px;
            background: #75B06F; border: 2px solid #75B06F;
            border-radius: 8px; color: #fff;
            font-size: 16px; font-weight: 600; transition: .2s;
        }
        .btn-send:hover { background: transparent; color: #75B06F; }
        .back-link { font-size: 14px; font-weight: 500; color: #75B06F; text-decoration: none; }
        .back-link:hover { opacity: .75; color: #75B06F; }

        /* ── Overlay ── */
        .overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,.45); z-index: 100;
            align-items: center; justify-content: center;
        }
        .overlay.active { display: flex; }

        /* ── OTP Modal ── */
        .otp-modal {
            width: 520px; background: #fff;
            border-radius: 15px; padding: 28px 40px 36px;
        }
        .otp-title { font-size: 24px; font-weight: 600; color: #000; text-align: center; margin-bottom: 8px; }
        .otp-desc  { font-size: 15px; color: #4C4C4C; text-align: center; margin-bottom: 24px; }
        .otp-boxes { display: flex; gap: 12px; justify-content: center; margin-bottom: 24px; }
        .otp-boxes input {
            width: 58px; height: 66px;
            border: 1px solid #B3B3B3; border-radius: 5px;
            font-size: 26px; font-weight: 500; text-align: center;
            color: #000; background: #fff; outline: none; transition: border .15s;
        }
        .otp-boxes input:focus,
        .otp-boxes input.filled { border: 2px solid #75B06F; }
        .btn-cancel {
            flex: 1; height: 42px; background: #D9D9D9; border: none;
            border-radius: 8px; color: #4C4C4C; font-size: 16px; font-weight: 500; transition: .2s;
        }
        .btn-verify {
            flex: 1; height: 42px;
            background: #75B06F; border: 2px solid #75B06F;
            border-radius: 8px; color: #fff; font-size: 16px; font-weight: 500; transition: .2s;
        }
    </style>
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
        <label>Email</label>
        <input type="email" id="emailInput" class="form-control mt-1" placeholder="example@gmail.com">
        <div id="emailError" style="color:#dc3545;font-size:13px;margin-top:4px;display:none;">Please enter your email.</div>
    </div>
    <button class="btn-send mt-3" onclick="showOTP()">Send</button>
</div>

<!-- OTP Overlay -->
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
        <div class="d-flex gap-3">
            <button class="btn-cancel" onclick="closeOTP()">Cancel</button>
            <button class="btn-verify" onclick="verifyOTP()">Verify OTP</button>
        </div>
        <div id="otpError" style="color:#dc3545;font-size:13px;margin-top:10px;text-align:center;display:none;">Please enter all 6 digits.</div>
    </div>
</div>

<script>
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, idx) => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '');
            if (input.value) {
                input.classList.add('filled');
                if (idx < 5) otpInputs[idx + 1].focus();
            } else {
                input.classList.remove('filled');
            }
        });
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !input.value && idx > 0) {
                otpInputs[idx - 1].focus();
            }
        });
    });

    function showOTP() {
        const email = document.getElementById('emailInput').value.trim();
        const emailError = document.getElementById('emailError');
        if (!email) { emailError.style.display = 'block'; return; }
        emailError.style.display = 'none';
        document.getElementById('otpOverlay').classList.add('active');
        otpInputs[0].focus();
    }

    function closeOTP() {
        document.getElementById('otpOverlay').classList.remove('active');
        otpInputs.forEach(i => { i.value = ''; i.classList.remove('filled'); });
        document.getElementById('otpError').style.display = 'none';
    }

    function verifyOTP() {
        const code = [...otpInputs].map(i => i.value).join('');
        if (code.length < 6) {
            document.getElementById('otpError').style.display = 'block';
            return;
        }
        window.location.href = 'reset_password.php';
    }
</script>

</body>
</html>