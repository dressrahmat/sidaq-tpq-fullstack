<div class="bg-transparent text-slate-900 z-40">
    <div class="flex justify-between items-center p-4 fixed inset-x-0">
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

        <!-- Navbar -->
        <div :class="{'w-10/12': isOpen, 'w-11/12': !isOpen}" class="flex justify-between p-5 bg-slate-300 transition-all duration-500">
            <p class="font-bold">Masjid Sumber Solusi
                <span class="font-normal block">di setiap lini kehidupan Permasalahan Pendidikan, Ekonomi, Sosial, Budaya, bahkan Teknologi.</span>
            </p>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-2 bg-transparent hover:bg-white text-red-700 font-semibold hover:text-black rounded border border-white hover:border-transparent">Logout</button>
            </form>
        </div>
    </div>
</div>
