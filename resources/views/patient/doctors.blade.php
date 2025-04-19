@extends('layouts.patient')

@section('content')
<div class="space-y-6">
    <!-- Page header -->
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Doctors</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <div class="relative">
                <input type="text" placeholder="Search doctors..." class="block w-full rounded-md border-0 py-1.5 pl-10 pr-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-cyan-600 sm:text-sm sm:leading-6">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg shadow-sm">
        <div class="flex flex-col sm:flex-row gap-4">
            <!-- Specialty Filter -->
            <div class="flex-1">
                <label for="specialty" class="block text-sm font-medium text-gray-700 mb-1">Specialty</label>
                <div class="relative">
                    <select id="specialty" name="specialty" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-cyan-600 sm:text-sm sm:leading-6">
                        <option value="">All Specialties</option>
                        <option value="general">General Practitioner</option>
                        <option value="cardiology">Cardiologist</option>
                        <option value="dermatology">Dermatologist</option>
                        <option value="pediatrics">Pediatrician</option>
                        <option value="neurology">Neurologist</option>
                        <option value="psychiatry">Psychiatrist</option>
                        <option value="orthopedics">Orthopedic Surgeon</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Price Range Filter -->
            <div class="flex-1">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                <div class="relative">
                    <select id="price" name="price" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-cyan-600 sm:text-sm sm:leading-6">
                        <option value="">Any Price</option>
                        <option value="0-50">$0 - $50</option>
                        <option value="51-100">$51 - $100</option>
                        <option value="101-150">$101 - $150</option>
                        <option value="151-200">$151 - $200</option>
                        <option value="201+">$201+</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Apply Filters Button -->
            <div class="flex items-end">
                <button type="button" class="w-full sm:w-auto px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    Apply Filters
                </button>
            </div>
        </div>

        <!-- Active Filters -->
        <div class="mt-4 flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-x-0.5 rounded-md bg-cyan-50 px-2 py-1 text-xs font-medium text-cyan-700 ring-1 ring-inset ring-cyan-600/20">
                Cardiologist
                <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-cyan-600/20">
                    <span class="sr-only">Remove</span>
                    <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-cyan-700/50 group-hover:stroke-cyan-700/75">
                        <path d="M4 4l6 6m0-6l-6 6" />
                    </svg>
                </button>
            </span>
            <span class="inline-flex items-center gap-x-0.5 rounded-md bg-cyan-50 px-2 py-1 text-xs font-medium text-cyan-700 ring-1 ring-inset ring-cyan-600/20">
                $51 - $100
                <button type="button" class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-cyan-600/20">
                    <span class="sr-only">Remove</span>
                    <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-cyan-700/50 group-hover:stroke-cyan-700/75">
                        <path d="M4 4l6 6m0-6l-6 6" />
                    </svg>
                </button>
            </span>
        </div>
    </div>

    <!-- Doctors grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($doctors as $doctor)
        <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($doctor->first_name . ' ' . $doctor->last_name) }}&background=0D9488&color=fff" alt="{{ $doctor->first_name }} {{ $doctor->last_name }}">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $doctor->first_name }} {{ $doctor->last_name }}</p>
                        <p class="text-sm text-gray-500 truncate">{{ $doctor->doctor->specialty }}</p>
                    </div>
                </div>
            </div>
            <div class="px-4 py-4 sm:px-6">
                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" />
                        <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                    </svg>
                    {{ $doctor->doctor->years_experience }} yrs of exp.
                </div>
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                    </svg>
                    +5 Appointments
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-900 font-medium">
                        ${{ $doctor->doctor->consultation_price }} <span class="text-gray-500">/ 30min</span>
                    </div>
                    <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        Request Appointment
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
