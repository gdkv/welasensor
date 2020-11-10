let elem = document.querySelector('.alert');

if (typeof(elem) != 'undefined' && elem != null) {
    setTimeout(function () {
        elem.parentNode.removeChild(elem);
    }, 6000);
}
