@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-sm">
        <div class="flex justify-center mb-6">
            <svg class="w-12 h-12 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
        </div>
        <h1 class="text-xl font-semibold text-gray-800 text-center mb-2">Déconnexion en cours...</h1>
        <p class="text-sm text-gray-600 text-center">Vous allez être redirigé vers la page de connexion.</p>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('login') }}";
    }, 2000);
</script>
@endsection
