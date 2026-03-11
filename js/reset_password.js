// ==================================
//  VisionCycle – Reset Password Logic
// ==================================

// ── Toggle Password Visibility ──
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);

    if (input.type === 'password') {
        input.type = 'text';
        icon.src   = 'drawable/open_password.png';
    } else {
        input.type = 'password';
        icon.src   = 'drawable/close_password.png';
    }
}

// ── Reset Password Validation ──
function resetPassword() {
    const np        = document.getElementById('newPass').value;
    const cp        = document.getElementById('confirmPass').value;
    const passError = document.getElementById('passError');

    if (!np || !cp) {
        passError.textContent    = 'Please fill in all fields.';
        passError.style.display  = 'block';
        return;
    }

    if (np !== cp) {
        passError.textContent    = 'Passwords do not match.';
        passError.style.display  = 'block';
        return;
    }

    passError.style.display = 'none';
    document.getElementById('successOverlay').classList.add('active');
}

// ── Redirect to Login ──
function goLogin() {
    window.location.href = 'login.php';
}