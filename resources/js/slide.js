import Slideout from 'slideout';

let slideout = new Slideout({
    'panel': document.getElementById('panel'),
    'menu': document.getElementById('mobile-menu'),
    'padding': 300,
    'tolerance': 70,
    // 'touch': false,
    'easing': 'ease-in-out'
});

document.querySelector('.toggle-button').addEventListener('click', function() {
    slideout.toggle();
});

slideout.on('open', function () {
    document.getElementById('panel').addEventListener('click', function() {
        if (slideout.isOpen()) {
            slideout.close();
        }
    });
});
