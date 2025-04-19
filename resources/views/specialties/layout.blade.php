@extends('layouts.patient')

@section('content')
<div class="space-y-8">
    <!-- Hero section -->
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">@yield('specialty-name')</h1>
                <p class="mt-2 text-lg text-gray-600">@yield('specialty-description')</p>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white shadow-sm rounded-lg p-4">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <label for="sort" class="block text-sm font-medium text-gray-700">Sort by</label>
                <select id="sort" name="sort" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm">
                    <option>Most Relevant</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Experience</option>
                    <option>Availability</option>
                </select>
            </div>
            <div class="flex-1">
                <label for="price" class="block text-sm font-medium text-gray-700">Price Range</label>
                <select id="price" name="price" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm">
                    <option>Any Price</option>
                    <option>$0 - $50</option>
                    <option>$51 - $100</option>
                    <option>$101 - $150</option>
                    <option>$151+</option>
                </select>
            </div>
            <div class="flex-1">
                <label for="availability" class="block text-sm font-medium text-gray-700">Availability</label>
                <select id="availability" name="availability" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm">
                    <option>Any Time</option>
                    <option>Today</option>
                    <option>Tomorrow</option>
                    <option>This Week</option>
                    <option>Next Week</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Doctors grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($doctors as $doctor)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <!-- Doctor Header with Gradient -->
            <div class="relative h-32 bg-gradient-to-r from-cyan-600 to-cyan-400">
                <div class="absolute -bottom-10 left-6">
                    <img class="h-24 w-24 rounded-xl border-4 border-white shadow-md"
                         src="https://ui-avatars.com/api/?name={{ urlencode($doctor->user->first_name . ' ' . $doctor->user->last_name) }}&background=0D9488&color=fff"
                         alt="{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}">
                </div>
            </div>

            <!-- Doctor Info -->
            <div class="pt-12 pb-6 px-6">
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</h3>
                    <p class="text-cyan-600 font-medium">{{ $doctor->specialty }}</p>
                </div>

                <!-- Stats Grid -->
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
                                <p class="font-semibold">${{ $doctor->consultation_price }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Available Times -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Next Available</h4>
                    <div class="flex space-x-2">
                        <span class="px-2 py-1 bg-cyan-50 text-cyan-700 text-sm rounded-md">Today 3:00 PM</span>
                        <span class="px-2 py-1 bg-cyan-50 text-cyan-700 text-sm rounded-md">Tomorrow 10:00 AM</span>
                    </div>
                </div>

                <!-- Action Button -->
                <button class="w-full bg-cyan-600 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-300">
                    Book Appointment
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
