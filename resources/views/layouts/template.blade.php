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

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PZKRSMNG');</script>
    <!-- End Google Tag Manager -->

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
