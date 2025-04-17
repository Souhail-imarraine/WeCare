@extends('layouts.app-welcome')

@section('title', 'WeCare | Home')

@section('content')
    {{-- Hero Section --}}
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

    {{-- Doctors Section --}}
    <section class="py-8 md:py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
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
                        <div class="bg-transparent backdrop-blur-sm rounded-lg border border-gray-200/50 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
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
                        <div class="bg-transparent backdrop-blur-sm rounded-lg border border-gray-200/50 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
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
                        <div class="bg-transparent backdrop-blur-sm rounded-lg border border-gray-200/50 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
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
                        <div class="bg-transparent backdrop-blur-sm rounded-lg border border-gray-200/50 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
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
                        <div class="bg-transparent backdrop-blur-sm rounded-lg border border-gray-200/50 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
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
                        <div class="bg-transparent backdrop-blur-sm rounded-lg border border-gray-200/50 p-3 md:p-4 hover:shadow-lg transition-shadow duration-300">
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
                <button class="hidden md:block absolute -left-4 top-1/2 -translate-y-1/2 bg-transparent backdrop-blur-sm rounded-full p-2 shadow-lg">
                    <svg class="w-6 h-6 text-blue-900 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button class="hidden md:block absolute -right-4 top-1/2 -translate-y-1/2 bg-transparent backdrop-blur-sm rounded-full p-2 shadow-lg">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- View All Link -->
            <div class="mt-6 md:mt-8 text-center">
                <a href="#" class="text-cyan-500 hover:text-cyan-600 font-medium transition-colors duration-200 inline-flex items-center">
                    View All
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="text-blue-900">Why Choose</span>
                <span class="text-[#5BA3B2]"> WeCare?</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Availability</h3>
                    <p class="text-gray-600">Access healthcare services anytime, anywhere through our platform.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-md text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Verified Doctors</h3>
                    <p class="text-gray-600">All healthcare providers are thoroughly vetted and verified.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-comments text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Easy Communication</h3>
                    <p class="text-gray-600">Seamless interaction between patients and healthcare providers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="text-blue-900">What Our</span>
                <span class="text-[#5BA3B2]"> Patients Say</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Patient" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <p class="text-sm text-gray-500">Patient</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"The convenience of booking appointments online and the quality of care I received was exceptional. Highly recommend!"</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Patient" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Michael Brown</h4>
                            <p class="text-sm text-gray-500">Patient</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"The doctors are professional and the platform is very user-friendly. It's made managing my healthcare so much easier."</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Patient" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Emily Davis</h4>
                            <p class="text-sm text-gray-500">Patient</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"I love how easy it is to find and book appointments with specialists. The follow-up care is also excellent."</p>
                </div>
            </div>
        </div>
    </section>
@endsection
