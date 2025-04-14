<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DoctorRegisterController;
use App\Http\Controllers\PatientRegisterController;
use App\Http\Controllers\DoctorRegisterController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/chose', function () {
    return view('auth.chose');
});

Route::get('/register', function(){
    return view('auth.register_doctor');
});

Route::get('/register_patient', function(){
    return view('auth.patient_register');
});

Route::get('/login', [loginController::class, 'login'])->name('login');


Route::get('/register-doctor', [DoctorRegisterController::class, 'showRegistrationForm'])->name('register.doctor');
Route::post('/register-doctor', [DoctorRegisterController::class, 'register'])->name('register.doctor.submit');

Route::get('/register-patient', [PatientRegisterController::class, 'showRegistrationForm'])->name('register.patient');
Route::post('/register-patient', [PatientRegisterController::class, 'register'])->name('register.patient.submit');


// Route::get('/doctor/dashboard', [App\Http\Controllers\DoctorDashboardController::class, 'index'])->name('doctor.dashboard');

Route::middleware(['auth', 'isDoctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/requests', [DoctorDashboardController::class, 'showRequests'])->name('requests');
});
