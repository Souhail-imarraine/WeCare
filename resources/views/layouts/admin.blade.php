<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WeCare') }} - Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        [x-cloak] { display: none !important; }
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <div class="fixed top-0 left-0 z-40 lg:hidden">
            <button id="mobile-menu-button" class="p-4 text-gray-500 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div class="fixed inset-y-0 left-0 w-64 bg-cyan-800 transition-transform duration-300 ease-in-out z-30 sidebar"
             id="sidebar">
            <div class="flex items-center justify-between px-4 py-6">
                <div class="flex items-center">
                    <span class="text-white text-xl font-bold">WeCare Admin</span>
                </div>
                <button id="sidebar-close" class="lg:hidden text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="mt-4 px-2">
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center px-3 py-2 text-sm text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.doctors') }}"
                       class="flex items-center px-3 py-2 text-sm text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.doctors') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-user-md w-5 h-5 mr-3"></i>
                        <span>Doctors</span>
                    </a>

                    <a href="{{ route('admin.patients') }}"
                       class="flex items-center px-3 py-2 text-sm text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.patients') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-users w-5 h-5 mr-3"></i>
                        <span>Patients</span>
                    </a>

                    <a href="{{ route('admin.requests') }}"
                       class="flex items-center px-3 py-2 text-sm text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.appointments') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>
                        <span>Requests</span>
                    </a>

                    <a href="#"
                       class="flex items-center px-3 py-2 text-sm text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-stethoscope w-5 h-5 mr-3"></i>
                        <span>Specialties</span>
                    </a>

                    <a href="#"
                       class="flex items-center px-3 py-2 text-sm text-white hover:bg-cyan-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                        <span>Reports</span>
                    </a>
                </div>
            </nav>

            <!-- User Menu -->
            <div class="absolute bottom-0 left-0 right-0 px-4 py-4 bg-cyan-900">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full object-cover"
                         src="{{ Auth::user()->profile_image ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                         alt="{{ Auth::user()->name }}">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <div class="flex space-x-3 text-xs text-gray-300">
                            <a href="#" class="hover:text-white">Profile</a>
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
        <div class="lg:ml-64 main-content">
            <!-- Top Navigation -->
            <div class="fixed top-0 right-0 left-0 lg:left-64 bg-white border-b border-gray-200 z-20">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex justify-between">
                        <div class="flex items-center">
                            <h1 class="text-lg font-semibold text-gray-900">@yield('title', 'Dashboard')</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="pt-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    @if(session('error'))
                        <div class="mb-4 bg-red-50 border border-red-200 rounded-md p-4 flex items-center">
                            <i class="fas fa-exclamation-circle text-red-400 mr-3"></i>
                            <span class="text-red-700">{{ session('error') }}</span>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 lg:hidden hidden" id="sidebar-overlay"></div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebarClose = document.getElementById('sidebar-close');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('open');
                sidebarOverlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            }

            mobileMenuButton.addEventListener('click', toggleSidebar);
            sidebarClose.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            document.addEventListener('click', function(event) {
                if (window.innerWidth < 1024) {
                    if (!sidebar.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                        sidebar.classList.remove('open');
                        sidebarOverlay.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('open');
                    sidebarOverlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
