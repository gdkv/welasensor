<div class="account">
    <h4>Hello ✌️</h4>
    <p>{{ Auth::user()->name }}</p>
    <a class="btn" href="{{ route('app') }}">Go to app</a>
    <a class="btn btn-red" href="{{ route('logout') }}">Logout</a>
</div>
