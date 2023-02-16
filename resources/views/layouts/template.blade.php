<!-- headers-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>

    @include('layouts.inc-style')
    @yield('stylesheet')

</head>

<body>

    @include('layouts.inc-header')
    

    <div id="homepage-1">

        @yield('content')

    </div>

    

    @include('layouts.inc-footer')

    @include('layouts.inc-sidebar')

    <!-- JavaScripts -->
    @include('layouts.inc-script')
    @yield('scripts')

    
</body>

</html>