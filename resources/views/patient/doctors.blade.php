@extends('layouts.patient')

@section('content')
<div class="space-y-8">
    <!-- Header Section -->
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">General Practitioner</h1>
                <p class="mt-2 text-lg text-gray-600">Find experienced general practitioners near you. Our GPs provide comprehensive primary healthcare services for you and your family.</p>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-white shadow-sm rounded-lg p-4">
        <form action="{{ route('patient.doctors') }}" method="GET">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700">Search Doctors</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm" placeholder="Search by name, specialty, or location">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if(request('search'))
        <div class="bg-white shadow-sm rounded-lg p-4">
            <p class="text-sm text-gray-600">
                Showing results for: <span class="font-medium">{{ request('search') }}</span>
            </p>
        </div>
    @endif

    <!-- Doctors Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($doctors as $doctor)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="relative h-32 bg-gradient-to-r from-cyan-600 to-cyan-400">
                <div class="absolute -bottom-10 left-6">
                    <div class="h-24 w-24 rounded-xl border-4 border-white shadow-md overflow-hidden">
                        <img class="w-full h-full object-cover"
                             src="{{ asset($doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                             alt="{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}">
                    </div>
                </div>
            </div>

            <div class="pt-12 pb-6 px-6">
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</h3>
                    <p class="text-cyan-600 font-medium">{{ $doctor->specialty }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-gray-500">Experience</p>
                                <p class="font-semibold">{{ $doctor->years_experience }} Years</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <div>
                                <p class="text-gray-500">Consultation</p>
                                <p class="font-semibold">${{ number_format($doctor->consultation_price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ $doctor->city ?? 'Location not specified' }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>{{ $doctor->phone_number ?? 'Contact not specified' }}</span>
                    </div>
                </div>

                <!-- Action Button -->
                <a href="{{ route('patient.doctor_profile', $doctor->id) }}" class="block w-full bg-cyan-600 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-300 text-center">
                    Book Appointment
                </a>
            </div>
        </div>
        @empty
            <div class="col-span-full">
                <div class="text-center py-12">
                    <i class="fas fa-user-md text-gray-400 text-5xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900">No doctors found</h3>
                    <p class="mt-1 text-sm text-gray-500">No doctors match your search criteria.</p>
                </div>
            </div>
        @endforelse
    </div>

    @if(method_exists($doctors, 'links'))
    <div class="mt-8">
        {{ $doctors->links() }}
    </div>
    @endif
</div>
@endsection

