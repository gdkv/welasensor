<h1>Add sensor</h1>
<div class="form-content">
    <form class="" action="{{ route('sensor_add') }}" method="POST">
        @csrf
        <div class="form-row">
            <input placeholder="Mac address" type="text" name="mac" required/>
            <span data-tippy-content="MAC address is a unique string number of your sensor device. It consist of 6 pairs of chars separate by dashes. Ex: A9-B8-C7-D6-E5-F4" class="input-badge input-badge_bg">
                ?
            </span>
            <p>You can easily find sensor’s MAC address on backside of corpus, or just scan QR code, and this input will be autofilled</p>
        </div>
        <div class="form-row">
            <input placeholder="Sensor name" type="text" name="name" required/>
        </div>

        <button type="submit">Add</button>
    </form>
</div>
