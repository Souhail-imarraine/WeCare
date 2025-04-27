@extends('layouts.patient')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Doctor Info Card -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-6">
            <div class="bg-white border-b border-gray-100 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            <img class="h-24 w-24 rounded-xl object-cover shadow-md"
                                 src="{{ asset($doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                                 alt="Dr. {{ $doctor->user->first_name }}">
                            <div class="absolute -bottom-2 -right-2 bg-green-500 rounded-full p-1.5">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-3">
                                <h1 class="text-2xl font-bold text-gray-900">Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</h1>
                                <span class="px-3 py-1 text-sm font-medium text-cyan-700 bg-cyan-50 rounded-full">Available</span>
                            </div>
                            <p class="text-lg text-gray-600 mt-1">{{ $doctor->specialty }}</p>
                            <div class="flex items-center mt-3 space-x-4">
                                <div class="flex items-center text-gray-500">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $doctor->city }}
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Available Today
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="bg-white shadow-sm border border-gray-100 rounded-xl px-6 py-4">
                            <p class="text-sm text-gray-500 mb-1">Consultation Fee</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($doctor->consultation_price, 2) }} DH</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Tracker -->
            <div class="px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Follow-up Progress</h2>
                <div class="relative">
                    <!-- Progress Line -->
                    <div class="absolute inset-0 flex items-center">
                        <div class="h-0.5 w-full bg-gray-200"></div>
                    </div>
                    <!-- Steps -->
                    <div class="relative flex justify-between">
                        <!-- Doctor Confirmation -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-cyan-600 flex items-center justify-center relative z-10 ring-4 ring-white">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="mt-3 text-sm font-medium text-cyan-600">Doctor Confirmation</span>
                            <span class="mt-1 text-xs text-gray-500">In Progress</span>
                        </div>

                        <!-- Visit Appointment -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-white border-2 border-gray-200 flex items-center justify-center relative z-10">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="mt-3 text-sm font-medium text-gray-500">Visit Appointment</span>
                            <span class="mt-1 text-xs text-gray-500">Pending</span>
                        </div>

                        <!-- Completed -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-white border-2 border-gray-200 flex items-center justify-center relative z-10">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="mt-3 text-sm font-medium text-gray-500">Completed</span>
                            <span class="mt-1 text-xs text-gray-500">Upcoming</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Previous Appointment Details -->
            <div class="bg-gray-50 px-8 py-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Previous Appointment Details</h3>
                    <span class="px-3 py-1 text-sm font-medium text-green-700 bg-green-50 rounded-full">Completed</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-cyan-50 rounded-lg">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($lastAppointment->date_appointment)->format('l, F j, Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-cyan-50 rounded-lg">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Time</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($lastAppointment->time_appointment)->format('g:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
