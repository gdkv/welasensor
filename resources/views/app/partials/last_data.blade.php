<div class="last-data">
    <div class="data active">

        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(252, 92, 125, 1)', 'chartDataset' => [26.80, 24.80, 26.90, 24.80, 27.00, 24.80, 27.10, 24.70, 27.20, 24.70, 27.30, 24.70, 27.30, 24.70, 24.70, 27.50, 24.70, 27.50, 24.70, 27.50, 24.70, 27.50, 24.80, 27.60, 24.90, 27.60, 24.90, 27.60, 24.90, 27.60, ],])

        <div class="is-limit">lim</div>

        <div class="data-info">
            <div class="name">
                Temperature
            </div>
            <div class="value">{{ $measure->temperature ?? 'N/A' }}</div>
        </div>

    </div>
    <div class="data">
        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(255, 188, 66, 1)', 'chartDataset' => [23.10, 26.60, 23.40, 26.60, 23.10, 26.70, 22.80, 26.60, 22.70, 26.60, 22.70, 26.60, 22.70, 26.70, 26.70, 22.60, 26.70, 22.80, 26.70, 22.90, 26.70, 23.10, 26.90, 22.60, 26.80, 22.70, 26.80, 22.60, 26.70, 22.90 ],])

        <div class="is-limit"></div>

        <div class="data-info">
            <div class="name">
                Humidity
            </div>
            <div class="value">{{ $measure->humidity ?? 'N/A' }}</div>
        </div>

    </div>
    <div class="data">
        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(48, 169, 222, 1)', 'chartDataset' => [0.00, 4.00, 0.00, 5.00, 1.00, 4.00, 1.00, 9.00, 1.00, 9.00, 1.00, 1.00, 1.00, 0.00, 1.00, 9.00, 5.00, 0.00, 3.00, 0.00, 5.00, 1.00, 9.00, 1.00, 8.00, 1.00, 7.00, 1.00, 5.00, 0.00, 2.00, 0.00]])

        <div class="is-limit"></div>

        <div class="data-info">
            <div class="name">
                Lux
            </div>
            <div class="value">{{ $measure->lux ?? 'N/A' }}</div>
        </div>

    </div>
    <div class="data">
        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(108, 73, 184, 1)', 'chartDataset' => [-81.00, -82.00, -85.00, -77.00, -82.00, -81.00, -86.00, -81.00, -83.00, -82.00, -85.00, -82.00, -85.00, -81.00, -80.00, -86.00, -75.00, -85.00, -78.00, -85.00, -81.00, -88.00, -77.00, -85.00, -80.00, -88.00, -78.00, -78.00, -84.00, ]])

        <div class="is-limit"></div>

        <div class="data-info">
            <div class="name">
                Noise
            </div>
            <div class="value">{{ $measure->decibel ?? 'N/A' }}</div>
        </div>
    </div>
    <div class="data">
        <div class="data-graph"></div>

        <div class="is-limit"></div>

        <div class="data-info">
            <div class="name">
                CO<sub>2</sub>
            </div>
            <div class="value">{{ $measure->co ?? 'N/A' }}</div>
        </div>
    </div>

</div>
