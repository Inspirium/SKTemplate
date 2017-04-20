<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ŠK management') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://use.fontawesome.com/b494914ae1.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="fixed-sn">
<div id="app">
    @if (Auth::check())
        <header>
            <ul id="slide-out" class="sidebar side-nav fixed custom-scrollbar">
                <!-- Logo -->
                <li class="brand">
                    <img src="{{ asset('images/sk_logo.svg') }}" href="{{ url('/') }}">
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li class="nav nav-pills flex-column sidebar-menu">
                    <ul class="collapsible collapsible-accordion">
                        @if (Auth::user()->hasRole('hr_admin'))
                        <li><a class="collapsible-header nav-link" href="#">@lang('Human Resources')</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('hr/employees') }}" class="waves-effect">@lang('Employees')</a></li>
                                    <li><a href="{{ url('hr/candidates') }}" class="waves-effect">@lang('Candidates')</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (Auth::user()->hasRole('proposition_admin'))
                        <li><a class="collapsible-header nav-link" href="#">@lang('Proposition')</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class ="waves-effect">@lang('Basic data')</a></li>
                                    <li><a href="#" class ="waves-effect">Tržišni potencijal</a></li>
                                    <li><a href="#" class ="waves-effect">Tehnički podaci</a></li>
                                    <li><a href="#" class ="waves-effect">Tisak</a></li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        <li><a class="collapsible-header nav-link" href="#">Info</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class ="waves-effect">Neki link</a></li>
                                    <li><a href="#" class ="waves-effect">Neki link</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
        </header>
        <div class="container-fluid">
            <div class="row header">
                <nav class="col navbar main-nav d-flex flex-row-reverse navbar-toggleable-md scrolling-navbar double-nav">
                    <a class="nav-link dropdown-toggle user-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                        <img src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email ) }}?s=50&d=wavatar" class="header-profile">
                    </a>
                    <div class="dropdown-menu dropdown-ins dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item waves-effect waves-light" href="{{ url('logout') }}">Log Out</a>
                        <a class="dropdown-item waves-effect waves-light" href="#">My account</a>
                    </div>
                    <a href="#" class="nav-item nav-link-icon d-flex">
                        <i class="fa fa-bell"></i>
                        <span class="tag tag-danger">4</span>
                    </a>
                    <a href="#" class="nav-item nav-link-icon d-flex">
                        <i class="fa fa-search"></i>
                    </a>
                    <!-- Breadcrumb -->
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>
                    <!--/. Breadcrumb -->
                    <div class="float-right hamburger-icon">
                        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                    </div>
                </nav>
            </div>

            <div class="row tabs-wrapper">
                <ul class="col nav classic-tabs tabs-cyan" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">Testing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab">Links</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel53" role="tab">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel54" role="tab">Be awesome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel54" role="tab">Be awesome</a>
                    </li>
                </ul>
            </div>
            <div class="content">
    @endif

    @yield('content')

    @if (Auth::check())
            </div>
        </div>
    @endif
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{ asset('js/mdb.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

