@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-white min-h-screen">
    <h1 class="text-2xl font-semibold mb-6 sm:mb-8">Settings</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
        <!-- Left Column -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- Profile Picture Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4">Profile picture</h2>
                <div class="flex flex-col sm:flex-row items-center sm:items-end gap-4">
                    <div class="w-32 h-32 sm:w-24 sm:h-24 rounded-lg overflow-hidden bg-gray-200">
                        <img
                            src="{{ asset($doctor->profile_photo ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuNhTZJTtkR6b-ADMhmzPvVwaLuLdz273wvQ&s') }}"
                            alt="Profile picture"
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <div class="flex gap-2">
                        <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                            Upload picture
                        </button>
                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded hover:bg-gray-50 text-sm font-medium">
                            Save
                        </button>
                    </div>
                </div>
            </div>

            <!-- Social Accounts Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4 sm:mb-6">Social accounts</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Facebook</label>
                        <input
                            type="text"
                            placeholder="facebook.com/username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->facebook_url ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">LinkedIn</label>
                        <input
                            type="text"
                            placeholder="linkedin.com/username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->linkedin_url ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Instagram</label>
                        <input
                            type="text"
                            placeholder="instagram.com/username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->instagram_url ?? '' }}"
                        >
                    </div>
                    <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                        Save all
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- General Information Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4 sm:mb-6">General information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">First Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->first_name ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Last Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->last_name ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input
                            type="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->email ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Phone Number</label>
                        <input
                            type="tel"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->phone ?? '' }}"
                        >
                    </div>

                    <div class="flex gap-4 items-center col-span-2">
                        <div class="flex-1">
                            <label class="block text-sm text-gray-600 mb-1">Gender</label>
                            <div class="flex gap-4">
                                <label class="flex items-center">
                                    <input type="radio" name="gender" value="male" class="mr-2 text-cyan-500 focus:ring-cyan-500" {{ $doctor->gender === 'male' ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-600">Male</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="gender" value="female" class="mr-2 text-cyan-500 focus:ring-cyan-500" {{ $doctor->gender === 'female' ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-600">Female</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Blood Type</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->blood_type ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Birthday</label>
                        <input
                            type="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->birthday ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Height (cm)</label>
                        <input
                            type="number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->height ?? '' }}"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Weight (kg)</label>
                        <input
                            type="number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ $doctor->weight ?? '' }}"
                        >
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Allergies</label>
                        <textarea
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 h-20 resize-none"
                        >{{ $doctor->allergies ?? '' }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Bio</label>
                        <textarea
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 h-20 resize-none"
                        >{{ $doctor->bio ?? '' }}</textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="button" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                        Save
                    </button>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                <h2 class="text-lg font-medium mb-4 sm:mb-6">Update password</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Current Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">New Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
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
