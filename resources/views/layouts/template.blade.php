<!-- headers-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="วงษ์พาณิชย์รีไซเคิล ระยอง">
    <meta name="keywords" content="">
    <meta name="description" content="จำหน่ายเครื่องจักร ทั้งมือหนึ่ง มือสอง รับเข้าประมูลงานต่างๆ อาทิ เหล็ก 
    โครงสร้าง เศษเหล็ก สแตนเลส อลูมิเนียม อัลลอย">
    <title> @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon_v5.png') }}" />

    @yield('og')
    <meta property="fb:admins" content="100002037238809">
    
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