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

</head>

<body class="font-display bg-slate-100">
    <div class="h-screen w-full flex justify-center items-center">
        <div class="h-screen relative flex justify-center items-center bg-gradient-to-tr from-primary to-secondary p-5">
            <!-- Pattern Image Background -->
            <img src="{{ url('assets/images/pattern.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full object-cover opacity-10">
            <!-- Content -->
            <div class="card w-1/2 z-10 relative">
                <h2 class="text-5xl font-bold text-white mb-5">Sidaq TPQ Indonesia</h2>
                <p class="text-base-100 text-lg">SiDAQ adalah gerakan nasional memberantas buta huruf Al Qur’an, mencetak 23
                    juta penghafal Al Qur’an dan membangun 6.236 Rumah/Pondok Qur’an di 114 kawasan untuk mensurgakan
                    Indonesia</p>
            </div>
        </div>

        <div class="w-2/3">
            <div class="card">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>