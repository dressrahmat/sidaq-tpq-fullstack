<div :class="{'w-32': !isOpen, 'w-64': isOpen}"
    class="bg-gradient-to-r from-green-500 to-blue-500 text-white shadow z-30 transition-width duration-300 pt-20 fixed inset-y-0">
    <!-- Sidebar Content -->
    <ul class="menu border-t-2 mt-4">
        <li class="py-2 text-lg bg-transparent">
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-2 text-gray-200 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 002 2h2a1 1 0 002-2zm-3 4a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>
                <span class="ml-2" x-show="isOpen">Dashboard</span>
            </a>
        </li>
        <li class="py-2 text-lg bg-transparent">
            <a href="{{ route('masjid.index') }}"
                class="flex items-center px-4 py-2 text-gray-200 {{ request()->routeIs('masjid.*') ? 'bg-gray-700' : '' }}">
                <i class="fa fa-solid fa-mosque"></i>
                <span class="ml-2" x-show="isOpen">Masjid</span>
            </a>
        </li>
        <li class="py-2 text-lg bg-transparent">
            <a href="{{ route('masjid.create') }}"
                class="flex items-center px-4 py-2 text-gray-200 {{ request()->routeIs('masjid.create') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="ml-2" x-show="isOpen">Tambah Masjid</span>
            </a>
        </li>
        <li class="py-2 text-lg bg-transparent">
            <details open class="border-t-2 mt-4">
                <summary class="bg-transparent">
                    <i class="fa fa-solid fa-toolbox"></i>
                    <span class="ml-2" x-show="isOpen">Setting</span>
                </summary>
                <ul>
                    <li><a href="{{ route('role.index') }}"
                            class="flex items-center px-4 py-2 text-gray-200 {{ request()->routeIs('role.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-plus-circle"></i>
                            <span class="ml-2" x-show="isOpen">Role</span>
                        </a>
                    </li>
                    <li><a href="#"
                        class="flex items-center px-4 py-2 text-gray-200 {{ request()->routeIs('#') ? 'bg-gray-700' : '' }}">
                        <i class="fas fa-user"></i>
                        <span class="ml-2" x-show="isOpen">User</span>
                    </a>
                </li>
                </ul>
            </details>
        </li>
    </ul>
</div>
