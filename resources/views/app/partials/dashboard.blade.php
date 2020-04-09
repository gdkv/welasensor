<section class="dashboard">
    <div class="info-line">
        {{ $dataSensor->lastUpdate() }}
    </div>
    <div class="last-data">
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit">lim</div>

            <div class="data-info">
                <div class="name">
                    Temperature
                </div>
                <div class="value">{{ $measure->temperature ?? 'N/A' }}</div>
            </div>

        </div>
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit"></div>

            <div class="data-info">
                <div class="name">
                    Humidity
                </div>
                <div class="value">{{ $measure->humidity ?? 'N/A' }}</div>
            </div>

        </div>
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit"></div>

            <div class="data-info">
                <div class="name">
                    Lux
                </div>
                <div class="value">{{ $measure->lux ?? 'N/A' }}</div>
            </div>

        </div>
        <div class="data">
            <div class="data-graph"></div>

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
</section>
