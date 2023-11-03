<?php

namespace App\Http\Controllers;

use App\Models\catatan;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catat = catatan::all();

        return view('catatan.index', compact('catat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'catat'=> 'required|max:255'
        ], [
            'catat.max' => 'catatan tidak boleh lebih dari 255',
            'catat.required' => 'catatan tidak boleh kosong'
        ]);

        catatan::create($request->all());

        return redirect()->route('catatan')->with('success', 'berhasil membuat catatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = catatan::findOrfail($id);
        return view('catatan.update', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan = catatan::findOrfail($id);

        $request->validate([
            'catat' => 'required',
        ], [
            'catat.max' => 'catatan tidak boleh lebih dari 255',
            'catat.required' => 'catatan tidak boleh kosong'
        ]);

        $karyawan->update($request->all());

        return redirect()->route('catatan')->with('success', 'berhasil mengubah catatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = catatan::findOrFail($id);

        $karyawan->delete();

        return redirect('catatan')->with('success', 'berhasil menghapus');
    }
}
