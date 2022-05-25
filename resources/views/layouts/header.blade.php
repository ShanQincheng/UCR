<!-- Bootstrap .navbar-brand for your company, product, or project name. -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- As a Heading -->
        <span class="navbar-brand mb-0 h1">UCR</span>
        <!-- As a link -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- Add the .active class on .nav-link to indicate the current page.
                     Please note that you should also add the aria-current attribute on the active .nav-link.-->
                <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                <a class="nav-link" aria-current="page" href="{{route('index.rental')}}">Rental</a>
            </div>
        </div>
    </div>

    <!-- Authenticated Dropdown -->
    @auth
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->last_name.' '.Auth::user()->first_name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('renting.customer')}}">Renting</a></li>
                <li class="list-group-item-danger">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}"
                           onclick='this.parentNode.submit(); return false;'>
                            Log Out
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</nav>
