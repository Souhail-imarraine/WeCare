<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - WeCare</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .login-container {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.2);
        }
        .btn-login {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="login-container">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="login-card max-w-md w-full space-y-8 p-8 rounded-xl shadow-xl">
            <!-- Logo -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-cyan-600">
                    <span>W</span><span class="text-cyan-800">e</span>
                    <span>C</span><span class="text-cyan-800">are</span>
                </h1>
                <h2 class="mt-2 text-2xl font-semibold text-gray-700">
                    Admin Portal
                </h2>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form class="mt-8 space-y-6" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input id="email" name="email" type="email" required
                            class="input-field mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                            placeholder="Enter your email" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="input-field mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                            placeholder="Enter your password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="btn-login w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        Sign in to Dashboard
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
