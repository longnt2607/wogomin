const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
const togglecfPassword = document.querySelector('#togglecfPassword');
const cfpassword = document.querySelector('#cfpassword');
togglecfPassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = cfpassword.getAttribute('type') === 'cfpassword' ? 'text' : 'cfpassword';
    cfpassword.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
