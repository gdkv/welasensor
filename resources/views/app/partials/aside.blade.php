<div>
    <div class="quick-links">
        <a href="{{ route('sensors_list') }}">Add sensor</a>
        <a href="{{ route('zones_list') }}">Add room</a>
    </div>
    <div class="main">
        <a href="{{ route('sensors_list') }}">Sensors</a>
        <a href="{{ route('zones_list') }}">Rooms</a>
        <a href="{{ route('settings') }}">Settings</a>
        <a href="{{ route('reports') }}">Reports</a>
        <a href="{{ route('notify') }}">Notify</a>
    </div>

    <div class="logout">
        <a href="{{ route('logout') }}" class="btn btn-red">Logout</a>
    </div>

</div>
