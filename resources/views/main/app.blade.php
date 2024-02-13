<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @livewireStyles

    <style>
        /* Custom CSS for footer */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body class="font-display antialiased text-md w-full">
    <div x-data="{ isOpen: true }" class="flex flex-col min-h-screen">
        <!-- Navbar -->
        @include('main.components.navbar')

        <!-- Sidebar -->
        @include('main.components.sidebar')

        <!-- Main Content -->
        <main :class="{'ml-64': isOpen, 'ml-32': !isOpen}" class="p-4 pt-28 h-full">
            <!-- Your page content here -->
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="mt-auto text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </footer>
    </div>
    @livewireScripts
</body>

</html>
