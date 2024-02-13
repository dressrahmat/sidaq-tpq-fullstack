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
<body class="font-display antialiased">
    <div x-data="{ isOpen: true }" class="flex flex-col h-screen">
        <!-- Navbar -->
        <div class="bg-transparent text-slate-900 z-40 sticky">
            <div class="flex justify-between items-center p-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="bg-white rounded-full p-2">
                        <img src="{{url('assets/images/logo.png')}}" alt="Logo" class="h-12 w-auto"> 
                    </div>
                    <button @click="isOpen = !isOpen" class="p-2">
                        <!-- Toggle -->
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8h16M4 16h16M4 12h16" />
                        </svg>
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8h5M15 8h5M4 16h16M4 12h16" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-between w-10/12">
                    <p class="font-bold">Masjid Sumber Solusi
                        <span class="font-normal block">di setiap lini kehidupan Permasalahan Pendidikan, Ekonomi, Sosial, Budaya, bahkan Teknologi.</span>
                    </p>
    
                    <!-- Logout Button -->
                    <button class="p-2 bg-transparent hover:bg-white text-primary font-semibold hover:text-black rounded border border-white hover:border-transparent">Logout</button>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="flex absolute inset-y-0 left-0">
            <div :class="{'w-32': !isOpen, 'w-64': isOpen}" class="bg-gradient-to-r from-green-500 to-blue-500 text-white shadow z-30 transition-width duration-300 pt-20">
                <!-- Sidebar Content -->
                <ul class="menu border-t-2 mt-4">
                    <li class="py-2 text-lg bg-transparent">
                        <a href="#" class="flex items-center px-4 py-2 text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 002 2h2a1 1 0 002-2zm-3 4a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                            <span class="ml-2" x-show="isOpen">Dashboard</span>
                        </a>
                    </li>
                    <li class="py-2 text-lg bg-transparent">
                        <a href="#" class="flex items-center px-4 py-2 text-gray-200">
                            <i class="fa fa-solid fa-mosque"></i>
                            <span class="ml-2" x-show="isOpen">Masjid</span>
                        </a>
                    </li>
                    <li class="py-2 text-lg bg-transparent">
                        <a href="#" class="flex items-center px-4 py-2 text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="ml-2" x-show="isOpen">Tambah Masjid</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <main :class="{'ml-5': isOpen, 'ml-0': !isOpen, 'flex-1': true}" class="p-4 overflow-y-auto pt-28">
                <!-- Your page content here -->
                <div class="p-3">
                    <h3 class="text-2xl font-bold">Selamat datang di dashboard Anda, Jaringan TPQ Sidaq </h3>
                    <h6 class="text-lg pl-10 pt-5 font-medium">Sidaq/sidaq.org/@sidaq.id</h6>
                </div>
            </main>
        </div>
    </div>
</body>

</html>