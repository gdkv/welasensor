import Chart from 'chart.js';

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
                    labels: Object.keys(out),
                    datasets: [{
                        label: false,
                        data: Object.values(out),
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
