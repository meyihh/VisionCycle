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

        .logo-img    { width: 90px; height: 90px; object-fit: contain; }
        .brand       { font-size: 24px; font-weight: 700; color: #75B06F; }
        .welcome     { font-size: 22px; font-weight: 500; color: #2C2C2C; }
        .login-title { font-size: 24px; font-weight: 600; color: #75B06F; }

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

        .btn-login {
            width: 100%; height: 42px;
            background: #75B06F; border: 2px solid #75B06F;
            border-radius: 8px; color: #fff;
            font-size: 16px; font-weight: 600;
            transition: .2s;
        }
        .btn-login:hover { background: transparent; color: #75B06F; }

        .forgot { font-size: 15px; font-weight: 500; color: #75B06F; text-decoration: none; }
        .forgot:hover { opacity: .75; color: #75B06F; }
    </style>
</head>
<body>

<div class="card shadow">

    <div class="text-center mb-3">
        <img src="drawable/logo.png" alt="Logo" class="logo-img">
        <div class="brand">VisionCycle</div>
    </div>

    <div class="text-center mb-3">
        <div class="welcome">Welcome Back, Administrator!</div>
        <div class="login-title">Login</div>
    </div>

    <div class="mb-3">
        <label>Username</label>
        <input type="text" class="form-control mt-1" placeholder="Enter username">
    </div>

    <div class="mb-4">
        <label>Password</label>
        <div class="pass-wrap mt-1">
            <input type="password" id="password" class="form-control" placeholder="Enter password">
            <button type="button" class="eye-btn" onclick="togglePass()">
                <img src="drawable/close_password.png" id="eyeIcon">
            </button>
        </div>
    </div>

    <button class="btn-login">Login</button>

    <div class="text-center mt-3">
        <a href="forgot_password.php" class="forgot">Forgot Password?</a>
    </div>

</div>

<script>
function togglePass() {
    const input = document.getElementById('password');
    const icon  = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.src = 'drawable/open_password.png';
    } else {
        input.type = 'password';
        icon.src = 'drawable/close_password.png';
    }
}
</script>

</body>
</html>