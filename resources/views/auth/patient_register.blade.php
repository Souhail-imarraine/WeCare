<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration - WeCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Side - Form -->
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
                <form action="/patient-register" method="POST" class="space-y-6">
                    @csrf
                    <!-- Name Fields Row -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                                placeholder="e.g John">
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                                placeholder="e.g Doe">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="e.g jhondo@gmail.com">
                    </div>

                    <!-- First Name -->
                    <div>
                        <label for="display_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" id="display_name" name="display_name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="e.g Bonnie">
                    </div>

                    <!-- Gender Selection -->
                    <div class="grid grid-cols-2 gap-4">
                        <button type="button"
                            class="flex items-center justify-center px-4 py-2 border rounded-md hover:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500 bg-white"
                            onclick="setGender('male')">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            Male
                        </button>
                        <button type="button"
                            class="flex items-center justify-center px-4 py-2 border rounded-md hover:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500 bg-white"
                            onclick="setGender('female')">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            Female
                        </button>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="••••••••">
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500"
                            placeholder="••••••••">
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
                alt="Medical illustration"
                class="w-full h-full object-cover">
        </div>
    </div>

    <script>
        function setGender(gender) {
            // Set the radio button
            document.querySelector(`input[value="${gender}"]`).checked = true;

            // Update button styles
            const buttons = document.querySelectorAll('[onclick^="setGender"]');
            buttons.forEach(button => {
                button.classList.remove('border-cyan-500');
            });

            // Add active style to selected button
            event.currentTarget.classList.add('border-cyan-500');
        }
    </script>
</body>
</html>
