@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-white min-h-screen">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-2xl font-semibold mb-6 sm:mb-8">Settings</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
        <!-- Left Column -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- Profile Picture Section -->
            <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-gray-50 rounded-lg p-4 sm:p-6">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium mb-4">Profile picture</h2>
                <div class="flex flex-col sm:flex-row items-center sm:items-end gap-4">
                    <div class="w-32 h-32 sm:w-24 sm:h-24 rounded-lg overflow-hidden bg-gray-200">
                        <img
                            src="{{ asset($doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                            alt="Profile picture"
                            class="w-full h-full object-cover"
                            id="profile-preview"
                        >
                    </div>
                    <div class="flex gap-2">
                        <input type="file" name="profile_photo" id="profile_photo" class="hidden" accept="image/*" onchange="previewImage(this)">
                        <label for="profile_photo" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium cursor-pointer">
                            Upload picture
                        </label>
                        <button type="submit" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded hover:bg-gray-50 text-sm font-medium">
                            Save
                        </button>
                        <button type="submit" name="action" value="delete_photo" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm font-medium">
                            Delete
                        </button>
                    </div>
                </div>
            </form>

            <!-- Social Accounts Section -->
            <form action="{{ route('doctor.profile.update') }}" method="POST" class="bg-gray-50 rounded-lg p-4 sm:p-6">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium mb-4 sm:mb-6">Social accounts</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Facebook</label>
                        <input
                            type="url"
                            name="facebook"
                            placeholder="https://facebook.com/username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('facebook', $doctor->facebook) }}"
                        >
                        @error('facebook')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">LinkedIn</label>
                        <input
                            type="url"
                            name="linkedin"
                            placeholder="https://linkedin.com/in/username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('linkedin', $doctor->linkedin) }}"
                        >
                        @error('linkedin')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Instagram</label>
                        <input
                            type="url"
                            name="instagram"
                            placeholder="https://instagram.com/username"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('instagram', $doctor->instagram) }}"
                        >
                        @error('instagram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                        Save all
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column -->
        <div class="space-y-4 sm:space-y-6 lg:space-y-8">
            <!-- General Information Section -->
            <form action="{{ route('doctor.profile.update') }}" method="POST" class="bg-gray-50 rounded-lg p-4 sm:p-6">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium mb-4 sm:mb-6">General information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">First Name</label>
                        <input
                            type="text"
                            name="first_name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('first_name', $doctor->user->first_name) }}"
                            required
                        >
                        @error('first_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Last Name</label>
                        <input
                            type="text"
                            name="last_name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('last_name', $doctor->user->last_name) }}"
                            required
                        >
                        @error('last_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('email', $doctor->user->email) }}"
                            required
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Phone Number</label>
                        <input
                            type="tel"
                            name="phone_number"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('phone_number', $doctor->phone_number) }}"
                        >
                        @error('phone_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">City</label>
                        <input
                            type="text"
                            name="city"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            value="{{ old('city', $doctor->city) }}"
                            placeholder="Enter your city"
                        >
                        @error('city')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Bio</label>
                        <textarea
                            name="bio"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 h-20 resize-none"
                        >{{ old('bio', $doctor->bio) }}</textarea>
                        @error('bio')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                        Save
                    </button>
                </div>
            </form>

            <!-- Update Password Section -->
            <form action="{{ route('doctor.password.update') }}" method="POST" class="bg-gray-50 rounded-lg p-4 sm:p-6">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium mb-4 sm:mb-6">Update password</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Current Password</label>
                        <input
                            type="password"
                            name="current_password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            required
                        >
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">New Password</label>
                        <input
                            type="password"
                            name="new_password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            required
                            minlength="8"
                        >
                        @error('new_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                        <input
                            type="password"
                            name="new_password_confirmation"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            required
                            minlength="8"
                        >
                    </div>
                    <div class="sm:col-span-2 flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-medium">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
