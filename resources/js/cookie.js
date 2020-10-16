import Cookies from 'js-cookie';

const cookie = document.querySelector('.cookie');
if (typeof(cookie) != 'undefined' && cookie != null) {
    document.querySelector('.cookie-close').addEventListener('click', function () {
        cookie.classList.add('hide');
        Cookies.set('hideCookieMessage', '1', {expires: 120, path: '/'});
    });
}
