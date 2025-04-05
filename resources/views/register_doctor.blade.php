<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration - WeCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col md:flex-row ">
        <div class="w-full md:w-1/2 p-6 md:p-12 flex flex-col">
            <!-- Logo -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold inline-block">
                    <span class="text-gray-800">W</span><span class="text-cyan-500">e</span>
                    <span class="text-gray-800">Car</span><span class="text-cyan-500">e</span>
                </h1>
            </div>

            <!-- Form Container -->
            <div class="max-w-md w-full mx-auto">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Create your Account</h2>
                    <p class="text-gray-600 text-sm">
                        Already using WeCare?
                        <a href="/login" class="text-cyan-500 hover:text-cyan-600">Login</a>
                    </p>
                </div>

                <!-- Registration Form -->
                <form action="{{ route('register.doctor.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="bg-red-50 text-red-500 p-4 rounded-md mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                                placeholder="e.g John" required>
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                                placeholder="e.g Doe" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="doctor@example.com" required>
                    </div>

                    <!-- Specialty -->
                    <div>
                        <label for="specialty" class="block text-sm font-medium text-gray-700 mb-1">Specialty</label>
                        <input type="text" id="specialty" name="specialty" value="{{ old('specialty') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="e.g Cardiology" required>
                    </div>

                    <!-- License Number -->
                    <div>
                        <label for="license_number" class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                        <input type="text" id="license_number" name="license_number" value="{{ old('license_number') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="e.g MD123456" required>
                    </div>

                    <!-- Consultation Price -->
                    <div>
                        <label for="consultation_price" class="block text-sm font-medium text-gray-700 mb-1">Consultation Price ($)</label>
                        <input type="number" id="consultation_price" name="consultation_price" value="{{ old('consultation_price') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="e.g 100" min="0" step="0.01" required>
                    </div>

                    <!-- Years of Experience -->
                    <div>
                        <label for="years_experience" class="block text-sm font-medium text-gray-700 mb-1">Years of Experience</label>
                        <input type="number" id="years_experience" name="years_experience" value="{{ old('years_experience') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="e.g 5" min="0" required>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="••••••••" required>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="••••••••" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-cyan-500 text-white py-2 px-4 rounded-md hover:bg-cyan-600 transition duration-300">
                        Create an account
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="hidden md:block md:w-1/2 bg-gray-100 m-20">
            <img src="{{ asset('img/register.svg') }}"
                alt="Doctor using tablet"
                class="w-full h-full object-cover">
        </div>
    </div>
</body>
</html>
