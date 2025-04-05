<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WeCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col md:flex-row m-5">
        <!-- Left Side - Form -->
        <div class="w-full md:w-1/2 p-6 md:p-12 flex flex-col justify-center">
            <!-- Logo -->
            <div class="mb-12">
                <h1 class="text-2xl font-bold flex items-center space-x-0">
                    <span class="text-gray-800">W</span>
                    <span class="text-cyan-500">e</span>
                    <span class="text-gray-800 ml-1">Car</span>
                    <span class="text-cyan-500">e</span>
                </h1>
            </div>

            <!-- Form Container -->
            <div class="max-w-md w-full mx-auto">
                <div class="mb-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Login to your account</h2>
                    <p class="text-gray-600 text-sm">
                        Don't have account?
                        <a href="/register" class="text-cyan-500 hover:text-cyan-600">Sign up</a>
                    </p>
                </div>

                <!-- Login Form -->
                <form action="/login" method="POST" class="space-y-6">
                    @csrf
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email"
                            id="email"
                            name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500"
                            placeholder="••••••••••">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password"
                            id="password"
                            name="password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500"
                            placeholder="••••••••">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-cyan-500 text-white py-2 px-4 rounded-md hover:bg-cyan-600 transition duration-300">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="hidden md:block md:w-1/2 bg-white m-5">
            <img src="{{ asset('img/register.svg') }}"
                alt="Login illustration"
                class="w-full h-full object-cover"
                style="max-height: 100vh;">
        </div>
    </div>
</body>
</html>
