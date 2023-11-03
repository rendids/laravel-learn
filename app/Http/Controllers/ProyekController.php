<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::all();
        return view('proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required|after_or_equal:tanggal_mulai',
        ], [
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'nama_proyek.required' => 'nama proyek tidak boleh kosong',
            'nama_proyek.max' => 'nama proyek tidak boleh lebih dari 100',
            'deskripsi.max' => 'deskripsi tidak boleh lebih dari 255',
            'deskripsi.required' => 'deskripsi tidak boleh kosong',
            'tanggal_mulai.required' => 'tanggal mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'tanggal selesai tidak boleh kosong',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrfail($id);
        return view('proyek.update', compact('proyek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required|after_or_equal:tanggal_mulai',
        ], [
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'nama_proyek.required' => 'nama proyek tidak boleh kosong',
            'nama_proyek.max' => 'nama proyek tidak boleh lebih dari 100',
            'deskripsi.max' => 'deskripsi tidak boleh lebih dari 255',
            'deskripsi.required' => 'deskripsi tidak boleh kosong',
            'tanggal_mulai.required' => 'tanggal mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'tanggal selesai tidak boleh kosong',
        ]);

        $proyek = Proyek::find($id);
        $proyek->update($request->all());

        return redirect()->route('proyek')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $proyek = Proyek::findOrfail($id);
        $proyek->delete();

        return redirect()->route('proyek')->with('success', 'Proyek berhasil dihapus.');
    }
}
