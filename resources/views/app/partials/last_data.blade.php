<div class="last-data">
    <div class="data active">

        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(252, 92, 125, 1)', 'chartDataset' => $miniChartsData['temperature'],])

        <div class="is-limit">lim</div>

        <div class="data-info">
            <div class="name">
                Temperature
            </div>
            <div class="value">{{ $measure->temperature ?? 'N/A' }}</div>
        </div>

    </div>
    <div class="data">
        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(255, 188, 66, 1)', 'chartDataset' => $miniChartsData['humidity'],])

        <div class="is-limit"></div>

        <div class="data-info">
            <div class="name">
                Humidity
            </div>
            <div class="value">{{ $measure->humidity ?? 'N/A' }}</div>
        </div>

    </div>
    <div class="data">
        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(48, 169, 222, 1)', 'chartDataset' => $miniChartsData['lux'],])

        <div class="is-limit"></div>

        <div class="data-info">
            <div class="name">
                Lux
            </div>
            <div class="value">{{ $measure->lux ?? 'N/A' }}</div>
        </div>

    </div>
    <div class="data">
        @include('app.partials.charts.mini_chart', ['chartColor' => 'rgba(108, 73, 184, 1)', 'chartDataset' => $miniChartsData['decibel'],])

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
