// Passwords badge
let badge = document.querySelector('.input-badge_password');
if (typeof(badge) != 'undefined' && badge != null) {
    badge.addEventListener('click', function (event) {
        event.preventDefault();
        if (this.classList.contains('password-hide')) {
            document.getElementById("password").setAttribute("type", "text");
            this.classList.remove('password-hide');
            this.classList.add('password-show');
        } else {
            document.getElementById("password").setAttribute("type", "password");
            this.classList.remove('password-show');
            this.classList.add('password-hide');
        }
    }, false);
}
