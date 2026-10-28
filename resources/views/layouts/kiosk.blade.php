<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <script src="https://unpkg.com/html5-qrcode"></script>

    @stack('styles')

</head>

<body class="bg-slate-100">

    @yield('content')

    @stack('scripts')

</body>

</html>