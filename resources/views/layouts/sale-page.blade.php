<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;500;600;700&display=swap" rel="stylesheet">

    @yield('og')

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; font-family: 'Noto Sans Thai', 'Helvetica Neue', Arial, sans-serif; font-size: 16px; line-height: 1.6; background: #f4f7f5; color: #2e4040; }
        a { color: inherit; }
        img { max-width: 100%; }
    </style>

    @yield('head_scripts')
</head>
<body>

@yield('content')

@yield('body_scripts')

</body>
</html>
