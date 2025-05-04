@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-semibold text-gray-900">My Appointments</h1>
                        <div class="ml-4 flex space-x-2">
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-50 text-green-700">
                                <svg class="mr-1.5 h-2 w-2 text-green-600" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Today: {{ $todayAppointments }}
                            </span>
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-cyan-50 text-cyan-700">
                                <svg class="mr-1.5 h-2 w-2 text-cyan-600" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Upcoming: {{ $upcomingAppointments }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @if(session('success'))
            <div id="success-message" class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-50 rounded-lg p-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Pending</p>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $pendingAppointments }}</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-50 rounded-lg p-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Confirmed</p>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $confirmedAppointments }}</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-red-50 rounded-lg p-3">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Cancelled</p>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $cancelledAppointments }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm mb-6">
            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                        <form action="{{ route('doctor.appointments') }}" method="GET" class="w-full">
                            @csrf
                            <select name="filter" onchange="this.form.submit()" class="w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
                                <option value="all" {{ $dateFilter === 'all' ? 'selected' : '' }}>All Appointments</option>
                                <option value="today" {{ $dateFilter === 'today' ? 'selected' : '' }}>Today</option>
                                <option value="tomorrow" {{ $dateFilter === 'tomorrow' ? 'selected' : '' }}>Tomorrow</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <form action="{{ route('doctor.appointments') }}" method="GET" class="w-full">
                            <input type="hidden" name="filter" value="{{ $dateFilter }}">
                            <select name="status" onchange="this.form.submit()" class="w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 sm:text-sm">
                                <option value="all" {{ $statusFilter === 'all' ? 'selected' : '' }}>All Status</option>
                                <option value="pending" {{ $statusFilter === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $statusFilter === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $statusFilter === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <form action="{{ route('doctor.appointments') }}" method="GET" class="w-full">
                            <input type="hidden" name="filter" value="{{ $dateFilter }}">
                            <input type="hidden" name="status" value="{{ $statusFilter }}">
                            <div class="flex gap-2">
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text"
                                           name="search"
                                           value="{{ request('search') }}"
                                           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                                           placeholder="Search appointments...">
                                </div>
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="min-w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($appointments as $appointment)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full overflow-hidden">
                                        <img src="{{ asset('images/default-avatar.png') }}"
                                             class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $appointment->patient->phone_number ?? 'No phone number' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($appointment->date_appointment)->format('M d, Y') }}, {{ $appointment->time_appointment }}</div>
                                <div class="text-sm text-gray-500">{{ $appointment->consult_duration }} minutes</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ str_replace('_', ' ', $appointment->appointment_type) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'confirmed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800'
                                    ];
                                    $statusColor = $statusColors[$appointment->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @if($appointment->status == 'pending')
                                    <button class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded-lg mr-3 transition duration-300 ease-in-out">Confirm</button>
                                    <button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Cancel</button>
                                @elseif($appointment->status == 'confirmed')
                                    <button class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded-lg mr-3 transition duration-300 ease-in-out">Start Session</button>
                                    <button class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Reschedule</button>
                                @elseif ($appointment->status == 'cancelled')
                                <form action="{{ route('doctor.appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                No appointments found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        @if ($appointments->onFirstPage())
                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white cursor-not-allowed">
                                Previous
                            </span>
                        @else
                            <a href="{{ $appointments->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                        @endif
                        @if ($appointments->hasMorePages())
                            <a href="{{ $appointments->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        @else
                            <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white cursor-not-allowed">
                                Next
                            </span>
                        @endif
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">{{ $appointments->firstItem() }}</span> to
                                <span class="font-medium">{{ $appointments->lastItem() }}</span> of
                                <span class="font-medium">{{ $appointments->total() }}</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                @if ($appointments->onFirstPage())
                                    <span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-400 cursor-not-allowed">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $appointments->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif

                                @foreach ($appointments->getUrlRange(1, $appointments->lastPage()) as $page => $url)
                                    @if ($page == $appointments->currentPage())
                                        <span class="relative inline-flex items-center px-4 py-2 border border-cyan-500 bg-cyan-50 text-sm font-medium text-cyan-600">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                @if ($appointments->hasMorePages())
                                    <a href="{{ $appointments->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-400 cursor-not-allowed">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.classList.add('opacity-0');
                setTimeout(() => successMessage.remove(), 500);
            }, 3000);
        }
    });
</script>

