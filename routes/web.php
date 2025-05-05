<?php
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DoctorRegisterController;
use App\Http\Controllers\Auth\PatientRegisterController;
use App\Http\Controllers\Auth\DoctorRegisterController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\PatientDoctorController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\PatientDoctorProfileController;
use App\Http\Controllers\Patient\AppointmentController;
use App\Http\Controllers\Patient\My_appointments;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LoginControllerAdmin;
use App\Http\Controllers\Admin\AdminPatients;
use App\Http\Controllers\Admin\RequestAdminController;
use App\Http\Controllers\Admin\DoctorsAdminController;
use App\Http\Controllers\Admin\DoctorRequestsController;
use App\Http\Controllers\Doctor\RequestController;
use App\Http\Controllers\PatientBookFollowupContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorAppointementController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

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


Route::get('/register_patient', function(){
    return view('auth.patient_register');
});

Route::get('/register-doctor', [DoctorRegisterController::class, 'showRegistrationForm'])->name('register.doctor');
Route::post('/register-doctor', [DoctorRegisterController::class, 'register'])->name('register.doctor.submit');

Route::get('/register-patient', [PatientRegisterController::class, 'showRegistrationForm'])->name('patient.register.form');
Route::post('/register-patient', [PatientRegisterController::class, 'register'])->name('patient.register');
Route::get('/doctors/{id}', [PatientDoctorProfileController::class, 'show'])->name('doctor.profile');

// Protected Routes
Route::middleware(['auth', 'isDoctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/requests', [DoctorDashboardController::class, 'showRequests'])->name('requests');
    Route::get('/profile', [DoctorDashboardController::class, 'showProfile'])->name('profile');
    Route::get('/settings', [DoctorProfileController::class, 'settings'])->name('settings');
    Route::put('/profile/update', [DoctorProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password/update', [DoctorProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/appointments', [DoctorAppointementController::class, 'index'])->name('appointments');

    // apointment routes
    Route::delete('/appointments/{appointment}', [DoctorAppointementController::class, 'destroy'])->name('appointments.destroy');

    // Appointment Requests
    Route::get('/requests', [RequestController::class, 'index'])->name('requests');
    Route::post('/requests/{id}/accept', [RequestController::class, 'accept'])->name('requests.accept');
    Route::post('/requests/{id}/decline', [RequestController::class, 'decline'])->name('requests.decline');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::post('/appointments/{id}/complete', [DoctorAppointementController::class, 'complete'])->name('appointments.complete');

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

    // Doctor profile and appointment routes
    Route::get('/doctor/{doctor}', [PatientDoctorProfileController::class, 'show'])->name('doctor_profile');
    Route::get('/book-appointment/{doctor}', [PatientDoctorController::class, 'bookAppointment'])->name('book_appointment');
    Route::get('/book-followup/{doctor}', [PatientBookFollowupContoller::class, 'bookFollowUp'])->name('book_followup');
    Route::post('/book-appointment/{doctor}', [AppointmentController::class, 'store'])->name('book_appointment.store');
    Route::get('/check-slots/{doctor}', [AppointmentController::class, 'checkAvailableSlots'])->name('check.slots');

    // Appointments
    Route::get('/appointments', [My_appointments::class, 'index'])->name('appointments');
    Route::post('/appointments/{appointment}/cancel', [My_appointments::class, 'cancelAppointment'])->name('appointments.cancel');
    Route::delete('/appointments/{appointment}/delete', [My_appointments::class, 'deleteAppointment'])->name('appointments.delete');
    Route::post('/doctors/{doctor}/book-appointment', [AppointmentController::class, 'store'])->name('patient.book_appointment');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

});

// admin controllers *******************************************************************************
Route::get('/admin/login', [LoginControllerAdmin::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginControllerAdmin::class, 'login']);

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/doctors', [DoctorsAdminController::class, 'doctors'])->name('doctors');
    Route::get('/patients', [AdminPatients::class, 'patients'])->name('patients');
    Route::get('/appointments', [AdminDashboardController::class, 'appointments'])->name('appointments');
    Route::get('request', [RequestAdminController::class, 'index'])->name('requests');
    Route::get('request/{id}', [RequestAdminController::class, 'show'])->name('requests.show');
    Route::post('request/{id}/approve', [RequestAdminController::class, 'approve'])->name('requests.approve');
    Route::post('request/{id}/reject', [RequestAdminController::class, 'reject'])->name('requests.reject');

    // Patient routes
    Route::get('/patients/{patient}', [AdminPatients::class, 'show'])->name('patients.show');
    Route::put('/patients/{patient}', [AdminPatients::class, 'update'])->name('patients.update');
    Route::delete('/patients/{patient}', [AdminPatients::class, 'destroy'])->name('patients.destroy');

    Route::put('/doctors/{doctor}', [DoctorsAdminController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/{doctor}', [DoctorsAdminController::class, 'destroy'])->name('doctors.destroy');

    // Doctor Requests Routes
    Route::get('/doctor-requests', [DoctorRequestsController::class, 'index'])->name('doctor.requests');
    Route::post('/doctor/{doctor}/approve', [DoctorRequestsController::class, 'approve'])->name('doctor.approve');
    Route::post('/doctor/{doctor}/reject', [DoctorRequestsController::class, 'reject'])->name('doctor.reject');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
