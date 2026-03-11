function togglePass() {
    const input = document.getElementById('password');
    const icon  = document.getElementById('eyeIcon');

    if (input.type === 'password') {
        input.type = 'text';
        icon.src   = 'drawable/open_password.png';
    } else {
        input.type = 'password';
        icon.src   = 'drawable/close_password.png';
    }
}