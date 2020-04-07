import PerfectScrollbar from 'perfect-scrollbar';

const container = document.querySelector('.app-aside');
if (container){
    const ps = new PerfectScrollbar(container);
}

document.addEventListener('click', function (event) {
    if (!event.target.classList.contains('question-title')) return;

    let content = document.querySelector(event.target.hash);
    if (!content) return;

    event.preventDefault();

    if (content.classList.contains('active')) {
        content.classList.remove('active');
        return;
    }

    let accordions = document.querySelectorAll('.answer.active');
    for (let i = 0; i < accordions.length; i++) {
        accordions[i].classList.remove('active');
    }
    content.classList.toggle('active');
});

document.addEventListener('click', function (event) {
    if (!event.target.classList.contains('cookie-close')) return;

    console.log('cookie close');
});
