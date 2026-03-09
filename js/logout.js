document.addEventListener('DOMContentLoaded', function () {

    var overlay   = document.getElementById('logoutOverlay');
    var btnNo     = document.getElementById('btnNo');
    var btnYes    = document.getElementById('btnYes');
    var logoutBtn = document.querySelector('.logout-item');

    // Show modal when Logout is clicked
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            overlay.classList.add('show');
        });
    }

    // No — close modal
    if (btnNo) {
        btnNo.addEventListener('click', function () {
            overlay.classList.remove('show');
        });
    }

    // Click outside modal box — close modal
    if (overlay) {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) {
                overlay.classList.remove('show');
            }
        });
    }

    // Yes — go to login
    if (btnYes) {
        btnYes.addEventListener('click', function () {
            window.location.href = 'login.php';
        });
    }

});