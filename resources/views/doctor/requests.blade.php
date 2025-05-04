@extends('layouts.app')

@section('content')
    <div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-semibold text-gray-900">Appointment Requests</h1>
                            <span
                                class="ml-3 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-cyan-50 text-cyan-700">
                                {{ $requests->count() }} Pending
                            </span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 mr-3">{{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}</span>
                            <div class="h-10 w-10 rounded-full ring-4 ring-gray-50 overflow-hidden">
                                <img class="h-full w-full object-cover"
                                    src="{{ asset(Auth::user()->doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                                    alt="{{ Auth::user()->first_name }}'s Avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <p class="font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($requests as $request)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                        <div class="border-b border-gray-100 bg-gray-50/50 px-4 py-3 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-50 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    Pending
                                </span>
                            </div>
                            <time class="text-xs text-gray-500">{{ $request->created_at->diffForHumans() }}</time>
                        </div>

                        <div class="p-4">
                            <div class="flex items-center mb-4">
                                <div class="ml-3 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $request->patientUser->first_name }} {{ $request->patientUser->last_name }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        @if($request->patientUser->patient)
                                            {{ ucfirst($request->patientUser->patient->gender ?? 'Not specified') }},
                                            {{ $request->patientUser->patient->birthday ? $request->patientUser->patient->birthday->age . ' years' : 'Age not specified' }}
                                        @else
                                            Patient details not available
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-envelope mr-1"></i>
                                        {{ $request->patientUser->email }}
                                    </p>
                                </div>
                            </div>

                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-calendar text-gray-400 mr-2"></i>
                                    <span
                                        class="text-xs text-gray-600">{{ $request->date_appointment->format('l, F j, Y') }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-clock text-gray-400 mr-2"></i>
                                    <span
                                        class="text-xs text-gray-600">{{ $request->time_appointment->format('g:i A') }}</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-hourglass-half text-gray-400 mr-2"></i>
                                    <span class="text-xs text-gray-600">{{ $request->consult_duration }} minutes</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <form action="{{ route('doctor.requests.accept', $request->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                        <i class="fas fa-check mr-1"></i>
                                        Accept
                                    </button>
                                </form>
                                <form action="{{ route('doctor.requests.decline', $request->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="w-full inline-flex justify-center items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                        <i class="fas fa-times mr-1"></i>
                                        Decline
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <i class="fas fa-calendar-check text-gray-400 text-5xl mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900">No pending requests</h3>
                            <p class="mt-1 text-sm text-gray-500">You don't have any pending appointment requests at the
                                moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
