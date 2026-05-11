<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $siswa = \App\Models\Student::count();
        $obat = \App\Models\Medicine::count();
        $perawatan = \App\Models\Treatment::count();
        $kelas = \App\Models\Kelas::count();
        $recent_treatments = \App\Models\Treatment::with('student')->orderBy('tanggal_kunjungan', 'desc')->take(5)->get();

        return view('dashboard', compact('siswa', 'obat', 'perawatan', 'kelas', 'recent_treatments'));
    })->name('dashboard');

    Route::resource('treatments', TreatmentController::class);

    Route::middleware('role:admin')->group(function () {
        Route::get('/laporan', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
        Route::resource('students', StudentController::class);
        Route::resource('medicines', MedicineController::class)->except(['edit', 'update']);
        Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
    });
    Route::middleware('role:petugas')->group(function () {
        Route::get('/stok-obat', [MedicineController::class, 'index']);
    });

    Route::get('medicines/{medicine}/edit', [MedicineController::class, 'edit'])->name('medicines.edit');
    Route::put('medicines/{medicine}', [MedicineController::class, 'update'])->name('medicines.update');
});

require __DIR__.'/auth.php';