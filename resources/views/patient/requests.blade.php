@extends('layouts.app')

@section('content')
    <!-- Top Bar -->
    <header class="bg-white shadow-sm mb-8 rounded-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Page Title & Count -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-semibold text-gray-800">Requests</h1>
                    <span class="ml-3 bg-gray-200 text-gray-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $requests->count() }}</span>
                </div>

                <!-- User Avatar and Name -->
                <div class="flex items-center">
                     <div class="ml-3 relative">
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 mr-2">{{ Auth::user()->first_name ?? 'Doctor' }} {{ Auth::user()->last_name ?? '' }}</span>
                            <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User Avatar">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Requests Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- @forelse ($requests as $request) --}}
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 flex flex-col justify-between">
                <div>
                    <!-- Request Date -->
                    <p class="text-sm text-gray-500 mb-1">{{--  --}}</p>

                    <!-- Appointment Type -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Online Appointment</h3>

                    <!-- Patient Info -->
                    <div class="flex items-center mb-3">
                        <img class="h-6 w-6 rounded-full object-cover mr-2"
                             src="{{--  --}}"
                             alt="Patient Avatar">
                        <span class="text-sm font-medium text-gray-700">{{--  --}} {{--  --}}</span>
                    </div>

                    <!-- Description/Reason (Optional - from image) -->
                    <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                        {{--  --}}
                    </p>

                    <!-- Consultation Duration -->
                    <div class="flex items-center text-sm text-gray-600 mb-2">
                        <svg class="w-4 h-4 mr-2 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Consult Duration: <span class="font-medium text-gray-800 ml-1">{{--  --}}</span>
                    </div>

                    <!-- Preferred Time Range -->
                    <div class="flex items-center text-sm text-gray-600 mb-4">
                         <svg class="w-4 h-4 mr-2 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Preferred Time Range: <span class="font-medium text-gray-800 ml-1">{{--  --}}</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                    <form action="{{-- route('doctor.requests.accept', $request) --}}" method="POST" class="flex-1 mr-2">
                        @csrf
                        @method('PATCH') {{-- Or POST depending on your route --}}
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-cyan-700 bg-cyan-100 hover:bg-cyan-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition duration-150 ease-in-out">
                             <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            Accept
                        </button>
                    </form>
                    <form action="{{-- route('doctor.requests.reject', $request) --}}" method="POST" class="flex-1 ml-2">
                        @csrf
                        @method('PATCH') {{-- Or DELETE/POST --}}
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                             <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            Reject
                        </button>
                    </form>
                </div>
            </div>
        {{-- @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white p-6 rounded-lg shadow-md border border-gray-200 text-center text-gray-500">
                No pending requests found.
            </div>
        @endforelse --}}

    </div>
@endsection
