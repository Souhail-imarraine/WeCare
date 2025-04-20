<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DoctorRegisterController;
use App\Http\Controllers\PatientRegisterController;
use App\Http\Controllers\DoctorRegisterController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\PatientDoctorController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorProfileController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/home', function () {
//     return view('index');
// })->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/chose', function () {
    return view('auth.chose');
})->name('chose');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register', function(){
    return view('auth.register_doctor');
});

Route::get('/register_patient', function(){
    return view('auth.patient_register');
});

Route::get('/register-doctor', [DoctorRegisterController::class, 'showRegistrationForm'])->name('register.doctor');
Route::post('/register-doctor', [DoctorRegisterController::class, 'register'])->name('register.doctor.submit');

Route::get('/register-patient', [PatientController::class, 'showRegistrationForm'])->name('patient.register.form');
Route::post('/register-patient', [PatientController::class, 'register'])->name('patient.register');

// Protected Routes
Route::middleware(['auth', 'isDoctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/requests', [DoctorDashboardController::class, 'showRequests'])->name('requests');
    Route::get('/profile', [DoctorDashboardController::class, 'showProfile'])->name('profile');
    Route::get('/settings', [DoctorProfileController::class, 'settings'])->name('settings');
    Route::put('/profile/update', [DoctorProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password/update', [DoctorProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/appointments', [DoctorDashboardController::class, 'showAppointments'])->name('appointments');
});

Route::middleware(['auth', 'isPatient'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/doctors', [PatientDoctorController::class, 'index'])->name('doctors');
    Route::get('/profile', [PatientProfileController::class, 'show'])->name('profile');
    Route::get('/settings', [PatientProfileController::class, 'edit'])->name('settings');
    Route::put('/profile', [PatientProfileController::class, 'update'])->name('profile.update');

    Route::get('/settings', [PatientProfileController::class, 'settings'])->name('settings');
    Route::put('/profile/update', [PatientProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password/update', [PatientProfileController::class, 'updatePassword'])->name('password.update');
});

// Specialty Routes
Route::prefix('specialties')->name('specialties.')->group(function () {
    Route::get('/general-practitioner', [SpecialtyController::class, 'generalPractitioner'])->name('general-practitioner');
    Route::get('/telehealth', [SpecialtyController::class, 'telehealth'])->name('telehealth');
    Route::get('/physiotherapist', [SpecialtyController::class, 'physiotherapist'])->name('physiotherapist');
    Route::get('/dentist', [SpecialtyController::class, 'dentist'])->name('dentist');
    Route::get('/psychologist', [SpecialtyController::class, 'psychologist'])->name('psychologist');
    Route::get('/optometrist', [SpecialtyController::class, 'optometrist'])->name('optometrist');
    Route::get('/chiropractor', [SpecialtyController::class, 'chiropractor'])->name('chiropractor');
    Route::get('/podiatrist', [SpecialtyController::class, 'podiatrist'])->name('podiatrist');
    Route::get('/general-practitioner', [SpecialtyController::class, 'generalPractitioner'])->name('general-practitioner');


});

// Patient Profile Routes


// Patient routes
