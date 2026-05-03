<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::resource('treatments', TreatmentController::class);

    Route::middleware('role:admin')->group(function () {
        Route::get('/laporan', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
        Route::resource('students', StudentController::class);
        Route::resource('medicines', MedicineController::class);
        Route::resource('kelas', KelasController::class);
    });
    Route::middleware('role:petugas')->group(function () {
        Route::get('/stok-obat', [MedicineController::class, 'index']);
    });
});