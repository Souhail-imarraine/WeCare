@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto text-center mb-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">About WeCare</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Connecting patients with qualified healthcare professionals for better, more accessible healthcare.
        </p>
    </div>

    <!-- Mission & Vision Section -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <div class="flex items-center mb-4">
                <div class="bg-cyan-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-900 ml-4">Our Mission</h2>
            </div>
            <p class="text-gray-600 leading-relaxed">
                To revolutionize healthcare accessibility by providing a seamless platform that connects patients with healthcare providers, ensuring quality care is just a click away.
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-8">
            <div class="flex items-center mb-4">
                <div class="bg-cyan-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-900 ml-4">Our Vision</h2>
            </div>
            <p class="text-gray-600 leading-relaxed">
                To be the leading digital healthcare platform, transforming how people access and experience healthcare services worldwide.
            </p>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto mb-16">
        <h2 class="text-3xl font-semibold text-gray-900 text-center mb-12">Why Choose WeCare?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                <div class="bg-cyan-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">24/7 Availability</h3>
                <p class="text-gray-600">Access healthcare services anytime, anywhere through our platform.</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                <div class="bg-cyan-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Verified Doctors</h3>
                <p class="text-gray-600">All healthcare providers are thoroughly vetted and verified.</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                <div class="bg-cyan-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Easy Communication</h3>
                <p class="text-gray-600">Seamless interaction between patients and healthcare providers.</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm p-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-900 mb-4">Get in Touch</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Have questions about our services? We're here to help. Contact us through any of the following channels.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-cyan-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Email</h3>
                <p class="text-gray-600">support@wecare.com</p>
            </div>

            <div class="text-center">
                <div class="bg-cyan-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Phone</h3>
                <p class="text-gray-600">+1 (555) 123-4567</p>
            </div>

            <div class="text-center">
                <div class="bg-cyan-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Address</h3>
                <p class="text-gray-600">123 Healthcare Street<br>Medical District, MD 12345</p>
            </div>
        </div>
    </div>
</div>
@endsection
