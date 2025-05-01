@extends('layouts.patient')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Doctor Info -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center space-x-6">
                <img class="h-24 w-24 rounded-full object-cover"
                     src="{{ asset($doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                     alt="Dr. {{ $doctor->user->first_name }}">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</h2>
                    <p class="text-xl text-gray-600 mt-2">{{ $doctor->specialty }}</p>
                </div>
            </div>
        </div>

        <!-- Previous Appointment Info -->
        <div class="bg-white rounded-xl shadow-sm p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Previous Appointment Details</h3>

            <div class="space-y-6">
                <div class="flex justify-between items-center">
                    <span class="text-xl text-gray-600">Date</span>
                    <span class="text-xl font-semibold">{{ $lastAppointmentInfo['date'] }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-xl text-gray-600">Time</span>
                    <span class="text-xl font-semibold">{{ $lastAppointmentInfo['time'] }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-xl text-gray-600">Duration</span>
                    <span class="text-xl font-semibold">{{ $lastAppointmentInfo['duration'] }} minutes</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-xl text-gray-600">Status</span>
                    <span class="text-xl font-semibold {{ $lastAppointmentInfo['status'] === 'confirmed' ? 'text-green-600' : 'text-yellow-600' }}">
                        {{ $lastAppointmentInfo['status'] }}
                    </span>
                </div>
            </div>

            <!-- Book Follow-up Button -->
            <div class="mt-8">
                <button type="button" class="w-full bg-cyan-600 text-white py-4 px-6 rounded-xl text-xl font-semibold hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    Book Follow-up Appointment
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
