<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>

<body class="bg-gray-100 antialiased">

    @include('components.admin.sidebar')

    @include('components.admin.navbar')

    <main class="min-h-screen p-6 pt-20 lg:ml-64">

        @yield('content')

    </main>

    @include('components.admin.footer')

    @stack('scripts')

</body>

</html>