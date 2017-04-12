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
                        <li><a class="collapsible-header nav-link" href="#">Propozicija</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class ="waves-effect">Osnovni podaci</a></li>
                                    <li><a href="#" class ="waves-effect">Tržišni potencijal</a></li>
                                    <li><a href="#" class ="waves-effect">Tehnički podaci</a></li>
                                    <li><a href="#" class ="waves-effect">Tisak</a></li>
                                </ul>
                            </div>
                        </li>

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
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{ asset('js/mdb.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

