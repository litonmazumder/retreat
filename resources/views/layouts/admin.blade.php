<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    @include('components.admin.sidebar')

    @include('components.admin.navbar')

    <main class="p-4 sm:ml-64 mt-16">

        @yield('content')

    </main>

    @include('components.admin.footer')

    @stack('scripts')

</body>
</html>