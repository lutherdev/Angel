<!-- Mobile Menu Button -->
    <button onclick="toggleSidebar()" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-green-900 text-white rounded-md shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Mobile Overlay -->
    <div id="overlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-30 hidden" onclick="toggleSidebar()"></div>

        <!-- Sidebar Nav -->
        <nav id="sidebar" class="w-66 bg-gradient-to-b from-green-900 to-yellow-500 text-white p-6 fixed lg:static inset-y-0 left-0 z-40 transform lg:transform-none transition-transform duration-300 -translate-x-full lg:translate-x-0">
            <!-- Header -->
            <div class="mb-10">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-bold tracking-wide">INVENTORY SYSTEM</h1>
                    <!-- Close button for mobile -->
                    <button onclick="toggleSidebar()" class="lg:hidden p-1 rounded hover:bg-green-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <p class="text-green-200 text-sm mt-2 opacity-90">Information Technology Services Office (ITSO)</p>
            </div>
            
            <!-- Navigation Links -->
<ul class="space-y-2">
    <li class="w-full">
        <a href="#" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
            <span>Dashboard</span>
        </a>
    </li>
    <li class="w-full">
        <a href="#" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
            <span>User Management</span>
        </a>
    </li>
    <li class="w-full">
        <a href="#" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
            <span>Equipment Management</span>
        </a>
    </li>
    <li class="w-full">
        <a href="#" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
            <span>About Us</span>
        </a>
    </li>
    <li class="w-full">
        <a href="#" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
            <span>Logout</span>
        </a>
    </li>
</ul>
        </nav>
