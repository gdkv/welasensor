<div class="form-wrapper">
    <div class="form form-aside">
        <div class="form-header">
            Create your account
        </div>
        <div class="form-content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <input placeholder="Your name and surname" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                <div class="form-row">
                    <input placeholder="Your email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>

                <div class="form-row">
                    <input placeholder="Your password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <span class="input-badge">
                        <img src="/assets/images/password_hide.svg" alt="">
                    </span>
                </div>

                <button type="submit">Sign up</button>

                @if (Route::has('login'))
                    <a href="{{ route('login') }}">
                        Already have account? Sign in
                    </a>
                @endif

            </form>
        </div>
    </div>
</div>
