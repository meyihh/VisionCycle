<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
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
        <label for="username">Username</label>
        <input type="text" id="username" class="form-control mt-1" placeholder="Enter username">
    </div>

    <div class="mb-4">
        <label for="password">Password</label>
        <div class="pass-wrap mt-1">
            <input type="password" id="password" class="form-control" placeholder="Enter password">
            <button type="button" class="eye-btn" onclick="togglePass()" aria-label="Toggle password visibility">
                <img src="drawable/close_password.png" id="eyeIcon" alt="Show/Hide password">
            </button>
        </div>
    </div>

    <button class="btn-login">Login</button>

    <div class="text-center mt-3">
        <a href="forgot_password.php" class="forgot">Forgot Password?</a>
    </div>

</div>

<script src="js/login.js"></script>
</body>
</html>