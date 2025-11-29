<?php 
$staticPersonnel = ['dashboard', 'users', 'equipments', 'borrow', 'return', 'reserve'];
$staticAssociate = ['dashboard', 'borrow', 'return', 'reserve'];
$staticStudent = ['dashboard', 'borrow', 'return'];
$session = session();
?>
<!-- Mobile Menu Button -->
<button onclick="toggleSidebar()" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-green-900 text-white rounded-md shadow-lg">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
</button>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
<!-- Mobile Overlay -->
<div id="overlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-30 hidden" onclick="toggleSidebar()"></div>

<!-- Sidebar Nav -->
<nav id="sidebar" class="w-64 bg-gradient-to-b from-green-900 to-yellow-500 text-white p-6 fixed lg:fixed inset-y-0 left-0 z-40 transform lg:transform-none transition-transform duration-300 -translate-x-full lg:translate-x-0 h-screen overflow-y-auto">
    <!-- Header -->
    <div class="mb-10">
        <!-- Logo Container -->
            <div class="flex justify-center mb-4">
                <div class="logo-container rounded-lg p-2">
                    <img src="<?= base_url('/public/img/feu_logo.png') ?>" 
                        alt="ITSO Logo" 
                        class="w-32 h-auto object-contain"
                        width="250" 
                        height="305">
                </div>
            </div>
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
        <p class="text-green-200 text-sm mt-2 opacity-90">Hello, <?= $session->get('username');?> | <?= $session->get('name');?> | <?= $session->get('role');?></p>
        <a href="<?= base_url('user/profile')?>" class="text-green-400 font-semibold text-sm mt-2 hover:text-green-300 transition" ><span>PROFILE</span></a>
    </div>
    
    <!-- Navigation Links -->
    <ul class="space-y-2">
        <?php if ($session->get('role') == 'Personnel'): ?>
            <?php foreach ($staticPersonnel as $stP) : ?>
                <li class="w-full">
                    <a href="<?= base_url($stP) ?>" 
                       class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
                        <span><?= strtoupper($stP) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php elseif ($session->get('role') == 'Associate'): ?>
            <?php foreach ($staticAssociate as $stA) : ?>
                <li class="w-full">
                    <a href="<?= base_url($stA)?>" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
                        <span><?=strtoupper($stA) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
        <li class="w-full">
            <a href="<?= base_url('auth/logout')?>" onclick="setActiveNavItem(this)" class="flex items-center px-4 py-3 rounded-lg text-white transition-colors no-underline w-full hover:bg-green-700">
                <span>LOGOUT</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Content Area -->
<div class="lg:ml-64 min-h-screen bg-gray-50">
    <!-- Your main content goes here -->
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

function setActiveNavItem(clickedElement) {
    document.querySelectorAll('nav ul li a').forEach(item => {
        item.classList.remove('bg-green-900', 'shadow-sm', 'relative', 'font-semibold');
        const existingIndicator = item.querySelector('.active-indicator');
        if (existingIndicator) existingIndicator.remove();
    });

    clickedElement.classList.add('bg-green-900', 'shadow-sm', 'relative', 'font-semibold');

    const indicator = document.createElement('div');
    indicator.className = 'absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-white rounded-full active-indicator';
    clickedElement.prepend(indicator);
}

document.addEventListener('DOMContentLoaded', function () {
    const path = window.location.pathname;             
    const segments = path.split('/').filter(Boolean);  
    const currentPage = segments[segments.length - 1]; 

    let matchedItem = null;

    document.querySelectorAll('nav ul li a').forEach(item => {
        const linkPath = new URL(item.href).pathname;
        const linkSegments = linkPath.split('/').filter(Boolean);
        const linkPage = linkSegments[linkSegments.length - 1];

        if (currentPage === linkPage) {
            matchedItem = item;
        }
    });

    if (matchedItem) {
        setActiveNavItem(matchedItem);
    }
});
</script>