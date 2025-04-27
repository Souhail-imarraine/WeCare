@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Top Bar with Dashboard Title and User Info -->
        <div class="flex items-center justify-between mb-6 lg:mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
            <div class="flex items-center">
                <span class="text-sm font-medium text-gray-700 mr-2">{{ Auth::user()->first_name ?? 'Doctor' }} {{ Auth::user()->last_name ?? '' }}</span>
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ Auth::user()->doctor->status === 'approved' ? 'bg-green-100 text-green-800' : (Auth::user()->doctor->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                    {{ ucfirst(Auth::user()->doctor->status) }}
                </span>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-600 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1: Consultation Today -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-gray-800">{{ $consultationsToday ?? '0' }}</div>
                        <div class="text-sm text-gray-500">Consultation Today</div>
                    </div>
                    <div class="text-cyan-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 2: Pending -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-gray-800">{{ $pendingRequests ?? '0' }}</div>
                        <div class="text-sm text-gray-500">Pending Requests</div>
                    </div>
                    <div class="text-cyan-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 3: Total Consultation -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-gray-800">{{ $totalConsultations ?? '0' }}</div>
                        <div class="text-sm text-gray-500">Total Consultations</div>
                    </div>
                    <div class="text-cyan-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 4: Total Patients -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-gray-800">{{ $totalPatients ?? '0' }}</div>
                        <div class="text-sm text-gray-500">Total Patients</div>
                    </div>
                    <div class="text-cyan-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Today's Appointments (Left Side) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Today's Appointments</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[600px]">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">Patient</th>
                                        <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">Start Time</th>
                                        <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">End Time</th>
                                        <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @forelse($todayAppointments ?? [] as $appointment)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-full object-cover mr-3" src="{{ $appointment->patient->profile_image ?? 'https://ui-avatars.com/api/?name=' . urlencode($appointment->patient->name) }}" alt="Patient Avatar">
                                                <span>{{ $appointment->patient->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4">{{ $appointment->start_time }}</td>
                                        <td class="py-3 px-4">{{ $appointment->end_time }}</td>
                                        <td class="py-3 px-4">
                                            <button class="bg-cyan-500 text-white py-1 px-4 rounded-md text-sm font-medium hover:bg-cyan-600 transition duration-200 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                                </svg>
                                                Start
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-6 text-center text-gray-500">No appointments scheduled for today</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Patients Gender Chart (Right Side) -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Patients Gender</h2>
                    <div class="relative h-64 flex items-center justify-center">
                        <canvas id="genderChart"></canvas>
                    </div>
                    <div class="mt-4 flex justify-center space-x-6 text-sm text-gray-600">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-cyan-500 rounded-full mr-2"></span>
                            <span>Male</span>
                            <span class="ml-2 font-medium text-gray-800">{{ $malePercentage ?? '0' }}%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-pink-500 rounded-full mr-2"></span>
                            <span>Female</span>
                            <span class="ml-2 font-medium text-gray-800">{{ $femalePercentage ?? '0' }}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [{{ $malePercentage ?? 0 }}, {{ $femalePercentage ?? 0 }}],
                backgroundColor: [
                    '#06b6d4',
                    '#ec4899'
                ],
                borderColor: [
                    '#ffffff',
                    '#ffffff'
                ],
                borderWidth: 2,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
@endsection
