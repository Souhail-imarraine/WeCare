@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-semibold text-gray-900">Appointment Requests</h1>
                        <span class="ml-3 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-cyan-50 text-cyan-700">
                            3 Pending
                        </span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-700 mr-3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <div class="h-10 w-10 rounded-full ring-4 ring-gray-50 overflow-hidden">
                            <img
                                class="h-full w-full object-cover"
                                src="{{ asset(Auth::user()->doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                                alt="{{ Auth::user()->first_name }}'s Avatar">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requests Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Request 1: Urgent Case -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-800">
                            <svg class="mr-1 h-1.5 w-1.5 text-red-600" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            Urgent
                        </span>
                    </div>
                    <time class="text-xs text-gray-500">5 minutes ago</time>
                </div>

                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div class="relative">
                            <div class="h-10 w-10 rounded-full ring-2 ring-gray-50 overflow-hidden">
                                <img src="{{ asset('patient_profile/default-avatar.png') }}" alt="Sarah Johnson" class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="ml-3 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Sarah Johnson</p>
                            <p class="text-xs text-gray-500">Female, 32 years</p>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-xs text-gray-600">Today, 2:00 PM</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs text-gray-600">30 minutes</span>
                        </div>
                    </div>

                    <div class="mb-4 bg-red-50 rounded px-3 py-2 text-xs text-red-800">
                        <p class="line-clamp-2">Severe migraine with visual disturbances. Previous history of similar episodes.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <button class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept
                        </button>
                        <button class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Decline
                        </button>
                    </div>
                </div>
            </div>

            <!-- Request 2: Regular Checkup -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-50 text-yellow-800">
                            <svg class="mr-1 h-1.5 w-1.5 text-yellow-600" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            Pending
                        </span>
                    </div>
                    <time class="text-xs text-gray-500">1 hour ago</time>
                </div>

                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div class="relative">
                            <div class="h-10 w-10 rounded-full ring-2 ring-gray-50 overflow-hidden">
                                <img src="{{ asset('patient_profile/default-avatar.png') }}" alt="Michael Chen" class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="ml-3 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Michael Chen</p>
                            <p class="text-xs text-gray-500">Male, 45 years</p>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-xs text-gray-600">Tomorrow, 10:00 AM</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs text-gray-600">45 minutes</span>
                        </div>
                    </div>

                    <div class="mb-4 bg-yellow-50 rounded px-3 py-2 text-xs text-yellow-800">
                        <p class="line-clamp-2">Regular checkup and blood pressure monitoring. Last visit was 6 months ago.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <button class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept
                        </button>
                        <button class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Decline
                        </button>
                    </div>
                </div>
            </div>

            <!-- Request 3: Follow-up -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-800">
                            <svg class="mr-1 h-1.5 w-1.5 text-green-600" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            Follow-up
                        </span>
                    </div>
                    <time class="text-xs text-gray-500">2 hours ago</time>
                </div>

                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <div class="relative">
                            <div class="h-10 w-10 rounded-full ring-2 ring-gray-50 overflow-hidden">
                                <img src="{{ asset('patient_profile/default-avatar.png') }}" alt="Emma Wilson" class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="ml-3 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">Emma Wilson</p>
                            <p class="text-xs text-gray-500">Female, 28 years</p>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-xs text-gray-600">Friday, 3:30 PM</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs text-gray-600">20 minutes</span>
                        </div>
                    </div>

                    <div class="mb-4 bg-green-50 rounded px-3 py-2 text-xs text-green-800">
                        <p class="line-clamp-2">Follow-up visit for medication adjustment. Previous visit showed good progress.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <button class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept
                        </button>
                        <button class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Decline
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
