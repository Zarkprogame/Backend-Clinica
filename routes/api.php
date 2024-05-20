<?php

use App\Http\Controllers\api\MedicalAppointmentController;
use App\Http\Controllers\api\MedicalRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PatientController;
use App\Models\InvoiceModel;

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

Route::post('/invoices', [InvoiceModel::class, 'store'])->name('invoices.store');
Route::get('/invoices', [InvoiceModel::class, 'index'])->name('invoices');
Route::delete('/invoices/{invoice}', [InvoiceModel::class, 'destroy'])->name('invoices.destroy');
Route::get('/invoices/{invoice}', [InvoiceModel::class, 'show'])->name('invoices.show');
Route::put('/invoices/{invoice}', [InvoiceModel::class, 'update'])->name('invoices.update');
