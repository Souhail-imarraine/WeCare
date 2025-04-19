<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WeCare') }} - Patient Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
    </style>

    @stack('head')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('partials.patient-sidebar')

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <!-- Site header -->
            <header class="sticky top-0 bg-white border-b border-gray-200 z-30 lg:hidden">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 -mb-px">
                        <div class="flex">
                            <button class="text-gray-500 hover:text-gray-600 lg:hidden" aria-controls="sidebar" aria-expanded="false" id="sidebar-toggle">
                                <span class="sr-only">Open sidebar</span>
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4" y="5" width="16" height="2" />
                                    <rect x="4" y="11" width="16" height="2" />
                                    <rect x="4" y="17" width="16" height="2" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1">
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Sidebar Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden transition-opacity duration-200 opacity-0 pointer-events-none" aria-hidden="true" id="sidebar-overlay"></div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            if (sidebar && sidebarOverlay) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                sidebarOverlay.classList.add('opacity-100');
                sidebarToggle.setAttribute('aria-expanded', 'true');
            }
        }

        function closeSidebar() {
            if (sidebar && sidebarOverlay) {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                sidebarOverlay.classList.remove('opacity-100');
                sidebarToggle.setAttribute('aria-expanded', 'false');
            }
        }

        if (sidebar && sidebarToggle && sidebarOverlay) {
            sidebarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                if (sidebar.classList.contains('-translate-x-full')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            });

            sidebarOverlay.addEventListener('click', () => {
                closeSidebar();
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && sidebar.classList.contains('translate-x-0')) {
                    closeSidebar();
                }
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
