import PerfectScrollbar from 'perfect-scrollbar';
import IMask from 'imask';
import Cookies from 'js-cookie';
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/themes/light.css';
import Chart from 'chart.js';
import Slideout from 'slideout';

const cookie = document.querySelector('.cookie');
if (typeof(cookie) != 'undefined' && cookie != null) {
    document.querySelector('.cookie-close').addEventListener('click', function () {
        cookie.classList.add('hide');
        Cookies.set('hideCookieMessage', '1', {expires: 120, path: '/'});
    });
}

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

// Accordion in questions

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

const container = document.querySelector('.app-aside');
if (container){
    const ps = new PerfectScrollbar(container);
}

const dataScroll = document.querySelector('.last-data');
if (dataScroll){
    const ps = new PerfectScrollbar(dataScroll);
}

const mainChart = document.querySelector('.full-chart');
if (mainChart){
    const ps = new PerfectScrollbar(mainChart);
}

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
    let lineColor =  chart.dataset.measureColor;
    // let chartDataSet = [];

    fetch(url)
        .then(res => res.json())
        .then((out) => {
            let ctx = chart.getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'line',
                responsive: false,
                data: {
                    labels: out,
                    datasets: [{
                        label: false,
                        data: out,
                        fill: false,
                        borderColor: lineColor,
                        lineTension: 0.2,
                        borderJoinStyle: 'round'
                    }]
                },
                options: {
                    elements: {
                        point: {
                            radius: 2.5,
                            backgroundColor: lineColor,
                            hoverRadius: 4
                        }
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

var x, i, j, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    a = document.createElement("div");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    b = document.createElement("div");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
        c = document.createElement("div");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
document.addEventListener("click", closeAllSelect);

setTimeout(function () {
    let elem = document.querySelector('.alert');
    elem.parentNode.removeChild(elem);
}, 6000);
