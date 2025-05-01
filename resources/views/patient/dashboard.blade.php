@extends('layouts.patient')

@section('content')
<div class="space-y-8">
    <div class="text-center space-y-4">
        <h1 class="text-4xl font-bold text-gray-900">Book your next healthcare appointment</h1>
        <p class="text-xl text-gray-600">Find, book and add your favourite practitioners to your care team.</p>
    </div>


    <div class="space-y-6">
        <h2 class="text-xl font-semibold text-gray-900">Top searches</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('patient.doctors') }}" class="block group">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200 overflow-hidden">
                    <div class="h-48 bg-gray-200">
                        <img src="{{ asset('images/specialties/general-practitioner.jpg') }}" alt="General Practitioner" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-200">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-900 group-hover:text-cyan-600">General Practitioner</h3>
                    </div>
                </div>
            </a>

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
