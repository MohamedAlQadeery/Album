<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <a class="navbar-brand" href="{{route('album.index')}}">Album</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        @guest
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @else
            <li class="nav-item active">
                <a class="nav-link" href="{{route('album.index')}}">Home</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('album.showAllAlbums')}}">My Albums</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('album.create')}}">Create Album</a>
            </li>

        </ul>

        <a class="btn btn-secondary"  href="{{route('customLogout')}}">Logout</a>
        @endguest

    </div>
</nav>
