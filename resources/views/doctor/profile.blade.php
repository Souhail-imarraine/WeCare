@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <h1 class="text-xl font-medium mb-6 lg:mb-8">Profile</h1>

    <!-- Profile and General Information -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 sm:gap-6 mb-4 sm:mb-6">
        <!-- Left Column - Profile Info -->
        <div class="md:col-span-4 lg:col-span-4">
            <div class="bg-white rounded-lg p-6 lg:p-8">
                <div class="flex flex-col items-center">
                    <div class="w-32 h-32 sm:w-40 sm:h-40 lg:w-48 lg:h-48 rounded-full overflow-hidden bg-gray-100 mb-4">
                        <img src="{{ asset($doctor->profile_photo ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuNhTZJTtkR6b-ADMhmzPvVwaLuLdz273wvQ&s') }}"
                             alt="{{ $doctor->name }}"
                             class="w-full h-full object-cover">
                    </div>
                    <h2 class="text-lg sm:text-xl font-semibold text-center">{{ $doctor->name }}</h2>
                    <p class="text-gray-500 text-sm mt-1">{{ $doctor->city }}, {{ $doctor->age }} y.o</p>
                </div>
            </div>
        </div>

        <!-- Right Column - General Information -->
        <div class="md:col-span-8 lg:col-span-8">
            <div class="bg-white rounded-lg p-6 lg:p-8">
                <h3 class="text-lg font-medium mb-6 lg:mb-8">General Information</h3>

                <!-- Experience -->
                <div class="mb-6 lg:mb-8">
                    <h4 class="text-sm font-medium mb-4">Experience</h4>
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-12">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-cyan-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">{{ $doctor->years_experience ?? '5' }} yrs of exp.</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 bg-cyan-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">{{ $doctor->consultations_count ?? '300+' }} online consultation</span>
                        </div>
                    </div>
                </div>

                <!-- About Me -->
                <div class="mb-6 lg:mb-8">
                    <h4 class="text-sm font-medium mb-4">About Me</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        {{ $doctor->about ?? 'I diagnose and treat allergies and immune system disorders, helping patients manage symptoms and improve their quality of life.' }}
                    </p>
                </div>

                <!-- Consultation Price -->
                <div>
                    <h4 class="text-sm font-medium mb-4">Consultation Price</h4>
                    <p class="text-green-500 font-medium">{{ $doctor->consultation_price ?? '200' }}DH</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Socials and Contact -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 sm:gap-6">
        <!-- Socials -->
        <div class="md:col-span-4 lg:col-span-4">
            <div class="bg-white rounded-lg p-6 lg:p-8">
                <h3 class="text-lg font-medium mb-6 lg:mb-8">Socials</h3>
                <div class="flex justify-center sm:justify-start gap-6">
                    <a href="{{ $doctor->linkedin_url ?? '#' }}" class="text-cyan-500 hover:text-cyan-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    <a href="{{ $doctor->instagram_url ?? '#' }}" class="text-cyan-500 hover:text-cyan-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="{{ $doctor->facebook_url ?? '#' }}" class="text-cyan-500 hover:text-cyan-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="md:col-span-8 lg:col-span-8">
            <div class="bg-white rounded-lg p-6 lg:p-8">
                <h3 class="text-lg font-medium mb-6 lg:mb-8">Contact</h3>
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm text-gray-600">{{ $doctor->address }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-gray-600 break-all">{{ $doctor->email }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-sm text-gray-600">{{ $doctor->phone }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
