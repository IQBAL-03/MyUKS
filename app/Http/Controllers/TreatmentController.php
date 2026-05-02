<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Medicine;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatment::with('student')->latest()->get();
        return view('treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::where('stok', '>', 0)->get();
        $students = Student::all();
        return view('treatments.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
            'tanggal_kunjungan' => 'required|date',
            'medicines' => 'nullable|array',
            'medicines.*.id' => 'required|exists:medicines,id',
            'medicines.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $treatment = Treatment::create([
                'student_id' => $request->student_id,
                'keluhan' => $request->keluhan,
                'diagnosa' => $request->diagnosa,
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
            ]);

            if ($request->has('medicines')) {
                foreach ($request->medicines as $med) {
                    $treatment->medicines()->attach($med['id'], [
                        'jumlah_obat' => $med['jumlah']
                    ]);
                    $medicine = Medicine::find($med['id']);
                    $medicine->decrement('stok', $med['jumlah']);
                }
            }
        });

        return redirect()->route('treatments.index')
            ->with('success', 'kunjungan berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treatments = Treatment::with(['student', 'medicine'])->findOrFail($id);
        return view('treatments.show', compact('treatments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->role !== 'admin'){
            abort(403, ('Akses Ditolak'));
        }

        $treatment = Treatment::findOrFail($id);
        $medicines = Medicine::all();
        $students = Student::all();
        
        return view('treatments.edit', compact('treatment', 'medicine', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403, 'Akses Ditolak');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403, 'Akses Ditolak');
        }

        $treatment = Treatment::findOrFail($id);
        $treatment->delete();
        return redirect()->route('treatments.index')
            ->with('success', 'Catatan Kunjuungan Berhasil Dihapus.');
    }
}
