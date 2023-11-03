<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keluar = pengeluaran::all();

        return view('pengeluaran.index', compact('keluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'jenis_pengeluaran' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required|numeric|min:0'
        ], [
            'jenis_pengeluaran.required' => 'harap isi jenis pengeluaran',
            'tanggal.required' => 'harap isi tanggal pengeluaran',
            'jumlah.required' => 'harap isi jumlah pengeluaran',
            'jumlah.min' => 'angka tidak boleh mines'
        ]);

        pengeluaran::create($request->all());

        return redirect()->route('pengeluaran')->with('success', 'pengeluaran berhasil di tambahkan');
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
        $keluar = pengeluaran::findOrfail($id);

        return view('pengeluaran.update', compact('keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $keluar = pengeluaran::findOrfail($id);

        $request->validate([
            'jenis_pengeluaran' => 'required|max:100',
            'tanggal' => 'required',
            'jumlah' => 'required|numeric|min:0'
        ], [
            'jenis_pengeluaran.max' => 'jenis pengeluaran tidak boleh lebih dari 100',
            'jenis_pengeluaran.required' => 'harap isi jenis pengeluaran',
            'tanggal.required' => 'harap isi tanggal pengeluaran',
            'jumlah.min' => 'angka tidak boleh mines',
            'jumlah.required' => 'jumlah tidak boleh kosong'
        ]);

        $keluar->update($request->all());

        return redirect()->route('pengeluaran')->with('success', 'berhasil mengubah pengeluaran');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keluar = pengeluaran::findOrfail($id);

        $keluar->delete();

        return back()->with('success', 'berhasil mennghapus pengeluaran');
    }
}
