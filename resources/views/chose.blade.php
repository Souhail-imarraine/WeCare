<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Role - WeCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold inline-block">
                <span class="text-gray-800">W</span><span class="text-cyan-500">e</span>
                <span class="text-gray-800">Car</span><span class="text-cyan-500">e</span>
            </h1>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl md:text-3xl text-center text-gray-800 mb-12">What brings you to We care?</h2>

            <!-- Role Selection Cards -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Doctor Button -->
                <button onclick="window.location.href='/doctor-signup'" class="group">
                    <div class="bg-white rounded-2xl p-8 text-center transition duration-300
                        hover:shadow-lg hover:scale-105 transform cursor-pointer border-2 border-transparent
                        hover:border-cyan-500 focus:outline-none focus:border-cyan-500">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('img/doctor.svg') }}" alt="Doctor"
                                class="w-32 h-32 object-contain transition-transform duration-300 group-hover:-rotate-6">
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-3">I'm a doctor</h2>
                        <p class="text-gray-600 mb-4">Stay informed about your patients' status anytime, anywhere.</p>
                    </div>
                </button>

                <!-- Patient Button -->
                <button onclick="window.location.href='/patient-signup'" class="group">
                    <div class="bg-white rounded-2xl p-8 text-center transition duration-300
                        hover:shadow-lg hover:scale-105 transform cursor-pointer border-2 border-transparent
                        hover:border-cyan-500 focus:outline-none focus:border-cyan-500">
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('img/patient.svg') }}" alt="Patient"
                                class="w-32 h-32 object-contain transition-transform duration-300 group-hover:-rotate-6">
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-3">I'm a patient</h2>
                        <p class="text-gray-600 mb-4">The most complete solution in your hands</p>
                    </div>
                </button>
            </div>

            <!-- Sign In Link -->
            <div class="text-center">
                <p class="text-gray-600">
                    Already using Contra?
                    <a href="/login" class="text-cyan-500 hover:text-cyan-600 font-medium">Sign in</a>
                </p>
            </div>

            <!-- Terms and Privacy -->
            <div class="text-center mt-8 text-sm text-gray-500">
                <p>
                    By continuing, you agree to Wecare
                    <a href="/terms" class="text-cyan-500 hover:text-cyan-600">Terms of Use</a>
                    and confirm that you have read Contra's
                    <a href="/privacy" class="text-cyan-500 hover:text-cyan-600">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
