<!-- Sidebar -->
<div id="sidebar"
    class="w-64 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-30 lg:static lg:translate-x-0 transform -translate-x-full transition-transform duration-200 ease-in-out"
>
    <div class="h-16 px-4 flex items-center justify-between border-b border-gray-200">
        <a href="/" class="flex items-center">
            <h1 class="text-xl font-bold">
                <span class="text-gray-800">W</span><span class="text-cyan-500">e</span>
                <span class="text-gray-800 ml-0.5">Car</span><span class="text-cyan-500">e</span>
            </h1>
        </a>
        <button class="text-gray-500 hover:text-gray-600 lg:hidden" id="sidebar-close">
            <span class="sr-only">Close sidebar</span>
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.707 4.293a.999.999 0 10-1.414 1.414L11.414 12l6.879 6.879a.999.999 0 101.414-1.414L12.828 12l6.879-6.293a.999.999 0 000-1.414z" />
                <path d="M4.293 4.293a.999.999 0 00-1.414 1.414L9.464 12 2.586 18.879a.999.999 0 101.414 1.414L11.172 12 4.293 5.707a.999.999 0 00-1.414-1.414z" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
        <a href="{{ route('patient.dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('patient.dashboard') ? 'text-white bg-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group">
            <svg class="w-6 h-6 mr-3 {{ request()->routeIs('patient.dashboard') ? 'text-cyan-300' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('patient.appointments') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('patient.appointments') ? 'text-white bg-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group">
            <svg class="w-6 h-6 mr-3 {{ request()->routeIs('patient.appointments') ? 'text-cyan-300' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Appointments
        </a>

        <a href="{{ route('patient.doctors') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('patient.doctors') ? 'text-white bg-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group">
            <svg class="w-6 h-6 mr-3 {{ request()->routeIs('patient.doctors') ? 'text-cyan-300' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Doctors
        </a>

        <a href="{{ route('patient.profile') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('patient.profile') ? 'text-white bg-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group">
            <svg class="w-6 h-6 mr-3 {{ request()->routeIs('patient.profile') ? 'text-cyan-300' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Profile
        </a>

        <a href="{{ route('patient.settings') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('patient.settings') ? 'text-white bg-cyan-600' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }} group">
            <svg class="w-6 h-6 mr-3 {{ request()->routeIs('patient.settings') ? 'text-cyan-300' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Settings
        </a>
    </nav>

    <!-- Sidebar footer -->
    <div class="mt-auto px-2 py-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}" class="w-full" id="logout-form">
            @csrf
            <button type="submit" class="flex items-center w-full px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 group">
                <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Log Out
            </button>
        </form>
    </div>
</div>

<script>
    // Mobile sidebar toggle
    document.getElementById('sidebar-close').addEventListener('click', function() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
    });
</script>
