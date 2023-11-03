<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSave')->name('register.save');

        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');

    });
});



Route::middleware(['auth'])->group(function () {

    Route::get('/', function(){
        return view('welcome');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class , 'index'])->name('dashboad');

    // karyawan
    Route::controller(KaryawanController::class)->prefix('karyawan')->group(function () {
    Route::get('','index')->name('karyawan');
    Route::get('/create','create')->name('karyawan.create');
    Route::post('/store', 'store')->name('karyawan.store');
    Route::get('/edit/{id}', 'edit')->name('karyawan.edit');
    Route::put('/update/{id}','update')->name('karyawan.update');
    Route::delete('/destroy{id}', 'destroy')->name('karyawan.destroy');
    });

    // departemen
    Route::controller(DepartemenController::class)->prefix('departmen')->group(function () {
    Route::get('','index')->name('departmen');
    Route::get('/create','create')->name('departemen.create');
    Route::post('/store', 'store')->name('departemen.store');
    Route::get('/edit/{id}', 'edit')->name('departemen.edit');
    Route::put('/update/{id}','update')->name('departemen.update');
    Route::delete('/destroy{id}', 'destroy')->name('departemen.destroy');
    });

    // proyek
    Route::controller(ProyekController::class)->prefix('proyek')->group(function () {
    Route::get('','index')->name('proyek');
    Route::get('/create','create')->name('proyek.create');
    Route::post('/store', 'store')->name('proyek.store');
    Route::get('/edit/{id}', 'edit')->name('proyek.edit');
    Route::put('/update/{id}','update')->name('proyek.update');
    Route::delete('/destroy{id}', 'destroy')->name('proyek.destroy');
    });

    // penugasan
    Route::controller(PenugasanController::class)->prefix('penugasan')->group(function () {
    Route::get('','index')->name('penugasan');
    Route::get('/create','create')->name('penugasan.create');
    Route::post('/store', 'store')->name('penugasan.store');
    Route::get('/edit/{id}', 'edit')->name('penugasan.edit');
    Route::put('/update/{id}','update')->name('penugasan.update');
    Route::delete('/destroy{id}', 'destroy')->name('penugasan.destroy');
    });

    // catatan
    Route::controller(CatatanController::class)->prefix('catatan')->group(function () {
    Route::get('','index')->name('catatan');
    Route::get('/create','create')->name('catatan.create');
    Route::post('/store', 'store')->name('catatan.store');
    Route::get('/edit/{id}', 'edit')->name('catatan.edit');
    Route::put('/update/{id}','update')->name('catatan.update');
    Route::delete('/destroy{id}', 'destroy')->name('catatan.destroy');
    });

    //penggeluaran
    Route::controller(PengeluaranController::class)->prefix('pengeluaran')->group(function () {
        Route::get('','index')->name('pengeluaran');
        Route::get('/create','create')->name('pengeluaran.create');
        Route::post('/store', 'store')->name('pengeluaran.store');
        Route::get('/edit/{id}', 'edit')->name('pengeluaran.edit');
        Route::put('/update/{id}','update')->name('pengeluaran.update');
        Route::delete('/destroy{id}', 'destroy')->name('pengeluaran.destroy');
    });

    //surat masuk
    Route::controller(SuratController::class)->prefix('surat')->group(function () {
        Route::get('','index')->name('surat');
        Route::get('/create','create')->name('surat.create');
        Route::post('/store', 'store')->name('surat.store');
        Route::get('/edit/{id}', 'edit')->name('surat.edit');
        Route::put('/update/{id}','update')->name('surat.update');
        Route::delete('/destroy{id}', 'destroy')->name('surat.destroy');
    });
});



