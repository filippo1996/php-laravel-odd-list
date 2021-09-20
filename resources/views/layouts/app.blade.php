<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Boolpress')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app" class="container">

        <!-- start header -->
        <views-header login="{{ route('login') }}"></views-header>
        <!-- end header -->

        <!-- start content -->
        @yield('content')
        <!-- end content -->

        <!-- start footer -->
        <footer><footer>
        <!-- end footer -->

    </div>

    @section('script-footer')
        @show
</body>
</html>