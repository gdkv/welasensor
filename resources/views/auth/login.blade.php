<div class="form-wrapper">
    <div class="form form-aside">
        <div class="form-header">
            Login your account
        </div>
        <div class="form-content">
            @error('email')
            <div class="error">
                <p>{{ $message }}</p>
            </div>
            @enderror
            @error('password')
            <div class="error">
                <p>{{ $message }}</p>
            </div>
            @enderror
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" value="1" name="remember" />
                <div class="form-row">
                    <input id="email" type="email" placeholder="Email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="form-row">
                    <input id="password" type="password" placeholder="Password"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="input-badge input-badge_password password-hide"></span>
                </div>


                <button type="submit">Sign in</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        Don't have account? Sign up
                    </a>
                @endif


            </form>
        </div>
    </div>
</div>
