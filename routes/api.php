<?php

use App\Http\Controllers\api\InvoiceController;
use App\Http\Controllers\api\MedicalAppointmentController;
use App\Http\Controllers\api\MedicalRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PatientController;
use App\Http\Controllers\api\TreatmentController;

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

Route::post('/records', [MedicalRecordController::class, 'store'])->name('records.store');
Route::get('/records', [MedicalRecordController::class, 'index'])->name('records');
Route::delete('/records/{record}', [MedicalRecordController::class, 'destroy'])->name('records.destroy');
Route::get('/records/{record}', [MedicalRecordController::class, 'show'])->name('records.show');
Route::put('/records/{record}', [MedicalRecordController::class, 'update'])->name('records.update');

Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');

Route::post('/treatments', [TreatmentController::class, 'store'])->name('treatments.store');
Route::get('/treatments', [TreatmentController::class, 'index'])->name('treatments');
Route::delete('/treatments/{treatment}', [TreatmentController::class, 'destroy'])->name('treatments.destroy');
Route::get('/treatments/{treatment}', [TreatmentController::class, 'show'])->name('treatments.show');
Route::put('/treatments/{treatment}', [TreatmentController::class, 'update'])->name('treatments.update');
