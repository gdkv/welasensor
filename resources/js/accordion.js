document.addEventListener('click', function (event) {
    if (!event.target.classList.contains('toogle')) return;

    let content = document.querySelector(event.target.hash);
    if (!content) return;

    event.preventDefault();

    if (content.classList.contains('active')) {
        content.classList.remove('active');
        return;
    }

    let accordions = document.querySelectorAll('.toogle-block.active');
    for (let i = 0; i < accordions.length; i++) {
        accordions[i].classList.remove('active');
    }
    content.classList.toggle('active');
});
