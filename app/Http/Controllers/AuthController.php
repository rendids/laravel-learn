<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    public function register()
    {
        return view('Auth.register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|min:4|unique:users,name|max:100',
            'email' => 'required|email|unique:users,email|',
            'password' => 'required|min:5|max:100 ',
            'password_confirmation' => 'required_with:password|same:password'
        ], [
            'name.max' => 'nama tidak boleh lebih dari 100',
            'email.max' => 'email tidak boleh lebih dari 100',
            'name.required' => 'nama tidak boleh kosong',
            'email.email' => 'format yang anda buat bukan email',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'email sudah di gunakan harap gunakan email lain',
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password yang anda masukan kurang dari 5, masukan dengan benar',
            'name.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
            'password_confirmation' => 'Password dan konfirmasi password harus sama'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);

        return redirect('login')->with('message', 'Berhasil membuat user baru');

    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'password' => 'required'
    ],[
        'name.required' => 'harap isi nama',
        'password.required' => 'harap isi password'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // $remember = $request->boolean('remember'); // Mengambil nilai opsi "Remember Me"

    if (Auth::attempt($request->only('name', 'password'), )) {
        $user = Auth::user();
        // $cookie = cookie('remember', $user->id, $remember ? 500 : null); // Membuat cookie "remember_me" dengan masa berlaku 1 tahun jika opsi "Remember Me" dicentang, jika tidak, cookie akan berakhir saat sesi browser ditutup
        return redirect()->route('dashboad')->with('message', 'Login berhasil');
    }

    return redirect()->back()->with('error', 'Username atau password salah. Silakan coba lagi.')->withInput();
}
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('login')->with('message', 'berhasil logout');
    }

    public function profile()
    {
        return view('profile');
    }
}
