@extends('layouts.patient')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-white min-h-screen">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
        <!-- Left Column - Personal Information -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <form action="{{ route('patient.profile.update') }}" method="POST" class="bg-gray-50 rounded-lg p-4 sm:p-6">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">First Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('first_name', $patient->user->first_name) }}"
                            name="first_name"
                            required
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Last Name</label>
                        <input
                            type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('last_name', $patient->user->last_name) }}"
                            name="last_name"
                            required
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input
                            type="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('email', $patient->user->email) }}"
                            name="email"
                            required
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Phone Number</label>
                        <input
                            type="tel"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('phone_number', $patient->phone_number) }}"
                            name="phone_number"
                        >
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Blood Type</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500" name="blood_type" required>
                            <option value="">Select Blood Type</option>
                            <option value="A+" {{ old('blood_type', $patient->blood_type) === 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('blood_type', $patient->blood_type) === 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('blood_type', $patient->blood_type) === 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('blood_type', $patient->blood_type) === 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('blood_type', $patient->blood_type) === 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('blood_type', $patient->blood_type) === 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ old('blood_type', $patient->blood_type) === 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('blood_type', $patient->blood_type) === 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Birthday</label>
                        <input
                            type="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('birthday', $patient->birthday ? $patient->birthday->format('Y-m-d') : '') }}"
                            name="birthday"
                            max="{{ date('Y-m-d') }}"
                            required
                            placeholder="YYYY-MM-DD"
                        >
                        @error('birthday')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Height (cm)</label>
                        <input
                            type="number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('height', $patient->height) }}"
                            name="height"
                            required
                            min="1"
                            max="300"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Weight (kg)</label>
                        <input
                            type="number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('weight', $patient->weight) }}"
                            name="weight"
                            required
                            min="1"
                            max="500"
                        >
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 text-sm font-medium">
                        Save Information
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column - Update Password -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <form action="{{ route('patient.password.update') }}" method="POST" class="bg-gray-50 rounded-lg p-4 sm:p-6">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium mb-4">Update Password</h2>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Current Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            name="current_password"
                            required
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">New Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            name="new_password"
                            required
                            minlength="8"
                        >
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                        <input
                            type="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            name="new_password_confirmation"
                            required
                            minlength="8"
                        >
                    </div>
                    <div class="flex justify-end mt-2">
                        <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 text-sm font-medium">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
