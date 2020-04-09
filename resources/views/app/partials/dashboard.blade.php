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
                <div class="value">{{ $measure->temperature }}</div>
            </div>

        </div>
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit"></div>

            <div class="data-info">
                <div class="name">
                    Humidity
                </div>
                <div class="value">25</div>
            </div>

        </div>
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit"></div>

            <div class="data-info">
                <div class="name">
                    Lux
                </div>
                <div class="value">1</div>
            </div>

        </div>
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit"></div>

            <div class="data-info">
                <div class="name">
                    Decibel
                </div>
                <div class="value">-80</div>
            </div>
        </div>
        <div class="data">
            <div class="data-graph"></div>

            <div class="is-limit"></div>

            <div class="data-info">
                <div class="name">
                    CO<sub>2</sub>
                </div>
                <div class="value">0</div>
            </div>
        </div>

    </div>
</section>
