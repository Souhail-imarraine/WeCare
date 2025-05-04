<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WeCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight">
                        <span class="text-gray-900">W</span><span class="text-cyan-600">e</span>
                        <span class="text-gray-900">Car</span><span class="text-cyan-600">e</span>
                    </h1>
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">Welcome Back</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('chose') }}" class="font-medium text-cyan-600 hover:text-cyan-500">
                            Register
                        </a>
                    </p>
                </div>

                @if(session('error'))
                    <div class="rounded-md bg-red-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="rounded-md bg-green-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1.5">I am a</label>
                        <select id="role" name="role" required
                            class="mt-1 block w-full h-11 px-4 rounded-lg border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 text-base @error('role') border-red-300 @enderror">
                            <option value="">Select your role</option>
                            <option value="doctor" @if(old('role') == 'doctor') selected @endif>Doctor</option>
                            <option value="patient" @if(old('role') == 'patient') selected @endif>Patient</option>
                        </select>
                        @error('role')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full h-11 px-4 rounded-lg border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 text-base @error('email') border-red-300 @enderror"
                            placeholder="e.g john@example.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <input type="password" id="password" name="password" required
                            class="mt-1 block w-full h-11 px-4 rounded-lg border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 text-base @error('password') border-red-300 @enderror"
                            placeholder="••••••••">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="h-5 w-5 rounded border-gray-300 text-cyan-600 focus:ring-cyan-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-lg border border-transparent bg-cyan-600 py-3 px-4 text-base font-medium text-white hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-200">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-cyan-500 group-hover:text-cyan-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('img/register.svg') }}" alt="Medical illustration">
        </div>
    </div>
</body>
</html>
