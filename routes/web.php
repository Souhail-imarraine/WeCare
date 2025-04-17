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
use App\Http\Middleware\RoleMiddleware;

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
    Route::get('/settings', [DoctorDashboardController::class, 'showSettings'])->name('settings');
    Route::get('/appointments', [DoctorDashboardController::class, 'showAppointments'])->name('appointments');
});

Route::middleware(['auth', 'isPatient'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('dashboard');
});
