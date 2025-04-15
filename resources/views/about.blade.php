@extends('layouts.app-welcome')

@section('title', 'WeCare - About Us')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-blue-900">About</span>
                    <span class="text-[#5BA3B2]"> WeCare</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    WeCare is a revolutionary healthcare platform dedicated to connecting patients with qualified healthcare professionals, making quality healthcare accessible to everyone.
                </p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">
                        <span class="text-blue-900">Our</span>
                        <span class="text-[#5BA3B2]"> Mission</span>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Our mission is to revolutionize healthcare accessibility by providing a seamless platform that connects patients with qualified healthcare professionals. We strive to make quality healthcare services available to everyone, anytime, anywhere.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-cyan-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Provide easy access to healthcare services</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-cyan-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Ensure quality care through verified professionals</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-cyan-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Create a seamless healthcare experience</span>
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <img src="{{ asset('img/about.svg') }}" alt="Our Mission" class="rounded-lg shadow-lg w[300px] h-[300px] md:w-[600px] md:h-[600px] mx-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="text-blue-900">Our</span>
                <span class="text-[#5BA3B2]"> Values</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Compassion</h3>
                    <p class="text-gray-600 text-center">We care deeply about our patients and their well-being, providing support and understanding throughout their healthcare journey.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Integrity</h3>
                    <p class="text-gray-600 text-center">We maintain the highest standards of honesty and transparency in all our operations and interactions.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Innovation</h3>
                    <p class="text-gray-600 text-center">We continuously strive to improve and innovate our services to better serve our patients and healthcare providers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">
                <span class="text-blue-900">Our</span>
                <span class="text-[#5BA3B2]"> Team</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">John Smith</h3>
                    <p class="text-gray-500 mb-4">CEO & Founder</p>
                    <p class="text-gray-600">Leading the vision and strategy of WeCare to transform healthcare accessibility.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Sarah Johnson</h3>
                    <p class="text-gray-500 mb-4">Medical Director</p>
                    <p class="text-gray-600">Ensuring the highest standards of medical care and professional verification.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Michael Brown</h3>
                    <p class="text-gray-500 mb-4">Technology Lead</p>
                    <p class="text-gray-600">Driving innovation and technical excellence in our platform development.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
