<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Kelas;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('kelas')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('students.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:students,nis',
            'nama' => 'required|string|max:255',
            'kelas_id' => 'requires|exists:kelas,id',
            'jenis_kelamin' => 'required|in:L,P'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::all();
        return view('students.edit', compact('student', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:students,nis,' . $student->id,
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Data Siswa Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data Siswa Berhasil Dihapus');
    }
}
