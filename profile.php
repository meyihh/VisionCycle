<?php $activePage = 'profile'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionCycle - Profile</title>
    <link rel="icon" type="image/png" href="drawable/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/logout.css" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Main -->
<div class="main-wrapper">

    <div class="page-title">Profile</div>
    <div class="page-subtitle">Manage your administrator account</div>

    <div class="cards-row">

        <!-- Account Information -->
        <div class="profile-card">
            <div class="card-title">Account Information</div>

            <div class="field-group">
                <label class="field-label">Name</label>
                <div class="input-wrap">
                    <input type="text" id="nameInput" value="System Admin">
                    <button class="edit-btn" onclick="toggleEdit('nameInput', this)">
                        <img src="drawable/edit_account.png" alt="edit">
                    </button>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Username</label>
                <div class="input-wrap">
                    <input type="text" id="usernameInput" value="admin123">
                    <button class="edit-btn" onclick="toggleEdit('usernameInput', this)">
                        <img src="drawable/edit_account.png" alt="edit">
                    </button>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <div class="input-wrap">
                    <input type="email" id="emailInput" value="admin1@gmail.com">
                    <button class="edit-btn" onclick="toggleEdit('emailInput', this)">
                        <img src="drawable/edit_account.png" alt="edit">
                    </button>
                </div>
                <div id="accountError" class="field-error"></div>
            </div>

            <button class="submit-btn" onclick="saveChanges()">Save Changes</button>
        </div>

        <!-- Change Password -->
        <div class="profile-card">
            <div class="card-title">Change Password</div>

            <div class="field-group">
                <label class="field-label">Old Password</label>
                <div class="input-wrap">
                    <input type="password" id="oldPass" placeholder="Enter old password">
                    <button class="pass-toggle" onclick="togglePass('oldPass', this)">
                        <img src="drawable/close_password.png" alt="toggle">
                    </button>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">New Password</label>
                <div class="input-wrap">
                    <input type="password" id="newPass" placeholder="Enter new password">
                    <button class="pass-toggle" onclick="togglePass('newPass', this)">
                        <img src="drawable/close_password.png" alt="toggle">
                    </button>
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Confirm New Password</label>
                <div class="input-wrap">
                    <input type="password" id="confirmPass" placeholder="Re-enter your password">
                    <button class="pass-toggle" onclick="togglePass('confirmPass', this)">
                        <img src="drawable/close_password.png" alt="toggle">
                    </button>
                </div>
                <div id="passError" class="field-error"></div>
            </div>

            <button class="submit-btn" onclick="updatePassword()">Update Password</button>
        </div>

    </div>
</div>

<!-- Toast Container -->
<div class="toast-container" id="toastContainer"></div>

<!-- Logout Modal -->
<?php include 'logout.php'; ?>

<script src="js/profile.js"></script>
<script src="js/logout.js"></script>

</body>
</html>