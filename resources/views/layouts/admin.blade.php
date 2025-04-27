<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WeCare') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-cyan-800 transition-transform duration-200 ease-in-out z-30"
             id="sidebar">
            <!-- Logo -->
            <div class="flex items-center justify-between px-4 py-6">
                <div class="flex items-center">
                    <span class="text-white text-2xl font-bold">WeCare Admin</span>
                </div>
                <button id="sidebar-close" class="lg:hidden text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="mt-8 px-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.doctors') }}" class="flex items-center px-4 py-3 text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.doctors') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-user-md w-5 h-5 mr-3"></i>
                        <span>Doctors</span>
                    </a>

                    <a href="{{ route('admin.patients') }}" class="flex items-center px-4 py-3 text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.patients') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-users w-5 h-5 mr-3"></i>
                        <span>Patients</span>
                    </a>

                    <a href="{{ route('admin.appointments') }}" class="flex items-center px-4 py-3 text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.appointments') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>
                        <span>Appointments</span>
                    </a>

                    <a href="{{ route('admin.specialties') }}" class="flex items-center px-4 py-3 text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.specialties') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-stethoscope w-5 h-5 mr-3"></i>
                        <span>Specialties</span>
                    </a>

                    <a href="{{ route('admin.reports') }}" class="flex items-center px-4 py-3 text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.reports') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                        <span>Reports</span>
                    </a>
                </div>
            </nav>

            <!-- User Menu -->
            <div class="absolute bottom-0 left-0 right-0 px-4 py-6 bg-cyan-900">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full object-cover"
                         src="{{ Auth::user()->profile_image ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                         alt="{{ Auth::user()->name }}">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <div class="flex space-x-3 text-xs text-gray-300">
                            <a href="{{ route('admin.profile') }}" class="hover:text-white">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="hover:text-white">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:pl-64">
            <!-- Top Navigation -->
            <div class="fixed top-0 left-0 right-0 lg:left-64 bg-white border-b border-gray-200 z-20">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <!-- Left side -->
                    <div class="flex items-center">
                        <button class="text-gray-500 hover:text-gray-600 lg:hidden" id="sidebar-toggle">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Right side -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="text-gray-500 hover:text-gray-600 relative">
                            <span class="sr-only">View notifications</span>
                            <i class="fas fa-bell w-6 h-6"></i>
                            @if($notifications_count ?? 0 > 0)
                                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                            @endif
                        </button>

                        <!-- Settings -->
                        <a href="{{ route('admin.settings') }}" class="text-gray-500 hover:text-gray-600">
                            <span class="sr-only">Settings</span>
                            <i class="fas fa-cog w-6 h-6"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="pt-16">
                @if(session('success'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                        <div class="bg-green-50 border border-green-200 rounded-md p-4 flex items-center">
                            <i class="fas fa-check-circle text-green-400 mr-3"></i>
                            <span class="text-green-700">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                        <div class="bg-red-50 border border-red-200 rounded-md p-4 flex items-center">
                            <i class="fas fa-exclamation-circle text-red-400 mr-3"></i>
                            <span class="text-red-700">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 lg:hidden hidden" id="sidebar-overlay"></div>

    <!-- Scripts -->
    <script>
        // Sidebar Toggle Functionality
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function toggleSidebar(show) {
            if (show) {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }
        }

        sidebarToggle.addEventListener('click', () => toggleSidebar(true));
        sidebarClose.addEventListener('click', () => toggleSidebar(false));
        sidebarOverlay.addEventListener('click', () => toggleSidebar(false));

        // Close sidebar on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') toggleSidebar(false);
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
