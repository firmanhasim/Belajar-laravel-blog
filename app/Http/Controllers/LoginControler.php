<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // dan ini kita tambahkan class agar auth::atempt kita terbaca

class LoginControler extends Controller
{
    public function index()
    { // login.index menandakan bahwa kita membuat file index kedalam folder login
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    // methot unutk login
    public function login(Request $request) // dan disini bisa kita kasi request
    {
        // disini kita akan lakukan dlu validasi
        $credential = $request->validate([
            'email' => 'required|email:dns', // agar yang di isi haris email
            'password' => 'required'
        ]);
        //dd('berhasil login'); // kita cek dlu apakan validasinya berhasil atau tidak

        // disini kita akan melakukan pengecekkan jika datanya berhasil dimasukkan menggunakan auth::atempt dari laravel
        if (Auth::attempt($credential)) {
            // setelah itu kita generate unutk menghindari teknik haking
            $request->session()->regenerate();

            // kemudian kita akan kirim ke dashboard kita
            return redirect()->intended('/dashboard');
        }

        // disini kita akan tampilkan kesalahan dan jika loginnya gagal dan akan di kembalikan kehalan login secara otomatis
        return back()->with('errorr', 'Gagal login!');
    }

    //method unutk keluar
    public function keluar() // kita bisa juga tidak menggunakan parameter
    {
        // kita akan lakukan ini untuk perintah keluar, dan semua ini kita ambil dari bawaan laravel
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
