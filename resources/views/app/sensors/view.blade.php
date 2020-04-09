@extends('app.base')
@section('content')
    <section class="dashboard">
        <h1>{{ $sensor->name }}</h1>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Settings</h3>

                <div class="form-content">
                    <form action="">
                        <input placeholder="Zone" type="text">
                        <p>If you got more then one sensor in one room you can group it by zone, ex., Kitchen, and then name sensor like Near TV</p>
                        <input placeholder="Name" type="text">
                        <button type="submit">
                            Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
