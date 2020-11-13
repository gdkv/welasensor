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

                        <div class="form-row">
                        <input class="input small" placeholder="Name" type="text" name="name" value="{{ $user->name }}" placeholder="Name">

                            <div class="input small">
                                <input placeholder="Email" type="email" name="email" value="{{ $user->email }}" placeholder="Email" disabled>
                                <div class="info-line">
                                    You can’t change your register email, but you can set another for getting reports
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="custom-select">
                                <select name="lang">
                                    <option>Select language</option>
                                    <option value="en" @if($user->lang == 'en') selected @endif>English</option>
                                    <option value="ru" @if($user->lang == 'ru') selected @endif>Русский</option>
                                </select>
                            </div>
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

                        <input class="input" placeholder="New password" id="password" type="password"  name="password" required autocomplete="new-password">
                        <input class="input" placeholder="Confirm new password" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

                        <button type="submit" class="btn btn-blue">
                            Set new password
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Account type</h3>

                <div class="limit wrapper">
                    @include('app.partials.plan', ['title' => 'Start', 'description' => 'Free',  'suffix' => '', 'isCurrent' => $user->plan_id == 1, "id" => "free-plan-variants" ])
                    @include('app.partials.plan', ['title' => 'Pro', 'description' => '$ 6', 'suffix' => '/mo', 'isCurrent' => $user->plan_id == 2, "id" => "pro-plan-variants", ])
                    @include('app.partials.plan', ['title' => 'Ultimate', 'description' => '$ 16', 'suffix' => '/mo',  'isCurrent' => $user->plan_id == 3,  "id" => "ultimate-plan-variants", ])
                </div>

                <div class="toogle-block variants" id="free-plan-variants">
                    @include('app.partials.plan_variants', ['title' => 'Select free subscription ', ])
                </div>

                <div class="toogle-block variants" id="pro-plan-variants">
                    @include('app.partials.plan_variants', ['title' => '1 month Pro subscription', 'price' => '$ 6', ])
                    @include('app.partials.plan_variants', ['title' => '3 month Pro subscription', 'price' => '$ 16', ])
                    @include('app.partials.plan_variants', ['title' => '6 month Pro subscription', 'price' => '$ 32', ])
                    @include('app.partials.plan_variants', ['title' => '1 year Pro subscription', 'price' => '$ 66', ])
                </div>

                <div class="toogle-block variants" id="ultimate-plan-variants">
                    @include('app.partials.plan_variants', ['title' => '1 month Ultimate subscription', 'price' => '$ 16', ])
                    @include('app.partials.plan_variants', ['title' => '3 month Ultimate subscription', 'price' => '$ 46', ])
                    @include('app.partials.plan_variants', ['title' => '6 month Ultimate subscription', 'price' => '$ 90', ])
                    @include('app.partials.plan_variants', ['title' => '1 year Ultimate subscription', 'price' => '$ 180', ])
                </div>
            </div>
        </div>

        <div class="setting-line">
            <div class="setting-section">
                <h3>Theme</h3>

                <div class="form-content">
                    <form action="{{ route('settings') }}" method="POST">
                        @csrf
                        <div class="theme-switcher">
                            <label class="switch">
                                <input type="hidden" name="theme" value="0">
                                <input type="checkbox" name="theme" value="1" @if($user->darkTheme) checked @endif>
                                <span class="slider round"></span>
                            </label>

                            Dark mode
                        </div>

                        <div class="info-line">
                            Only members with Pro or Ultimate accounts can choose
                            Dark mode theme. You can try 2-weeks Pro trial, just send
                            a letter to us support@welasensor.ru
                        </div>

                        <button type="submit" class="btn btn-blue">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
