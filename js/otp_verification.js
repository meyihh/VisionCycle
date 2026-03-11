// ====================================
//  VisionCycle – OTP Verification Logic
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

// Auto-focus first input on page load
window.addEventListener('DOMContentLoaded', () => {
    otpInputs[0].focus();
});

// ── Verify OTP ──
function verifyOTP() {
    const code     = [...otpInputs].map(i => i.value).join('');
    const otpError = document.getElementById('otpError');

    if (code.length < 6) {
        otpError.style.display = 'block';
        return;
    }

    otpError.style.display = 'none';
    window.location.href = 'reset_password.php';
}