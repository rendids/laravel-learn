<?php

namespace App\Http\Controllers;

use App\Models\catatan;
use App\Models\departemen;
use App\Models\karyawan;
use App\Models\pengeluaran;
use App\Models\penugasan;
use App\Models\proyek;
use App\Models\surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = karyawan::count();
        $departemen = departemen::count();
        $proyek = proyek::count();
        $penugasan = penugasan::count();
        $catatan = catatan::count();
        $keluar = pengeluaran::count();
        $surat = surat::count();

        return view('dashboard', compact('karyawan', 'departemen', 'proyek', 'penugasan', 'catatan', 'keluar', 'surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
