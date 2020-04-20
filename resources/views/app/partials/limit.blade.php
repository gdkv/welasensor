<div class="limit-block">
    <div class="limit-block_header">{{ $title }}</div>
    <div class="limit-block_content">
        <div class="line">
            <div class="line_label max">max</div>
            <div class="line_input">
                <input type="text" name="{{ $name }}_max" value="{{ $max }}">
            </div>
            <div class="line_clear">
                <div class="clear-button"></div>
            </div>
        </div>
        <div class="line">
            <div class="line_label">min</div>
            <div class="line_input">
                <input type="text" name="{{ $name }}_min" value="{{ $min }}">
            </div>
            <div class="line_clear">
                <div class="clear-button"></div>
            </div>
        </div>
    </div>
</div>
