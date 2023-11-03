<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\penugasan;
use App\Models\proyek;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tugas = penugasan::all();

        return view('penugasan.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penugasan.create', [
            'depar' => karyawan::get(),
            'i' => proyek::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'karyawan_id' => 'required',
            'proyek_id' => 'required',
            'deskripsi' => 'required|max:255',
        ],[
            'karyawan_id.required' => 'harap pilih karyawan',
            'proyek_id.required' => 'harap pilih proyek',
            'deskripsi.required' => 'harap isi deskripsi',
            'deskripsi.max' => 'deskripsi tidak boleh lebih dari 255',
        ]);

        $departemen = new penugasan();
        $departemen->karyawan_id = $request->karyawan_id;
        $departemen->proyek_id = $request->proyek_id;
        $departemen->deskripsi = $request->deskripsi;
        $departemen->save();

        return redirect()->route('penugasan')->with('success', 'Data penugasan berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penugasan = penugasan::findOrfail($id);
        return view('penugasan.update',compact('penugasan'), [
            'depar' => karyawan::get(),
            'i' => proyek::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'proyek_id' => 'required',
            'deskripsi' => 'required|max:255',
        ], [
            'deskripsi.required' => 'harap isi deskripsi',
            'deskripsi.max' => 'deskripsi tidak boleh lebih dari 255',
        ]);

        $proyek = penugasan::find($id);
        $proyek->update($request->all());


        return redirect()->route('penugasan')->with('success', 'Data penugasan berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $proyek = penugasan::findOrfail($id);
        $proyek->delete();

        return redirect()->route('penugasan')->with('success', 'penugasan berhasil dihapus.');
    }
}
