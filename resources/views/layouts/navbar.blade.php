<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">LOGO</a>
        @auth
            @verified
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-light">Logout</button>
            </form>
            @endverified
        @endauth
    </div>
</nav>