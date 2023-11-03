<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = karyawan::with('departemen')->paginate(5);

        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create', [
            'depar' => departemen::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|mimes:png,jpg,jpeg,gif|max:10000',
            'nama' => 'required|max:100',
            'jk' => 'required',
            'alamat' => 'required|max:255',
            'departemen_id' => 'required'
        ],[
            'nama.required' => 'harap isi nama',
            'nama.max' => 'nama tidak boleh lebih dari 100',
            'alamat.max' => 'alamat tidak boleh lebih dari 100',
            'gambar.required' => 'harap isi gambar',
            'gambar.max' => 'gambar tidak boleh lebih dari 10mb',
            'gambar.mimes' => 'format yang di gunakan harus png, jpg, jpeg, dan gif',
            'jk.required' => 'harap isi jenis kelamin',
            'alamat.required' => 'harap isi alamat',
            'departemen_id.required' => 'harap pilih departemen',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->storeAs('gambar', $imageName, 'public');

        $karyawan = new karyawan;
        $karyawan->gambar = $imageName;
        $karyawan->nama = $request->nama;
        $karyawan->jk = $request->jk;
        $karyawan->alamat = $request->alamat;
        $karyawan->departemen_id = $request->departemen_id;
        $karyawan->save();

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil Ditambahkan');
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
        //
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.update', compact('karyawan'), [
            'depar' => departemen::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $karyawan = Karyawan::findOrFail($id);
    // dd($request);
    $request->validate([
        'gambar' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
        'nama' => 'required|max:100',
        'jk' => 'required',
        'alamat' => 'required|max:100',
        'departemen_id' => 'required'
    ],[
        'nama.max' => 'nama tidak boleh lebih dari 100',
        'alamat.max' => 'alamat tidak boleh lebih dari 100',
        'gambar.max' => 'gambar tidak boleh lebih dari 10mb',
        'gambar.mimes' => 'format yang di gunakan harus png, jpg, jpeg, dan gif',
        'nama.required' => 'harap isi nama',
        'alamat.required' => 'harap isi alamat',
    ]);

    if ($request->hasFile('gambar')) {
        // Menghapus file gambar lama
        $oldFilePath = 'gambar/' . $karyawan->gambar;
        if (Storage::disk('public')->exists($oldFilePath)) {
            Storage::disk('public')->delete($oldFilePath);
        }

        // Mengunggah file gambar baru
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->storeAs('gambar', $imageName, 'public');
        $karyawan->gambar = $imageName;
    }

    $karyawan->nama = $request->nama;
    $karyawan->jk = $request->jk;
    $karyawan->alamat = $request->alamat;
    $karyawan->departemen_id = $request->departemen_id;
    $karyawan->save();

    return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $karyawan = Karyawan::findOrFail($id);

            // Menghapus file terkait
            $filePath = 'gambar/' . $karyawan->gambar;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $karyawan->delete();


            return redirect('karyawan')->with('success', 'Data berhasil dihapus.');
    }
}
