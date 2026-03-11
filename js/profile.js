// =====================================
//  VisionCycle – Profile Logic
// =====================================

// ── Toggle edit (enable/disable input) ──
function toggleEdit(inputId, btn) {
    const input = document.getElementById(inputId);
    const isDisabled = input.disabled;

    // Disable all fields first
    ['nameInput', 'usernameInput', 'emailInput'].forEach(id => {
        const el = document.getElementById(id);
        el.disabled = true;
        el.closest('.input-wrap').querySelector('.edit-btn img').style.opacity = '.7';
    });

    // Enable clicked field
    if (isDisabled) {
        input.disabled = false;
        input.focus();
        btn.querySelector('img').style.opacity = '1';
    }
}

// ── Toggle password visibility ──
function togglePass(inputId, btn) {
    const input = document.getElementById(inputId);
    const img   = btn.querySelector('img');
    if (input.type === 'password') {
        input.type = 'text';
        img.src = 'drawable/open_password.png';
    } else {
        input.type = 'password';
        img.src = 'drawable/close_password.png';
    }
}

// ── Save Changes ──
function saveChanges() {
    const name     = document.getElementById('nameInput').value.trim();
    const username = document.getElementById('usernameInput').value.trim();
    const email    = document.getElementById('emailInput').value.trim();
    const accountError = document.getElementById('accountError');

    if (!name || !username || !email) {
        accountError.textContent = 'Please fill in all fields.';
        return;
    }

    accountError.textContent = '';

    // Disable fields after saving
    ['nameInput', 'usernameInput', 'emailInput'].forEach(id => {
        document.getElementById(id).disabled = true;
    });

    showToast('Changes saved successfully!');
}

// ── Update Password ──
function updatePassword() {
    const oldPass     = document.getElementById('oldPass').value;
    const newPass     = document.getElementById('newPass').value;
    const confirmPass = document.getElementById('confirmPass').value;
    const passError   = document.getElementById('passError');

    if (!oldPass || !newPass || !confirmPass) {
        passError.textContent = 'Please fill in all password fields.';
        return;
    }
    if (newPass !== confirmPass) {
        passError.textContent = 'New passwords do not match.';
        return;
    }
    if (newPass.length < 6) {
        passError.textContent = 'Password must be at least 6 characters.';
        return;
    }

    passError.textContent = '';

    // Clear fields
    document.getElementById('oldPass').value     = '';
    document.getElementById('newPass').value     = '';
    document.getElementById('confirmPass').value = '';

    showToast('Password changed successfully!');
}

// ── Show Toast ──
function showToast(message) {
    const container = document.getElementById('toastContainer');

    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = `
        <svg class="toast-icon" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12.5" cy="12.5" r="12.5" fill="#008000"/>
            <path d="M7 13L11 17L18 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="toast-msg">${message}</span>
        <button class="toast-close" onclick="dismissToast(this.parentElement)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#1D1B20" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    `;

    container.appendChild(toast);

    // Animate in
    requestAnimationFrame(() => {
        requestAnimationFrame(() => toast.classList.add('show'));
    });

    // Auto dismiss after 3.5s
    setTimeout(() => dismissToast(toast), 3500);
}

// ── Dismiss Toast ──
function dismissToast(toast) {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 350);
}

// ── Init: disable all fields on load ──
document.addEventListener('DOMContentLoaded', function () {
    ['nameInput', 'usernameInput', 'emailInput'].forEach(id => {
        document.getElementById(id).disabled = true;
    });
});