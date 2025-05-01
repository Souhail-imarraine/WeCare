@extends('layouts.app-welcome')

@section('title', 'WeCare | Home')

@section('content')
    <section class="relative min-h-screen w-full overflow-hidden">
        <div class="absolute inset-0">
            <div class="relative w-full h-full bg-[url('{{ asset('img/background.svg') }}')]
                bg-cover bg-center bg-no-repeat">
                <div class="absolute inset-0 bg-gradient-to-l from-black/60 to-black/30"></div>
            </div>
        </div>

        <div class="relative h-full flex items-center justify-center mt-32">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="flex justify-end items-center">
                    <div class="max-w-3xl text-center px-4 lg:px-0">
                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6">
                            <span class="block mb-4">Bienvenue sur</span>
                            <span class="text-white">W</span><span class="text-cyan-400">e</span>
                            <span class="text-white">Car</span><span class="text-cyan-400">e</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-200 mb-12 leading-relaxed max-w-2xl mx-auto">
                            Réservez des consultations en quelques clics et prenez soin de votre santé avec les meilleurs professionnels.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-6 justify-center">
                            <a href="{{ route('patient.register.form') }}"
                               class="px-8 py-4 bg-cyan-500 text-white text-lg font-semibold rounded-lg hover:bg-cyan-600 transform hover:scale-105 transition duration-300 flex items-center justify-center shadow-lg">
                                Trouvez votre médecin
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                            <button class="px-8 py-4 bg-white/10 text-white text-lg font-semibold rounded-lg backdrop-blur-sm border-2 border-white/30 hover:bg-white/20 transform hover:scale-105 transition duration-300 flex items-center justify-center gap-2 shadow-lg">
                                <span>En savoir plus</span>
                                <i class="fas fa-play-circle text-cyan-400"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Doctors Section --}}
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <!-- Section Title -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold">
                    <span class="text-blue-900">Top Rated</span>
                    <span class="text-cyan-500">Doctors</span>
                    <span class="text-blue-900">Near You</span>
                </h2>
                <p class="mt-4 text-xl text-gray-600">Find and book appointments with the best doctors in your area</p>
            </div>

            <div class="relative px-4">
                <div class="flex overflow-x-auto gap-6 pb-8 -mx-4 px-4 scrollbar-hide snap-x snap-mandatory">
                    @foreach($doctors as $doctor)
                    <div class="flex-none w-[300px] md:w-[320px] snap-start">
                        <div class="bg-white rounded-2xl shadow-lg p-5 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                            <div class="relative mb-6">
                                <img src="{{ asset('storage/' . $doctor->profile_image) }}" alt="Doctor"
                                    class="w-full h-[220px] object-cover rounded-xl">
                                <div class="absolute top-4 right-4 bg-green-500 text-white text-sm px-3 py-1 rounded-full">Available</div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">Dr. {{ $doctor->user->name }}</h3>
                                    <p class="text-cyan-600 font-medium">{{ $doctor->specialty }}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="flex text-yellow-400">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                    <span class="text-gray-600">({{ $doctor->city }})</span>
                                </div>
                                <div class="pt-4">
                                    <a href="{{ route('doctor.profile', $doctor->id) }}" class="w-full py-3 text-white bg-cyan-500 rounded-xl hover:bg-cyan-600 transform hover:scale-105 transition duration-300 font-semibold block text-center">
                                        Book Consultation
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation Arrows -->
                <button class="hidden md:flex absolute -left-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg items-center justify-center hover:bg-gray-50 transition-colors">
                    <svg class="w-6 h-6 text-gray-800 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button class="hidden md:flex absolute -right-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg items-center justify-center hover:bg-gray-50 transition-colors">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold">
                    <span class="text-blue-900">Why Choose</span>
                    <span class="text-cyan-500"> WeCare?</span>
                </h2>
                <p class="mt-4 text-xl text-gray-600">Experience healthcare like never before</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-20 h-20 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-3xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">24/7 Availability</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Access healthcare services anytime, anywhere through our secure and reliable platform.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-20 h-20 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-md text-3xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Verified Doctors</h3>
                    <p class="text-gray-600 text-center leading-relaxed">All healthcare providers are thoroughly vetted and verified for your peace of mind.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-20 h-20 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-comments text-3xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Easy Communication</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Seamless interaction between patients and healthcare providers at your fingertips.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold">
                    <span class="text-blue-900">What Our</span>
                    <span class="text-cyan-500"> Patients Say</span>
                </h2>
                <p class="mt-4 text-xl text-gray-600">Real experiences from our valued patients</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['name' => 'Sarah Johnson', 'image' => '1', 'gender' => 'women'],
                    ['name' => 'Michael Brown', 'image' => '1', 'gender' => 'men'],
                    ['name' => 'Emily Davis', 'image' => '2', 'gender' => 'women']
                ] as $testimonial)
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full overflow-hidden mr-4 ring-4 ring-cyan-50">
                            <img src="https://randomuser.me/api/portraits/{{ $testimonial['gender'] }}/{{ $testimonial['image'] }}.jpg"
                                alt="Patient" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-800">{{ $testimonial['name'] }}</h4>
                            <div class="flex items-center mt-1">
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star text-sm"></i>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-500 ml-2">Verified Patient</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed italic">"{{ [
                        'The convenience of booking appointments online and the quality of care I received was exceptional. Highly recommend!',
                        'The doctors are professional and the platform is very user-friendly. It\'s made managing my healthcare so much easier.',
                        'I love how easy it is to find and book appointments with specialists. The follow-up care is also excellent.'
                    ][$loop->index] }}"</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
