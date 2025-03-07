<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    // Rotas de Pacientes
    Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('patients/{patient}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Rotas de Registros Médicos
    Route::get('medical_records', [MedicalRecordController::class, 'index'])->name('medical_records.index');
    Route::get('medical_records/create', [MedicalRecordController::class, 'create'])->name('medical_records.create');
    Route::post('medical_records', [MedicalRecordController::class, 'store'])->name('medical_records.store');
    Route::get('medical_records/{medicalRecord}', [MedicalRecordController::class, 'show'])->name('medical_records.show');
    Route::get('medical_records/{medicalRecord}/edit', [MedicalRecordController::class, 'edit'])->name('medical_records.edit');
    Route::put('medical_records/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('medical_records.update');
    Route::delete('medical_records/{medicalRecord}', [MedicalRecordController::class, 'destroy'])->name('medical_records.destroy');

    // Rotas de Consultas
    Route::get('consults', [ConsultationController::class, 'index'])->name('consults.index');
    Route::get('consults/create', [ConsultationController::class, 'create'])->name('consults.create');
    Route::post('consults', [ConsultationController::class, 'store'])->name('consults.store');
    Route::get('consults/{consultation}', [ConsultationController::class, 'show'])->name('consults.show');
    Route::get('consults/{consultation}/edit', [ConsultationController::class, 'edit'])->name('consults.edit');
    Route::put('consults/{consultation}', [ConsultationController::class, 'update'])->name('consults.update');
    Route::delete('consults/{consultation}', [ConsultationController::class, 'destroy'])->name('consults.destroy');

    // Página inicial ou outras páginas protegidas
    Route::get('/', function () {
        return view('welcome');
    });
});
