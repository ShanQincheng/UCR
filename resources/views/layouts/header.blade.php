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
                <a class="nav-link" aria-current="page" href="{{route('email.send')}}">Email</a>
            </div>
        </div>
    </div>

    <!-- Authenticated Dropdown -->
    @auth
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropstart">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->last_name.' '.Auth::user()->first_name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown">
                            @auth
                                <li><a class="dropdown-item" href="{{route('user.account')}}">Account</a></li>
                            @endauth
                            @can('visit-return-rental-page')
                                <li><a class="dropdown-item" href="{{route('renting.customer')}}">Returning the Rental</a></li>
                            @endcan
                            @can('visit-manage-rental-page')
                                <li><a class="dropdown-item" href="{{route('renting.manager')}}">Manage Rentals</a></li>
                            @endcan
                            @can('visit-manage-computers-page')
                                <li><a class="dropdown-item" href="{{route('computers.manager')}}">Manage Computers</a></li>
                            @endcan
                            @can('visit-staff-manage-users-page')
                                <li><a class="dropdown-item" href="{{route('users.staff.manager')}}">Users Management</a></li>
                            @endcan
                            @can('visit-admin-manage-users-page')
                                <li><a class="dropdown-item" href="{{route('users.admin.manager')}}">Users Management</a></li>
                            @endcan
                            @can('visit-admin-dashboard-page')
                                <li><a class="dropdown-item" href="{{route('dashboard.admin.manager')}}">Admin Dashboard</a></li>
                            @endcan
                            @auth
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{route('logout')}}"
                                           onclick='this.parentNode.submit(); return false;'>
                                            Log Out
                                        </a>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    @endauth
</nav>
