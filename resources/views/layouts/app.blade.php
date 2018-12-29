<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Solve the Story') }}</title>
    <!-- Styles -->
    <link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vidaloka" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo|Montserrat" rel="stylesheet">

</head>
<body>
@include('layouts.header')
<!-- Authentication Links -->
<div id="main">
    @yield('content')

</div>
@include('layouts.footer')
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
</body>

</html>
