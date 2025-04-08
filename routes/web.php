<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DoctorRegisterController;
use App\Http\Controllers\PatientRegisterController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\DoctorRegisterController;

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

Route::get('/login', function(){
    return view('auth.login');
});


Route::get('/register-doctor', [DoctorRegisterController::class, 'showRegistrationForm'])->name('register.doctor');
Route::post('/register-doctor', [DoctorRegisterController::class, 'register'])->name('register.doctor.submit');

Route::get('/register-patient', [PatientRegisterController::class, 'showRegistrationForm'])->name('register.patient');
Route::post('/register-patient', [PatientRegisterController::class, 'register'])->name('register.patient.submit');


Route::get('/doctor/dashboard', [DoctorDashboardController::class, 'index'])
->middleware(['auth', 'role:doctor'])
->name('doctor.dashboard');
