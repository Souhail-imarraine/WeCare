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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
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
<body class="bg-gray-50">
    <button id="mobile-menu-button" class="fixed top-4 left-4 z-50 p-2 rounded-md text-gray-500 hover:bg-gray-100 lg:hidden">
        <i class="fas fa-bars text-xl"></i>
    </button>

    <aside class="fixed top-0 left-0 h-full w-64 bg-cyan-800 text-white sidebar z-40">
        <div class="p-4 border-b border-cyan-700">
            <h1 class="text-xl font-bold">WeCare Admin</h1>
        </div>

        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center p-2 rounded-lg hover:bg-cyan-700 {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-home w-6"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.doctors') }}"
                       class="flex items-center p-2 rounded-lg hover:bg-cyan-700 {{ request()->routeIs('admin.doctors') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-user-md w-6"></i>
                        <span class="ml-3">Doctors</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.patients') }}"
                       class="flex items-center p-2 rounded-lg hover:bg-cyan-700 {{ request()->routeIs('admin.patients') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-users w-6"></i>
                        <span class="ml-3">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.requests') }}"
                       class="flex items-center p-2 rounded-lg hover:bg-cyan-700 {{ request()->routeIs('admin.requests') ? 'bg-cyan-700' : '' }}">
                        <i class="fas fa-calendar-alt w-6"></i>
                        <span class="ml-3">Requests</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="absolute bottom-0 left-0 right-0 p-4 bg-cyan-900 border-t border-cyan-800">
            <div class="flex items-center justify-center">
                <div class="flex items-center space-x-2">
                    <div class="text-sm text-gray-300">
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 hover:text-white transition-colors duration-200">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Sign out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <main class="lg:ml-64 min-h-screen">
        <header class="bg-white shadow-sm sticky top-0 z-30">
            <div class="px-4 py-4">
                <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
            </div>
        </header>

        <div class="p-4">
            @if(session('error'))
                <div class="mb-4 bg-red-50 border border-red-200 rounded-lg p-4 flex items-center">
                    <i class="fas fa-exclamation-circle text-red-400 mr-3"></i>
                    <span class="text-red-700">{{ session('error') }}</span>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('hidden');
                document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
            }

            mobileMenuButton.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);

            // Close sidebar on window resize if open
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024 && sidebar.classList.contains('open')) {
                    toggleSidebar();
                }
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 1024) {
                    if (!sidebar.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                        if (sidebar.classList.contains('open')) {
                            toggleSidebar();
                        }
                    }
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
