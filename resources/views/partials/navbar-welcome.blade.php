<header class="bg-white/5 backdrop-blur-sm fixed w-full top-0 z-50 shadow-sm">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6 max-w-7xl">
        <a href="{{ route('welcome') }}" class="text-2xl font-bold z-10">
            <span class="text-blue-900">W</span><span class="text-cyan-500">e</span>
            <span class="text-blue-900">Car</span><span class="text-cyan-500">e</span>
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <div class="flex space-x-8">
                <a href="{{ route('welcome') }}" class=" hover:text-cyan-500 transition-colors font-medium">Home</a>
                <a href="{{ route('about') }}" class=" hover:text-cyan-500 transition-colors font-medium">About us</a>
                <a href="{{ route('contact') }}" class=" hover:text-cyan-500 transition-colors font-medium">Contact</a>
            </div>

            <div class="flex items-center space-x-4 ml-8">
                <a href="{{ route('login') }}" class="px-4 py-2 text-cyan-500 hover:text-cyan-500 transition-colors font-medium">Login</a>
                <a href="{{ route('chose') }}" class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-lg hover:from-cyan-600 hover:to-blue-600 transition-colors shadow-sm font-semibold">
                    Sign up
                </a>
            </div>
        </div>

        <button id="menuButton" type="button" class="z-10 md:hidden bg-white rounded-lg p-2 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <svg class="h-6 w-6 menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="h-6 w-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </nav>

    <div id="mobileMenu" class="hidden md:hidden absolute inset-x-0 top-full bg-white border-b border-gray-100 shadow-lg transform transition-all duration-300">
        <div class="flex flex-col space-y-4 px-6 py-8">
            <a href="{{ route('welcome') }}" class="text-base font-medium text-blue-900 hover:text-cyan-500">
                Home
            </a>
            <a href="{{ route('about') }}" class="text-base font-medium text-blue-900 hover:text-cyan-500">
                About us
            </a>
            <a href="{{ route('contact') }}" class="text-base font-medium text-blue-900 hover:text-cyan-500">
                Contact
            </a>
            <div class="pt-4 space-y-4">
                <a href="{{ route('login') }}" class="block w-full px-6 py-3 text-center text-blue-900 hover:text-cyan-500 border border-cyan-500/30 rounded-lg">
                    Log in
                </a>
                <a href="{{ route('chose') }}" class="block w-full px-6 py-3 text-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 rounded-lg shadow-sm font-semibold">
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

            if (isMenuOpen) {
                mobileMenu.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                mobileMenu.style.opacity = '1';
                mobileMenu.style.transform = 'translateY(0)';
            } else {
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateY(-1rem)';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });
    });
</script>
