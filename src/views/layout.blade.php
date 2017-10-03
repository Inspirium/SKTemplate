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
    <script src="toastr.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if (Auth::check())
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        window.translations = {!! Storage::disk('langs')->get(App::getLocale().'.json') !!};
    </script>
    @endif
</head>
<body class="fixed-sn sk-skin">
<div id="app">
    @if (Auth::check())
        @component('sktemplate::components.header')@endcomponent
        <div class="container-fluid">
    @endif

    @yield('content')

    @if (Auth::check())
        </div>
    @endif
</div>
@if (Auth::check())
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/mdb.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
@endif
</body>
</html>

