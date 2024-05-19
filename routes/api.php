<?php

use App\Http\Controllers\api\MedicalAppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PatientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/pacientes', [PatientController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes', [PatientController::class, 'index'])->name('pacientes');
Route::delete('/pacientes/{paciente}', [PatientController::class, 'destroy'])->name('pacientes.destroy');
Route::get('/pacientes/{paciente}', [PatientController::class, 'show'])->name('pacientes.show');
Route::put('/pacientes/{paciente}', [PatientController::class, 'update'])->name('pacientes.update');

Route::post('/appointments', [MedicalAppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments', [MedicalAppointmentController::class, 'index'])->name('appointments');
Route::delete('/appointments/{appointment}', [MedicalAppointmentController::class, 'destroy'])->name('appointments.destroy');
Route::get('/appointments/{appointment}', [MedicalAppointmentController::class, 'show'])->name('appointments.show');
Route::put('/appointments/{appointment}', [MedicalAppointmentController::class, 'update'])->name('appointments.update');
