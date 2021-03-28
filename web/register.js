let password = document.getElementById("password");
let repeatedPassword = document.getElementById("password-repeat");

repeatedPassword.addEventListener("input", function (event) {
    if (password.value === repeatedPassword.value) {
        repeatedPassword.setCustomValidity("");
    } else {
        repeatedPassword.setCustomValidity("Passwords does not match");
    }
});
