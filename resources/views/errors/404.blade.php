<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found - {{ config('app.name', 'WeCare') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        .floating-animation-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .gradient-text {
            background: linear-gradient(135deg, #06b6d4, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50 flex items-center justify-center relative overflow-hidden">

        <!-- Background Elements -->
        <div class="absolute inset-0">
            <!-- Floating circles -->
            <div class="absolute top-20 left-20 w-32 h-32 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full opacity-20 floating-animation"></div>
            <div class="absolute top-40 right-32 w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full opacity-30 floating-animation-delayed"></div>
            <div class="absolute bottom-32 left-1/4 w-16 h-16 bg-gradient-to-r from-cyan-300 to-teal-400 rounded-full opacity-25 floating-animation"></div>
            <div class="absolute bottom-20 right-20 w-24 h-24 bg-gradient-to-r from-blue-300 to-cyan-400 rounded-full opacity-20 floating-animation-delayed"></div>

            <!-- Medical icons -->
            <div class="absolute top-16 right-16 text-cyan-200 text-4xl floating-animation">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="absolute bottom-16 left-16 text-blue-200 text-3xl floating-animation-delayed">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div class="absolute top-1/2 left-8 text-cyan-200 text-2xl floating-animation">
                <i class="fas fa-user-md"></i>
            </div>
        </div>

        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <!-- 404 Number -->
            <div class="mb-8">
                <h1 class="text-8xl md:text-9xl font-extrabold gradient-text mb-4">
                    404
                </h1>
                <div class="flex justify-center items-center space-x-4 mb-6">
                    <div class="h-px bg-gradient-to-r from-transparent via-cyan-400 to-transparent flex-1"></div>
                    <i class="fas fa-hospital-alt text-3xl text-cyan-500 pulse-slow"></i>
                    <div class="h-px bg-gradient-to-r from-transparent via-cyan-400 to-transparent flex-1"></div>
                </div>
            </div>

            <!-- Main Message -->
            <div class="mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Oops! Page introuvable
                </h2>
                <p class="text-lg md:text-xl text-gray-600 mb-6 leading-relaxed">
                    La page que vous recherchez semble avoir disparu.
                    <br class="hidden md:block">
                    Peut-être a-t-elle été déplacée ou supprimée ?
                </p>

                <!-- Glass card with suggestions -->
                <div class="glass-effect rounded-2xl p-6 mb-8 max-w-2xl mx-auto">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center justify-center">
                        <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                        Que pouvez-vous faire ?
                    </h3>
                    <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-700">
                        <div class="flex items-center">
                            <i class="fas fa-home text-cyan-500 mr-2"></i>
                            Retourner à l'accueil
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-search text-cyan-500 mr-2"></i>
                            Rechercher un médecin
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-user-plus text-cyan-500 mr-2"></i>
                            Créer un compte
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-cyan-500 mr-2"></i>
                            Nous contacter
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ url('/') }}"
                   class="px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold rounded-xl
                          hover:from-cyan-600 hover:to-blue-700 transform hover:scale-105 transition-all duration-300
                          shadow-lg hover:shadow-xl flex items-center space-x-2">
                    <i class="fas fa-home"></i>
                    <span>Retour à l'accueil</span>
                </a>

                <button onclick="history.back()"
                        class="px-8 py-4 bg-white text-gray-700 font-semibold rounded-xl border-2 border-gray-200
                               hover:bg-gray-50 hover:border-gray-300 transform hover:scale-105 transition-all duration-300
                               shadow-lg hover:shadow-xl flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Page précédente</span>
                </button>
            </div>

            <!-- Additional Links -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-wrap justify-center gap-6 text-sm">
                    <a href="{{ url('/') }}" class="text-cyan-600 hover:text-cyan-700 transition-colors">
                        <i class="fas fa-home mr-1"></i>Accueil
                    </a>
                    <a href="{{ url('/about') }}" class="text-cyan-600 hover:text-cyan-700 transition-colors">
                        <i class="fas fa-info-circle mr-1"></i>À propos
                    </a>
                    <a href="{{ url('/contact') }}" class="text-cyan-600 hover:text-cyan-700 transition-colors">
                        <i class="fas fa-envelope mr-1"></i>Contact
                    </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-cyan-600 hover:text-cyan-700 transition-colors">
                            <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-cyan-600 hover:text-cyan-700 transition-colors">
                            <i class="fas fa-sign-in-alt mr-1"></i>Connexion
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- WeCare Logo/Brand -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <div class="flex items-center space-x-2 text-gray-400">
                <i class="fas fa-heartbeat text-cyan-500"></i>
                <span class="font-bold text-lg">
                    <span class="text-gray-600">W</span><span class="text-cyan-500">e</span>
                    <span class="text-gray-600">Car</span><span class="text-cyan-500">e</span>
                </span>
            </div>
        </div>
    </div>
</body>
</html>
