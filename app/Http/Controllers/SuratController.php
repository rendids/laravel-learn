<?php

namespace App\Http\Controllers;

use App\Models\surat;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catat = surat::all();

        return view('surat.index', compact('catat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'kode_surat'=> 'required|unique:surats,kode_surat|max:100',
            'tanggal'=> 'required',
            'pengirim'=> 'required|max:100',
            'perihal'=> 'required|max:255',
        ], [
            'kode_surat.unique' => 'kode surat tidak boleh sama',
            'kode_surat.required' => 'kode surat tidak boleh kosong',
            'tanggal.required' => 'tanggal surat tidak boleh kosong',
            'perihal.required' => 'perihal surat tidak boleh kosong',
            'kode_surat.max' => 'kode surat tidak boleh lebih dari 100',
            'perihal.max' => 'perihal surat tidak boleh lebih dari 255',
            'pengirim.max' => 'pengirim surat tidak boleh lebih dari 100',
        ]);

        surat::create($request->all());

        return redirect()->route('surat')->with('success', 'berhasil menambahkan surat');
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
        $sur = surat::findOrfail($id);

        return view('surat.update',compact('sur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sur = surat::findOrfail($id);

        $request->validate([
            'kode_surat'=> 'required|unique:surats,kode_surat|max:100',
            'tanggal'=> 'required|date',
            'pengirim'=> 'required|max:100',
            'perihal'=> 'required|max:255',
        ], [
            'kode_surat.unique' => 'kode surat tidak boleh sama',
            'kode_surat.required' => 'kode surat tidak boleh kosong',
            'tanggal.required' => 'tanggal surat tidak boleh kosong',
            'perihal.required' => 'perihal surat tidak boleh kosong',
            'kode_surat.max' => 'kode surat tidak boleh lebih dari 100',
            'perihal.max' => 'perihal surat tidak boleh lebih dari 255',
            'pengirim.max' => 'pengirim surat tidak boleh lebih dari 100',
        ]);
        $sur->update($request->all());

        return redirect()->route('surat')->with('success', 'surat berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $srt = surat::findOrfail($id);

        $srt->delete();

        return back()->with('success', 'berhasil menghapus surat');
    }
}
