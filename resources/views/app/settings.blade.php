@extends('app.base')
@section('content')
    <section class="dashboard">
        <h1>Settings</h1>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Profile</h3>

                <div class="form-content">
                    <form action="{{ route('settings') }}" method="POST">
                        @csrf

                        <p>If you got more then one sensor in one room you can group it by zone, ex., Kitchen, and then name sensor like Near TV</p>
                        <input placeholder="Name" type="text" name="name" value="" placeholder="Name">
                        <input placeholder="Email" type="email" name="email" value="" placeholder="Email" disabled>

                        <div class="custom-select">
                            <select>
                                <option value="en">English</option>
                                <option value="ru">Русский</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-blue">
                            Edit
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Change password</h3>

                <div class="form-content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input id="password" type="password"  name="password" required autocomplete="new-password">
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

                        <button type="submit" class="btn btn-blue">
                            Set password
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Account type</h3>




            </div>
        </div>
    </section>
@endsection
