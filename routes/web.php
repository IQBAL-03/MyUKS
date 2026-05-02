<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('students', StudentController::class);
        Route::resource('medicines', MedicineController::class);
    });
    Route::middleware('role:petugas')->group(function () {
        Route::resource('treatments', TreatmentController::class);
        Route::get('/stok-obat', [MedicineController::class, 'index']);
    });
});