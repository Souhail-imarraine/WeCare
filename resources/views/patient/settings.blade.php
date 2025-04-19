@extends('layouts.patient')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-white min-h-screen">
    <h1 class="text-2xl font-semibold mb-6 sm:mb-8">Patient Settings</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
        <!-- Left Column -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- Profile Picture Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4">Profile Picture</h2>
                <div class="flex flex-col sm:flex-row items-center sm:items-end gap-4">
                    <div class="w-32 h-32 sm:w-24 sm:h-24 rounded-lg overflow-hidden bg-gray-200">
                        <img
                            src="{{ $patient->profile_picture ?? asset('images/default-avatar.png') }}"
                            alt="Profile picture"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div class="flex gap-2">
                        <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                            Upload Picture
                        </button>
                    </div>
                </div>
            </div>

            <!-- Emergency Contact Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4">Emergency Contact</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Contact Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->emergency_contact_name ?? '' }}"
                            name="emergency_contact_name"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Contact Phone</label>
                        <input
                            type="tel"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->emergency_contact_phone ?? '' }}"
                            name="emergency_contact_phone"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Relationship</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->emergency_contact_relationship ?? '' }}"
                            name="emergency_contact_relationship"
                        >
                    </div>
                    <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                        Save Emergency Contact
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- Personal Information Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">First Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->first_name ?? '' }}"
                            name="first_name"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Last Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->last_name ?? '' }}"
                            name="last_name"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input
                            type="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->email ?? '' }}"
                            name="email"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Phone Number</label>
                        <input
                            type="tel"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->phone ?? '' }}"
                            name="phone"
                        >
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Blood Type</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500" name="blood_type">
                            <option value="">Select Blood Type</option>
                            <option value="A+" {{ $patient->blood_type === 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ $patient->blood_type === 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ $patient->blood_type === 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ $patient->blood_type === 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ $patient->blood_type === 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ $patient->blood_type === 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ $patient->blood_type === 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ $patient->blood_type === 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Birthday</label>
                        <input
                            type="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->birthday ?? '' }}"
                            name="birthday"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Height (cm)</label>
                        <input
                            type="number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->height ?? '' }}"
                            name="height"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Weight (kg)</label>
                        <input
                            type="number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $patient->weight ?? '' }}"
                            name="weight"
                        >
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Allergies</label>
                        <textarea
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 h-20 resize-none"
                            name="allergies"
                        >{{ $patient->allergies ?? '' }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Medical History</label>
                        <textarea
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 h-20 resize-none"
                            name="medical_history"
                        >{{ $patient->medical_history ?? '' }}</textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                        Save Information
                    </button>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4">Update Password</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Current Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            name="current_password"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">New Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            name="new_password"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            name="new_password_confirmation"
                        >
                    </div>
                    <div class="sm:col-span-2 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
