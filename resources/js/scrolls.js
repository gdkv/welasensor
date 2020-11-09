import PerfectScrollbar from 'perfect-scrollbar';

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
