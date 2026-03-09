// ====================================
//  VisionCycle – Forgot Password Logic
// ====================================

const otpInputs = document.querySelectorAll('.otp-input');

// ── OTP Input Behaviour ──
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

// ── Show OTP Modal ──
function showOTP() {
    const email      = document.getElementById('emailInput').value.trim();
    const emailError = document.getElementById('emailError');

    if (!email) {
        emailError.style.display = 'block';
        return;
    }

    emailError.style.display = 'none';
    document.getElementById('otpOverlay').classList.add('active');
    otpInputs[0].focus();
}

// ── Close OTP Modal ──
function closeOTP() {
    document.getElementById('otpOverlay').classList.remove('active');
    otpInputs.forEach(i => {
        i.value = '';
        i.classList.remove('filled');
    });
    document.getElementById('otpError').style.display = 'none';
}

// ── Verify OTP ──
function verifyOTP() {
    const code     = [...otpInputs].map(i => i.value).join('');
    const otpError = document.getElementById('otpError');

    if (code.length < 6) {
        otpError.style.display = 'block';
        return;
    }

    window.location.href = 'reset_password.php';
}