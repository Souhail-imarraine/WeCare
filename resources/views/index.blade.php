<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wecare | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-white ">
    <!-- Header -->
    <header class="bg-white fixed w-full top-0 z-50">
        <nav class="container mx-auto flex justify-between items-center py-4 px-6">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <span class="text-gray-800">W</span><span class="text-cyan-500">e</span>
                <span class="text-gray-800">Car</span><span class="text-cyan-500">e</span>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-8 text-gray-600">
                <a href="#" class="text-cyan-500">Home</a>
                <a href="#" class="hover:text-cyan-500">About us</a>
                <a href="#" class="hover:text-cyan-500">Contact</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('chose') }}" class="px-6 py-2 bg-cyan-500 text-white rounded-md hover:bg-cyan-600 transition duration-300">
                    Signup
                </a>
                <a href="{{ route('login') }}" class="px-6 py-2 text-gray-700 rounded-md border border-gray-300 hover:bg-gray-100 transition duration-300">
                    Login
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="flex flex-col items-center space-y-4 py-4 bg-white shadow-lg">
                <a href="#" class="text-cyan-500">Home</a>
                <a href="#" class="hover:text-cyan-500">About us</a>
                <a href="#" class="hover:text-cyan-500">Contact</a>
                <button class="w-full max-w-xs px-6 py-2 bg-cyan-500 text-white rounded-md hover:bg-cyan-600">
                    Signup
                </button>
                <button
                    class="w-full max-w-xs px-6 py-2 text-gray-700 rounded-md border border-gray-300 hover:bg-gray-100">
                    Login
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative min-h-screen w-full overflow-hidden">
            <!-- Background Container -->
            <div class="absolute inset-0">
                <div class="relative w-full h-screen bg-[url('{{ asset('img/background.svg') }}')]
                    bg-cover bg-center bg-no-repeat bg-fixed">
                    <div class="absolute inset-0 bg-black/30"></div>
                </div>
            </div>

            <!-- Content Container -->
            <div class="relative h-screen flex items-center">
                <div class="container mx-auto px-4 md:px-6">
                    <div class="flex flex-col md:flex-row md:justify-end items-center md:items-start md:mr-12 lg:mr-56">
                        <div class="max-w-xl text-center md:text-left px-4 md:px-0">
                            <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">Bienvenue sur</h1>
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                                <span class="text-white">W</span><span class="text-cyan-500">e</span>
                                <span class="text-white">Car</span><span class="text-cyan-500">e</span>
                </h2>
                            <p class="text-lg md:text-xl text-white mb-8">Réservez des consultations en quelques clics...</p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                                <button class="px-8 py-3 bg-cyan-500 text-white rounded-md hover:bg-cyan-600 transition duration-300 flex items-center justify-center">
                                    Find Your Doctor
                                </button>
                                <button class="px-8 py-3 bg-transparent text-white border-2 border-white rounded-md hover:bg-white/10 transition duration-300 flex items-center justify-center gap-2">
                                    <span>Learn More</span>
                                    <i class="fas fa-play-circle text-cyan-500"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Doctors Section -->
    <section class="py-8 md:py-16 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <!-- Section Title -->
            <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-12 px-2">
                <span class="text-blue-900">Top Rated</span>
                <span class="text-[#5BA3B2]">Doctors</span>
                <span class="text-blue-900">Near You</span>
            </h2>

            <!-- Doctors Cards Container -->
            <div class="relative">
                <!-- Scrollable Container -->
                <div class="flex overflow-x-auto gap-4 md:gap-6 pb-6 -mx-4 px-4 md:px-0 scrollbar-hide snap-x snap-mandatory">
                    <!-- Doctor Card 1 -->
                    <div class="flex-none w-[260px] md:w-[280px] snap-start">
                        <div class="bg-white rounded-lg border border-gray-100 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('img/doctore.png') }}" alt="Dr Y K Mishra"
                                class="w-full h-[180px] md:h-[200px] object-cover rounded-lg mb-4">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800 line-clamp-1">Dr Y K Mishra</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Cardiac Surgeon, New Delhi, India</p>
                            <button class="w-full py-2 md:py-2.5 text-[#5BA3B2] border border-[#5BA3B2] rounded-md hover:bg-[#5BA3B2] hover:text-white transition duration-300">
                                Consult Now
                            </button>
                        </div>
                    </div>

                    <!-- Doctor Card 2 -->
                    <div class="flex-none w-[260px] md:w-[280px] snap-start">
                        <div class="bg-white rounded-lg border border-gray-100 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('img/doctore.png') }}" alt="Dr. Sandeep Vaishya"
                                class="w-full h-[180px] md:h-[200px] object-cover rounded-lg mb-4">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800 line-clamp-1">Dr. Sandeep Vaishya</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Neurosurgeon, Gurgaon, India</p>
                            <button class="w-full py-2 md:py-2.5 text-[#5BA3B2] border border-[#5BA3B2] rounded-md hover:bg-[#5BA3B2] hover:text-white transition duration-300">
                                Consult Now
                            </button>
                        </div>
                    </div>

                    <!-- Doctor Card 3 -->
                    <div class="flex-none w-[260px] md:w-[280px] snap-start">
                        <div class="bg-white rounded-lg border border-gray-100 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('img/doctore.png') }}" alt="Dr. Rajeev Verma"
                                class="w-full h-[180px] md:h-[200px] object-cover rounded-lg mb-4">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800 line-clamp-1">Dr. Rajeev Verma</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Orthopaedic and Joint Replacement Surgeon</p>
                            <button class="w-full py-2 md:py-2.5 text-[#5BA3B2] border border-[#5BA3B2] rounded-md hover:bg-[#5BA3B2] hover:text-white transition duration-300">
                                Consult Now
                            </button>
                        </div>
                    </div>

                    <!-- Doctor Card 4 -->
                    <div class="flex-none w-[260px] md:w-[280px] snap-start">
                        <div class="bg-white rounded-lg border border-gray-100 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('img/doctore.png') }}" alt="Dr. Ajay kaul"
                                class="w-full h-[180px] md:h-[200px] object-cover rounded-lg mb-4">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800 line-clamp-1">Dr. Ajay kaul</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Cardiac Surgeon, New Delhi, India</p>
                            <button class="w-full py-2 md:py-2.5 text-[#5BA3B2] border border-[#5BA3B2] rounded-md hover:bg-[#5BA3B2] hover:text-white transition duration-300">
                                Consult Now
                            </button>
                        </div>
                    </div>

                    <!-- Doctor Card 5 -->
                    <div class="flex-none w-[260px] md:w-[280px] snap-start">
                        <div class="bg-white rounded-lg border border-gray-100 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('img/doctore.png') }}" alt="Dr Naresh Terhan"
                                class="w-full h-[180px] md:h-[200px] object-cover rounded-lg mb-4">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800 line-clamp-1">Dr Naresh Terhan</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Cardiac Surgeon, Gurgaon, India</p>
                            <button class="w-full py-2 md:py-2.5 text-[#5BA3B2] border border-[#5BA3B2] rounded-md hover:bg-[#5BA3B2] hover:text-white transition duration-300">
                                Consult Now
                            </button>
                        </div>
                    </div>

                    <!-- Doctor Card 6 -->
                    <div class="flex-none w-[260px] md:w-[280px] snap-start">
                        <div class="bg-white rounded-lg border border-gray-100 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ asset('img/doctore.png') }}" alt="Dr Vinod Raina"
                                class="w-full h-[180px] md:h-[200px] object-cover rounded-lg mb-4">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800 line-clamp-1">Dr Vinod Raina</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Medical Oncologist, Gurgaon, India</p>
                            <button class="w-full py-2 md:py-2.5 text-[#5BA3B2] border border-[#5BA3B2] rounded-md hover:bg-[#5BA3B2] hover:text-white transition duration-300">
                                Consult Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows - Hidden on Mobile -->
                <button class="hidden md:block absolute -left-4 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 shadow-lg">
                    <svg class="w-6 h-6 text-blue-900 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button class="hidden md:block absolute -right-4 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 shadow-lg">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- View All Link -->
            <div class="mt-6 md:mt-8 text-center">
                <a href="#" class="text-[#5BA3B2] hover:text-[#4A8A98] text-sm font-medium">View All</a>
            </div>
        </div>
    </section>

    <script>
        // Mobile menu toggle
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });
    </script>

    <style>
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        @media (max-width: 768px) {
            .hero-content {
                text-align: center;
                padding: 0 1rem;
            }
        }
    </style>
</body>

</html>
