<header>
    <ul id="slide-out" class="sidebar side-nav fixed custom-scrollbar">
        <!-- Logo -->
        <li class="brand d-flex justify-content-center align-items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/sk_logo.svg') }}">
            </a>
            <a href="{{ url('/') }}">v. 1.01</a>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li class="nav nav-pills flex-column sidebar-menu">
            <inspirium-menu path="{{ Request::path() }}"></inspirium-menu>
        </li>
        <!--/. Side navigation links -->
    </ul>

    <nav class="col navbar d-flex flex-row-reverse navbar-toggleable-md scrolling-navbar double-nav">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle user-nav" data-toggle="dropdown" href="#" role="button" >{{ Auth::user()->first_name }}
                <img src="{{ Auth::user()->image }}" class="header-profile">
            </a>
            <div class="dropdown-menu dropdown-ins dropdown-menu-right dropdown-custom-login">
                <div class="user-box">
                    <a class="waves-effect activity-item waves-light" href="{{ url('logout') }}" onclick="localStorage.clear();">@lang('Log Out')</a>
                    <a class="waves-effect waves-light" href="/human_resources/employee/{{ Auth::id() }}">@lang('My account')</a>
                </div>
            </div>
        </div>
        <inspirium-notifications></inspirium-notifications>

        <!-- Breadcrumb -->
        <inspirium-breadcrumbs></inspirium-breadcrumbs>
        <!--/. Breadcrumb -->
        <div class="float-right hamburger-icon">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
        </div>
    </nav>
</header>
