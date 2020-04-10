<div class="data-graph">
    <img src="https://quickchart.io/chart?c={
        type:'line',
        data:{
            labels:[{{ implode(',', $chartDataset) }}],
            datasets:[
                {
                    label: false,
                    data: [{{ implode(',', $chartDataset) }}],
                    fill:false,
                    borderColor: '{{ $chartColor }}',
                    lineTension: 0.2,
                    borderJoinStyle: 'round'
                }
            ]
        },
        options: {
            elements: { point:{ radius: 0 } }, legend: { labels: { generateLabels: function(chart) { return ''; } } },
            scales: { yAxes: [{ gridLines : { display : false }, ticks: { display: false } }], xAxes: [{ gridLines : { display : false }, ticks: { display: false } }] }
        }
    }&w=250&h=200" width="250" height="200">
</div>
