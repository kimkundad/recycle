<!-- headers-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'zh' ? 'zh-CN' : app()->getLocale() }}">

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
    @if (app()->getLocale() === 'zh')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&display=swap" rel="stylesheet">
        <style>
            html[lang="zh-CN"] body, html[lang="zh-CN"] h1, html[lang="zh-CN"] h2, html[lang="zh-CN"] h3,
            html[lang="zh-CN"] h4, html[lang="zh-CN"] h5, html[lang="zh-CN"] h6,
            html[lang="zh-CN"] span, html[lang="zh-CN"] p, html[lang="zh-CN"] li, html[lang="zh-CN"] strong,
            html[lang="zh-CN"] option, html[lang="zh-CN"] label, html[lang="zh-CN"] input, html[lang="zh-CN"] a, html[lang="zh-CN"] b,
            html[lang="zh-CN"] .ps-form--quick-search select.form-control, html[lang="zh-CN"] .ps-form--quick-search .form-control,
            html[lang="zh-CN"] .table, html[lang="zh-CN"] .table td, html[lang="zh-CN"] .table th,
            html[lang="zh-CN"] .ps-post .ps-post__title, html[lang="zh-CN"] .ps-btn--fullwidth-green,
            html[lang="zh-CN"] .menu > li > a {
                font-family: 'Prompt', 'Noto Sans SC', sans-serif !important;
            }
        </style>
    @endif
    @yield('stylesheet')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PZKRSMNG');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5Z6Z3QWW');</script>
    <!-- End Google Tag Manager -->

    

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1027920359203872');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1027920359203872&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

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
