<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/chose', function () {
    return view('chose');
});

Route::get('/register', function(){
    return view('register_doctor');
});

Route::get('/register_patient', function(){
    return view('patient_register');
});

Route::get('/login', function(){
    return view('login');
});


Route::get('/register-doctor', [DoctorRegisterController::class, 'showRegistrationForm'])->name('register.doctor');
Route::post('/register-doctor', [DoctorRegisterController::class, 'register'])->name('register.doctor.submit');

