@extends('layouts.patient')

@section('content')
<div class="space-y-8">
    <!-- Hero section -->
    <div class="text-center space-y-4">
        <h1 class="text-4xl font-bold text-gray-900">Book your next healthcare appointment</h1>
        <p class="text-xl text-gray-600">Find, book and add your favourite practitioners to your care team.</p>
    </div>

    <!-- Search section -->
    <div class="flex gap-4">
        <div class="flex-1 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
            </div>
            <input type="text" placeholder="Service, practice or practitioner" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500">
        </div>
        <div class="flex-1 relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
            </div>
            <input type="text" placeholder="Suburb or postcode" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500">
        </div>
        <button type="button" class="px-6 py-3 bg-cyan-600 text-white font-medium rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <!-- Top searches section -->
    <div class="space-y-6">
        <h2 class="text-xl font-semibold text-gray-900">Top searches</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- General Practitioner -->
            <a href="{{ route('specialties.general-practitioner') }}" class="block group">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/general-practitioner.jpg') }}" alt="General Practitioner" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-200">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900 group-hover:text-cyan-600">General Practitioner</h3>
                    </div>
                </div>
            </a>

            <!-- GP Telehealth -->
            <div class="block group opacity-75 cursor-not-allowed relative">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-10 z-10 flex items-center justify-center">
                        <span class="px-4 py-2 bg-gray-900 bg-opacity-75 text-white rounded-md text-sm font-medium">Coming Soon</span>
                    </div>
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/telehealth.jpg') }}" alt="GP Telehealth - Coming Soon" class="object-cover w-full h-full filter grayscale">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">GP Telehealth On Demand</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                            Service Unavailable
                        </span>
                    </div>
                </div>
            </div>

            <!-- Physiotherapist -->
            <div class="block group opacity-75 cursor-not-allowed relative">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-10 z-10 flex items-center justify-center">
                        <span class="px-4 py-2 bg-gray-900 bg-opacity-75 text-white rounded-md text-sm font-medium">Coming Soon</span>
                    </div>
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/physiotherapist.webp') }}" alt="Physiotherapist - Coming Soon" class="object-cover w-full h-full filter grayscale">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Physiotherapist</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                            Service Unavailable
                        </span>
                    </div>
                </div>
            </div>

            <!-- Dentist -->
            <div class="block group opacity-75 cursor-not-allowed relative">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-10 z-10 flex items-center justify-center">
                        <span class="px-4 py-2 bg-gray-900 bg-opacity-75 text-white rounded-md text-sm font-medium">Coming Soon</span>
                    </div>
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/dentist.jpg') }}" alt="Dentist - Coming Soon" class="object-cover w-full h-full filter grayscale">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Dentist</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                            Service Unavailable
                        </span>
                    </div>
                </div>
            </div>

            <!-- Psychologist -->
            <div class="block group opacity-75 cursor-not-allowed relative">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-10 z-10 flex items-center justify-center">
                        <span class="px-4 py-2 bg-gray-900 bg-opacity-75 text-white rounded-md text-sm font-medium">Coming Soon</span>
                    </div>
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/psychologist.jpg') }}" alt="Psychologist - Coming Soon" class="object-cover w-full h-full filter grayscale">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Psychologist</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                            Service Unavailable
                        </span>
                    </div>
                </div>
            </div>

            <!-- Optometrist -->
            <div class="block group opacity-75 cursor-not-allowed relative">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="absolute inset-0 bg-gray-900 bg-opacity-10 z-10 flex items-center justify-center">
                        <span class="px-4 py-2 bg-gray-900 bg-opacity-75 text-white rounded-md text-sm font-medium">Coming Soon</span>
                    </div>
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/optometrist.jpg') }}" alt="Optometrist - Coming Soon" class="object-cover w-full h-full filter grayscale">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900">Optometrist</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                            Service Unavailable
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
