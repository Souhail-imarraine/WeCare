<header class="bg-transparent backdrop-blur-sm fixed w-full top-0 z-50">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6 max-w-7xl">
        <!-- Logo -->
        <div class="text-2xl font-bold">
            <span class="text-gray-800">W</span><span class="text-cyan-500">e</span>
            <span class="text-gray-800">Car</span><span class="text-cyan-500">e</span>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-8 border border-gray-200 rounded-lg px-6 py-2 shadow-sm">
            <a href="{{ route('welcome') }}" class="text-black font-medium hover:text-cyan-600">Home</a>
            <a href="{{ route('about') }}" class="text-black font-medium hover:text-cyan-500">About us</a>
            <a href="{{ route('contact') }}" class="text-black font-medium hover:text-cyan-500">Contact</a>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex space-x-4">
            <a href="{{ route('chose') }}" class="px-6 py-2 bg-cyan-500 text-white rounded-md hover:bg-cyan-600">Signup</a>
            <a href="{{ route('login') }}" class="px-6 py-2 text-white rounded-md border border-cyan-500 hover:bg-cyan-50">Login</a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="flex flex-col items-center space-y-4 py-4 bg-white/95 backdrop-blur-sm shadow-lg">
            <a href="#" class="text-cyan-500 font-medium">Home</a>
            <a href="#" class="text-gray-600 font-medium">About us</a>
            <a href="#" class="text-gray-600 font-medium">Contact</a>
            <a href="{{ route('chose') }}" class="w-full max-w-xs px-6 py-2 bg-cyan-500 text-white rounded-md">Signup</a>
            <a href="{{ route('login') }}" class="w-full max-w-xs px-6 py-2 text-cyan-500 border border-cyan-500 rounded-md">Login</a>
        </div>
    </div>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });
    </script>
</header>
