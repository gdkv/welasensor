<section class="dashboard">
    <div class="info-line">
        {{ $dataSensor->lastUpdate() }}
    </div>

    @include('app.partials.last_data')

    <h1>Temperature from {{$dataSensor->name}}</h1>

    <div class="chart-control">
        <a href="?period=week">Last week</a>
        <a href="?period=month">Last month</a>
        <a href="?period=half-year">Six month</a>
    </div>

    <section class="full-chart">
        <canvas id="myChart" width="900" height="380"></canvas>
    </section>
</section>
