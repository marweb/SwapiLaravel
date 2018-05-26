<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Personajes de Star Wars</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/toastr/toastr.min.csss') }}"/>
    <link rel="stylesheet" href="{{ asset('css/rootView.css') }}"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">Personajes de Star Wars</a>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/bower_components/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/rootView.js') }}"></script>
</body>