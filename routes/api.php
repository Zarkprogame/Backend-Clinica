<?php

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
