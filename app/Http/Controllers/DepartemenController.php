<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = departemen::all();

        return view('departement.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ],  [
            'name.max' => 'nama departemen tidak boleh lebih dari 255',
            'location.max' => 'lokasi departemen tidak boleh lebih dari 255',
            'name.required' => 'nama departemen harus di isi',
            'location.required' => 'lokasi departemen harus di isi'
        ]);

        $departemen = new departemen;
        $departemen->name = $request->name;
        $departemen->location = $request->location;
        $departemen->save();

        return redirect()->route('departmen')->with('success', 'Data karyawan berhasil Ditambahkan');
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
        $departemen= departemen::findOrFail($id);

        return view('Departement.update', compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departemen= departemen::findOrFail($id);
        //
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ],  [
            'name.max' => 'nama departemen tidak boleh lebih dari 255',
            'location.max' => 'lokasi departemen tidak boleh lebih dari 255',
            'name.required' => 'nama departemen harus di isi',
            'location.required' => 'lokasi departemen harus di isi'
        ]);

        $departemen->name = $request->name;
        $departemen->location = $request->location;
        $departemen->save();

        return redirect()->route('departmen')->with('success', 'Data departemen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $dep = Departemen::findOrFail($id);
            $dep->delete();

            return redirect('departmen')->with('success', 'Data berhasil dihapus');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->with(['error' => 'Tidak dapat menghapus departemen ini karena masih terdapat karyawan yang terkait.']);
            }
        }
    }
}
