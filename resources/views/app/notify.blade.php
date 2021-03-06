@extends('app.base')
@section('content')
    <section class="dashboard">
        <h1>Notify</h1>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Reports</h3>

                <div class="form-content">
                    <form action="{{ route('notify') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="theme-switcher">
                                <label class="switch">
                                    <input type="hidden" name='is-reported' value="0">
                                    <input type="checkbox" name="is-reported" value="1" @if($user->isReported) checked @endif>
                                    <span class="slider round"></span>
                                </label>

                                Get reports
                            </div>

                        </div>

                        <div class="form-row">
                        <input class="input" placeholder="Email for reports" type="email" name="report-email" value="{{ $user->reportEmail }}" />
                            <div class="info-line">
                                You can set alternative email for welasensor reports, or you can leave this field blank if you want to get reports on email that you leave when register.
                            </div>
                        </div>


                        <button type="submit" class="btn btn-red">
                            Save
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Limits</h3>

                <div class="form-content">
                    <form action="{{ route('notify') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="theme-switcher">
                                <label class="switch">
                                    <input type="hidden" name='is-alerted' value="0">
                                    <input type="checkbox" name='is-alerted' value="1" @if($user->isAlerted) checked @endif>
                                    <span class="slider round"></span>
                                </label>

                                Get limits alerts
                            </div>

                            <div class="form-row">
                            <input class="input" placeholder="Telegram ID" type="text" name="telegram" value="{{ $user->telegram }}" />
                                <div class="info-line">
                                    Add our <a href="https://t.me/WelasensorBot">@WelasensorBot</a> and paste your Telegram ID there to recive alerts<br />
                                    You can get your ID with <a href="https://t.me/userinfobot">@Userinfobot</a>
                                </div>
                            </div>


                            <div class="form-row">
                            <input class="input" placeholder="Email for alerts" type="email" name="alert-email" value="{{ $user->alertEmail }}" />
                                <div class="info-line">
                                    You can set alternative email for welasensor alerts, or you can leave this field blank if you want to get alerts on email that you leave when register.
                                </div>
                            </div>

                        <button type="submit" class="btn btn-red">
                            Save
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </section>
@endsection
