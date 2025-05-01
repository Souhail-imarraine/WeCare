@extends('layouts.patient')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">My Profile</h1>
                        <p class="mt-1 text-sm text-gray-500">View and manage your personal and medical information</p>
                    </div>
                    <a href="{{ route('patient.settings') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Profile Card -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                <div class="w-32 h-32 rounded-full overflow-hidden ring-4 ring-cyan-100">
                                    <img src="{{ asset($patient->profile_photo ?? 'images/default-avatar.png') }}"
                                         alt="{{ Auth::user()->first_name }}'s Profile Picture"
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="absolute bottom-0 right-0 bg-cyan-500 rounded-full p-1.5">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <h2 class="mt-4 text-xl font-semibold text-gray-900">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                            <p class="text-sm text-gray-500">Gender: {{ $patient->gender ?? 'N/A' }}</p>
                            <div class="mt-4 flex items-center space-x-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    {{$patient->status}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information Card -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Personal Information</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Email Address</label>
                                <p class="text-sm text-gray-900">{{ Auth::user()->email }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Phone Number</label>
                                <p class="text-sm text-gray-900">{{ $patient->phone_number ?? 'Not provided' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Date of Birth</label>
                                <p class="text-sm text-gray-900">{{ $patient->birthday ? date('F j, Y', strtotime($patient->birthday)) : 'Not provided' }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Gender</label>
                                <p class="text-sm text-gray-900">{{ ucfirst($patient->gender ?? 'Not provided') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Medical Information Card -->
                <div class="mt-6 bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Medical Information</h3>
                        <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
                            <div class="bg-cyan-50 p-4 rounded-lg">
                                <label class="block text-xs font-medium text-cyan-600 mb-1">Blood Type</label>
                                <p class="text-sm font-medium text-gray-900">{{ $patient->blood_type ?? 'Not provided' }}</p>
                            </div>
                            <div class="bg-cyan-50 p-4 rounded-lg">
                                <label class="block text-xs font-medium text-cyan-600 mb-1">Height</label>
                                <p class="text-sm font-medium text-gray-900">{{ $patient->height ? $patient->height . ' cm' : 'Not provided' }}</p>
                            </div>
                            <div class="bg-cyan-50 p-4 rounded-lg">
                                <label class="block text-xs font-medium text-cyan-600 mb-1">Weight</label>
                                <p class="text-sm font-medium text-gray-900">{{ $patient->weight ? $patient->weight . ' kg' : 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
