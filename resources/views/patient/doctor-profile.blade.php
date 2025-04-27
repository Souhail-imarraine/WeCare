@extends('layouts.patient')

@push('head')
    <!-- Add Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        /* Calendar Container */
        .flatpickr-calendar {
            background: #fff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.75rem;
            border: none;
            margin-bottom: 1rem;
            padding: 1rem;
            width: 100% !important;
            position: relative !important;
            top: 0 !important;
            left: 0 !important;
        }

        /* Prevent scroll behavior */
        html {
            scroll-behavior: auto !important;
        }

        /* Month Navigation */
        .flatpickr-months {
            background-color: #0891b2;
            border-radius: 0.5rem 0.5rem 0 0;
            padding: 0.5rem;
            margin: -1rem -1rem 0.5rem -1rem;
            width: calc(100% + 2rem);
        }

        .flatpickr-months .flatpickr-month {
            color: #fff;
            height: 40px;
        }

        .flatpickr-months .flatpickr-prev-month,
        .flatpickr-months .flatpickr-next-month {
            color: #fff;
            fill: #fff;
            height: 40px;
            padding: 0.5rem;
        }

        .flatpickr-months .flatpickr-prev-month:hover,
        .flatpickr-months .flatpickr-next-month:hover {
            color: #e5e5e5;
            fill: #e5e5e5;
        }

        .flatpickr-current-month {
            font-size: 1.1rem;
            padding: 0.5rem 0;
        }

        /* Calendar Days */
        .flatpickr-weekdays {
            background: transparent;
            margin-top: 0.5rem;
        }

        .flatpickr-weekday {
            color: #0891b2;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .flatpickr-day {
            border-radius: 0.5rem;
            margin: 0.2rem 0;
            height: 40px;
            line-height: 40px;
            font-size: 0.95rem;
        }

        .flatpickr-day.selected {
            background: #0891b2;
            border-color: #0891b2;
        }

        .flatpickr-day.selected:hover {
            background: #0e7490;
            border-color: #0e7490;
        }

        .flatpickr-day:hover {
            background: #f0f9ff;
        }

        .flatpickr-day.today {
            border-color: #0891b2;
        }

        .flatpickr-day.disabled {
            color: #cbd5e1;
            text-decoration: line-through;
        }

        /* Input field */
        .flatpickr-input {
            background-color: #fff !important;
        }

        .flatpickr-wrapper {
            width: 100%;
        }
    </style>
@endpush

@section('content')
<div class="p-4 sm:p-6 lg:p-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Success Message -->
        @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
            <p class="font-medium">{{ session('success') }}</p>
        </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
            <p class="font-medium">{{ session('error') }}</p>
        </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="flex items-center justify-between mb-6 lg:mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Doctor Profile</h1>
            @if($canBookAppointment)
            <a href="{{ route('patient.book_appointment', $doctor->id) }}" class="inline-flex items-center px-6 py-3 bg-cyan-600 text-white rounded-lg font-semibold text-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Book Appointment
            </a>
            @else
            <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-cyan-600 text-white rounded-lg font-semibold text-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Login to Book
            </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8">
            <!-- Left Column - Profile Info -->
            <div class="md:col-span-4">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 lg:p-8">
                        <div class="flex flex-col items-center">
                            <div class="w-32 h-32 sm:w-40 sm:h-40 lg:w-48 lg:h-48 rounded-full overflow-hidden bg-gray-100 mb-4 ring-4 ring-cyan-50">
                                <img src="{{ asset($doctor->profile_image ?? 'doctor_profile/default-avatar.png') }}"
                                     alt="{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}"
                                     class="w-full h-full object-cover">
                            </div>
                            <h2 class="text-xl sm:text-2xl font-semibold text-center text-gray-900">Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</h2>
                            <div class="mt-2 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-cyan-50 text-cyan-700">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Verified Doctor
                            </div>
                            <p class="mt-2 text-gray-500 text-sm">{{ $doctor->city }}</p>
                        </div>

                        <!-- Quick Stats -->
                        <div class="mt-8 grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500">Experience</p>
                                        <p class="font-semibold">{{ $doctor->years_experience }} Years</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-cyan-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500">Fee</p>
                                        <p class="font-semibold">{{ number_format($doctor->consultation_price, 2) }} DH</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="md:col-span-8">
                <!-- About Section -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="p-6 lg:p-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">About Me</h3>
                        <div class="prose max-w-none text-gray-500">
                            {{ $doctor->bio ?? 'No bio available.' }}
                        </div>

                        <div class="mt-8 pt-8 border-t border-gray-100">
                            <h4 class="text-sm font-medium text-gray-900 mb-4">Specialization</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-cyan-50 text-cyan-700">
                                    {{ $doctor->specialty }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                    <div class="p-6 lg:p-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Contact Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-10 h-10 bg-cyan-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Location</p>
                                    <p class="text-sm text-gray-500">{{ $doctor->city ?? 'Location not specified' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-10 h-10 bg-cyan-50 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Phone</p>
                                    <p class="text-sm text-gray-500">{{ $doctor->phone_number ?? 'Phone not specified' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Section -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 lg:p-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Book an Appointment</h3>

                        <form action="{{ route('patient.book_appointment.store', $doctor->id) }}" method="POST" id="bookingForm">
                            @csrf
                            <!-- Date Selection -->
                            <div class="mb-6">
                                <label for="appointment_date" class="block text-sm font-medium text-gray-700 mb-2">Select Date</label>
                                <div class="bg-white rounded-xl shadow-sm p-4">
                                    <div class="flatpickr-wrapper w-full">
                                        <input type="text"
                                               id="appointment_date"
                                               name="appointment_date"
                                               class="w-full border-gray-300 rounded-lg shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                                               placeholder="Select date"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <!-- Time Slots -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Time</label>
                                <div id="timeSlots" class="grid grid-cols-4 gap-2">
                                    <!-- Time slots will be loaded here -->
                                </div>
                                <div id="loadingSlots" class="hidden">
                                    <div class="flex items-center justify-center py-4">
                                        <svg class="animate-spin h-5 w-5 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span class="ml-2">Loading available time slots...</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Appointment Type -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Appointment Type</label>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">

                                    <label class="relative">
                                        <input type="radio" name="appointment_type" value="in_person" class="peer sr-only" required>
                                        <div class="flex items-center p-4 border rounded-lg cursor-pointer peer-checked:border-cyan-500 peer-checked:bg-cyan-50 hover:bg-gray-50">
                                            <div class="flex-shrink-0 w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h5 class="text-base font-medium text-gray-900">In-Person Visit</h5>
                                                <p class="text-sm text-gray-500">Visit the clinic</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Book Now Button -->
                            <div class="mt-8 pt-8 border-t border-gray-100">
                                <button type="submit" class="w-full bg-cyan-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-300 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Confirm Booking
                                </button>
                                <p class="mt-2 text-sm text-gray-500 text-center">
                                    Consultation Fee: <span class="font-medium text-gray-900">{{ number_format($doctor->consultation_price, 2) }} DH</span>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flatpickrInstance = flatpickr("#appointment_date", {
            minDate: "today",
            maxDate: new Date().fp_incr(30),
            disable: [
                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6);
                }
            ],
            dateFormat: "Y-m-d",
            enableTime: false,
            altInput: true,
            altFormat: "F j, Y",
            inline: true,
            static: true,
            monthSelectorType: "static",
            locale: {
                firstDayOfWeek: 1
            },
            onChange: function(selectedDates, dateStr) {
                loadTimeSlots(dateStr);
            }
        });

        function loadTimeSlots(date) {
            const timeSlotsContainer = document.getElementById('timeSlots');
            const loadingElement = document.getElementById('loadingSlots');

            // Show loading
            timeSlotsContainer.innerHTML = '';
            loadingElement.classList.remove('hidden');

            // Make AJAX request
            fetch(`/patient/check-slots/{{ $doctor->id }}?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    loadingElement.classList.add('hidden');

                    const allTimeSlots = [
                        '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
                        '14:00', '14:30', '15:00', '15:30', '16:00', '16:30'
                    ];

                    const html = allTimeSlots.map(time => {
                        const isBooked = data.bookedSlots.includes(time);
                        return `
                            <label class="relative flex items-center justify-center">
                                <input type="radio" name="appointment_time" value="${time}"
                                       class="peer sr-only" ${isBooked ? 'disabled' : ''}>
                                <div class="w-full py-2 text-center text-sm border rounded-lg cursor-pointer
                                            ${isBooked ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'peer-checked:border-cyan-500 peer-checked:bg-cyan-50 hover:bg-gray-50'}">
                                    ${time}
                                    ${isBooked ? '<br><span class="text-xs text-red-500">(Already Booked)</span>' : ''}
                                </div>
                            </label>
                        `;
                    }).join('');

                    timeSlotsContainer.innerHTML = html;
                })
                .catch(error => {
                    loadingElement.classList.add('hidden');
                    timeSlotsContainer.innerHTML = `
                        <div class="col-span-4 text-center py-4 text-red-500">
                            Error loading time slots. Please try again.
                        </div>
                    `;
                });
        }
    });

    // Form validation
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const date = document.getElementById('appointment_date').value;
        const time = document.querySelector('input[name="appointment_time"]:checked');
        const type = document.querySelector('input[name="appointment_type"]:checked');

        if (!date || !time || !type) {
            e.preventDefault();
            alert('Please fill in all required fields');
        }
    });
</script>
@endpush
