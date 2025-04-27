<header class="bg-white/80 backdrop-blur-sm fixed w-full top-0 z-50 shadow-sm">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6 max-w-7xl">
        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="text-2xl font-bold z-10">
            <span class="text-gray-800">W</span><span class="text-cyan-500">e</span>
            <span class="text-gray-800">Car</span><span class="text-cyan-500">e</span>
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-8">
            <div class="flex space-x-8">
                <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-cyan-600 transition-colors">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-cyan-600 transition-colors">About us</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-cyan-600 transition-colors">Contact</a>
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center space-x-4 ml-8">
                <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-cyan-600 transition-colors">Login</a>
                <a href="{{ route('chose') }}" class="px-6 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition-colors shadow-sm">
                    Sign up
                </a>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menuButton" type="button" class="z-10 md:hidden bg-white rounded-lg p-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <svg class="h-6 w-6 menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="h-6 w-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden absolute inset-x-0 top-full bg-white border-b border-gray-100 shadow-lg transform transition-all duration-300">
        <div class="flex flex-col space-y-4 px-6 py-8">
            <a href="{{ route('welcome') }}" class="text-base font-medium text-gray-900 hover:text-cyan-600">
                Home
            </a>
            <a href="{{ route('about') }}" class="text-base font-medium text-gray-900 hover:text-cyan-600">
                About us
            </a>
            <a href="{{ route('contact') }}" class="text-base font-medium text-gray-900 hover:text-cyan-600">
                Contact
            </a>
            <div class="pt-4 space-y-4">
                <a href="{{ route('login') }}" class="block w-full px-6 py-3 text-center text-gray-700 hover:text-cyan-600 border border-gray-300 rounded-lg">
                    Log in
                </a>
                <a href="{{ route('chose') }}" class="block w-full px-6 py-3 text-center text-white bg-cyan-500 hover:bg-cyan-600 rounded-lg shadow-sm">
                    Sign up
                </a>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = menuButton.querySelector('.menu-icon');
        const closeIcon = menuButton.querySelector('.close-icon');
        let isMenuOpen = false;

        menuButton.addEventListener('click', function() {
            isMenuOpen = !isMenuOpen;

            // Toggle menu visibility
            if (isMenuOpen) {
                mobileMenu.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                // Add slide down animation
                mobileMenu.style.opacity = '1';
                mobileMenu.style.transform = 'translateY(0)';
            } else {
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                // Add slide up animation
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateY(-1rem)';
                // Hide menu after animation
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });
    });
</script>
