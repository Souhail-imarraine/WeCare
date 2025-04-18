@extends('layouts.app')

@section('content')
    <!-- Top Bar with Dashboard Title and User Info -->
    <header class="bg-white shadow-sm mb-8 rounded-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Dashboard Title -->
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>

                <!-- User Avatar and Name -->
                <div class="flex items-center">
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 mr-2">{{ Auth::user()->first_name ?? 'Doctor' }} {{ Auth::user()->last_name ?? '' }}</span>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ Auth::user()->doctor->status === 'approved' ? 'bg-green-100 text-green-800' : (Auth::user()->doctor->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst(Auth::user()->doctor->status) }}
                            </span>
                            <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">Open user menu</span>
                                {{-- Placeholder Avatar - Replace with actual user avatar if available --}}
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User Avatar">
                            </button>
                        </div>
                        {{-- Dropdown menu (hidden for now) --}}
                        {{-- <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Dashboard Content -->
    <div class="space-y-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Consultation Today -->
            <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-gray-800">{{ $consultationsToday ?? '0' }}</div>
                    <div class="text-sm text-gray-500">Consultation Today</div>
                </div>
                <div class="text-cyan-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <!-- Card 2: Pending -->
            <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-gray-800"></div>
                    <div class="text-sm text-gray-500">Pending</div>
                </div>
                 <div class="text-cyan-500">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <!-- Card 3: Total Consultation -->
            <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalConsultations ?? '0' }}</div>
                    <div class="text-sm text-gray-500">Total Consultation</div>
                </div>
                <div class="text-cyan-500">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
            </div>
             <!-- Card 4: Total Patients -->
            <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalPatients ?? '0' }}</div>
                    <div class="text-sm text-gray-500">Total Patients</div>
                </div>
                 <div class="text-cyan-500">
                     <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
        </div>

        <!-- Appointments and Gender Chart Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Today's Appointments (Left Side) -->
            <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Today's Appointments</h2>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px]">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600 uppercase">Patient</th>
                                <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600 uppercase">Start Time</th>
                                <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600 uppercase">End Time</th>
                                <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <!-- Example Row 1 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=48&h=48&q=80" alt="Patient Avatar">
                                        <span>Emilia Clarke</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4">10:15 AM</td>
                                <td class="py-3 px-4">10:45 AM</td>
                                <td class="py-3 px-4">
                                    <button class="bg-cyan-500 text-white py-1 px-4 rounded-md text-sm font-medium hover:bg-cyan-600 transition duration-200 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                                        Go
                                    </button>
                                </td>
                            </tr>
                            <!-- Example Row 2 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=48&h=48&q=80" alt="Patient Avatar">
                                        <span>Emilia Clarke</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4">10:50 AM</td>
                                <td class="py-3 px-4">11:20 AM</td>
                                <td class="py-3 px-4">
                                    <button class="bg-gray-200 text-gray-600 py-1 px-4 rounded-md text-sm font-medium hover:bg-gray-300 transition duration-200 flex items-center cursor-not-allowed">
                                         <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                                        Start
                                    </button>
                                </td>
                            </tr>
                             <!-- Example Row 3 -->
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=48&h=48&q=80" alt="Patient Avatar">
                                        <span>Emilia Clarke</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4">10:50 AM</td>
                                <td class="py-3 px-4">11:20 AM</td>
                                <td class="py-3 px-4">
                                    <button class="bg-gray-200 text-gray-600 py-1 px-4 rounded-md text-sm font-medium hover:bg-gray-300 transition duration-200 flex items-center cursor-not-allowed">
                                         <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                                        Start
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Patients Gender Chart (Right Side) -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Patients Gender</h2>
                <div class="relative h-64 flex items-center justify-center">
                    {{-- Placeholder for Pie Chart --}}
                    {{-- You'll need a library like Chart.js to render this --}}
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                label: 'Patients Gender',
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
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
</script>
@endpush
