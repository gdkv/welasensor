import PerfectScrollbar from 'perfect-scrollbar';
import IMask from 'imask';
import Cookies from 'js-cookie';
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/themes/light.css';
import Chart from 'chart.js';

const container = document.querySelector('.app-aside');
if (container){
    const ps = new PerfectScrollbar(container);
}

const dataScroll = document.querySelector('.last-data');
if (dataScroll){
    const ps = new PerfectScrollbar(dataScroll);
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

let macInput = document.querySelector('input[name="mac"]');
if (typeof(macInput) != 'undefined' && macInput != null){
    let macMask = IMask(
        document.querySelector('input[name="mac"]'), {
            mask: '**-**-**-**-**-**',
            definition: {
                // <any single char>: <same type as mask (RegExp, Function, etc.)>
                // defaults are '0', 'a', '*'
                '#': /[0-9A-F]/
            }
        }
    );
}

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


const cookie = document.querySelector('.cookie');
if (typeof(cookie) != 'undefined' && cookie != null) {
    document.querySelector('.cookie-close').addEventListener('click', function () {
        cookie.classList.add('hide');
        Cookies.set('hideCookieMessage', '1', {expires: 120, path: '/'});
    });
}

// Tippy
tippy('[data-tippy-content]', {
    arrow: true,
    // delay: [1000, 200],
    theme: 'light',
    placement: 'bottom',
});

// Chart js
let chart = document.getElementById('myChart');

if (typeof(chart) != 'undefined' && chart != null) {

    let url = chart.dataset.measuresFile;
    // let chartDataSet = [];

    fetch(url)
        .then(res => res.json())
        .then((out) => {
            let ctx = chart.getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: out,
                    datasets: [{
                        label: false,
                        data: out,
                        fill: false,
                        borderColor: 'rgba(252, 92, 125, 1)',
                        lineTension: 0.2,
                        borderJoinStyle: 'round'
                    }]
                },
                options: {
                    elements: {
                        point: {radius: 0}
                    },
                    legend: {
                        labels: {
                            generateLabels: function (chart) {
                                return '';
                            }
                        }
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {display: false},
                            ticks: {display: false}
                        }],
                        xAxes: [{
                            gridLines: {display: false},
                            ticks: {display: false}
                        }]
                    }
                }
            });
        })
        .catch(err => {
            throw err
        });

}
