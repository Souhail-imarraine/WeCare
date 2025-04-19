@extends('layouts.patient')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <h1 class="text-xl font-medium mb-6 lg:mb-8">My Profile</h1>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 sm:gap-6 mb-4 sm:mb-6">
        <!-- Left Column - Profile Info -->
        <div class="md:col-span-4 lg:col-span-4">
            <div class="bg-white rounded-lg p-6 lg:p-8">
                <div class="flex flex-col items-center">
                    <div class="w-32 h-32 sm:w-40 sm:h-40 lg:w-48 lg:h-48 rounded-full overflow-hidden bg-gray-100 mb-4">
                        <img src="{{ asset($patient->profile_photo ?? 'images/default-avatar.png') }}"
                             alt="{{ Auth::user()->first_name }}'s Profile Picture"
                             class="w-full h-full object-cover">
                    </div>
                    <h2 class="text-lg sm:text-xl font-semibold text-center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                    <p class="text-gray-500 text-sm mt-1">Patient ID: {{ $patient->id ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Right Column - Personal Information -->
        <div class="md:col-span-8 lg:col-span-8">
            <div class="bg-white rounded-lg p-6 lg:p-8">
                <h3 class="text-lg font-medium mb-6 lg:mb-8">Personal Information</h3>

                <!-- Basic Info -->
                <div class="mb-6 lg:mb-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Email</h4>
                            <p class="text-sm text-gray-900">{{ Auth::user()->email }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Phone</h4>
                            <p class="text-sm text-gray-900">{{ $patient->phone ?? 'Not provided' }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Date of Birth</h4>
                            <p class="text-sm text-gray-900">{{ $patient->birthday ? date('F j, Y', strtotime($patient->birthday)) : 'Not provided' }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Gender</h4>
                            <p class="text-sm text-gray-900">{{ ucfirst($patient->gender ?? 'Not provided') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Medical Info -->
                <div class="mb-6 lg:mb-8">
                    <h4 class="text-sm font-medium mb-4">Medical Information</h4>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Blood Type</p>
                            <p class="text-sm font-medium">{{ $patient->blood_type ?? 'Not provided' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Height</p>
                            <p class="text-sm font-medium">{{ $patient->height ? $patient->height . ' cm' : 'Not provided' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Weight</p>
                            <p class="text-sm font-medium">{{ $patient->weight ? $patient->weight . ' kg' : 'Not provided' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">BMI</p>
                            <p class="text-sm font-medium">{{ $patient->bmi ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div>
                    <h4 class="text-sm font-medium mb-4">Emergency Contact</h4>
                    @if($patient->emergency_contact_name)
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Name</p>
                                <p class="text-sm text-gray-900">{{ $patient->emergency_contact_name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Phone</p>
                                <p class="text-sm text-gray-900">{{ $patient->emergency_contact_phone }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Relationship</p>
                                <p class="text-sm text-gray-900">{{ $patient->emergency_contact_relationship }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">No emergency contact information provided</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Medical History -->
    <div class="bg-white rounded-lg p-6 lg:p-8">
        <h3 class="text-lg font-medium mb-6">Medical History</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="text-sm font-medium text-gray-500 mb-2">Allergies</h4>
                <p class="text-sm text-gray-900">{{ $patient->allergies ?? 'None reported' }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="text-sm font-medium text-gray-500 mb-2">Chronic Conditions</h4>
                <p class="text-sm text-gray-900">{{ $patient->chronic_conditions ?? 'None reported' }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="text-sm font-medium text-gray-500 mb-2">Current Medications</h4>
                <p class="text-sm text-gray-900">{{ $patient->current_medications ?? 'None reported' }}</p>
            </div>
        </div>
    </div>

    <!-- Edit Profile Button -->
    <div class="mt-6 text-center">
        <a href="{{ route('patient.settings') }}"
           class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Profile
        </a>
    </div>
</div>
@endsection
