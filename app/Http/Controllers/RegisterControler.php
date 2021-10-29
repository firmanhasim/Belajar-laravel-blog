<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // diketik maual unutk menghubungkan dengan model userkita
use Illuminate\Support\Facades\Hash; // kita tambahkan class ini untuk menggunakan Hash


class RegisterControler extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'registrasi',
            'active' => 'login'
        ]);
    }

    // method register (untuk registrasi)
    public function store(Request $request)
    {
        // unutk menampilkan semua data
        //return request()->all();

        // disini kita akan melakukan validasi pada form register kita
        $validatedData = $request->validate([
            'name' => 'required|max:255', // name wajib diisi dan panjang 255 max
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], // dan disini bisa kita lakukan menggunakan array dan unique:users berdasarkaan table users
            'email' => 'required|email:dns|unique:users', // menggunakan format email:dns agar tidak bisa memasukkan format sembarang email
            'password' => 'required|min:3|max:255'
        ]);
        //dd('registrasi berhasil'); // unutk mengecek jika datanya berhsil ditangkap

        // cara 1 kita akan engkripsi password
        // $validatedData['password'] = bcrypt($validatedData['password']); // dan disini kita gunakan bcrypt dan ini sama dengan password Has, 

        //cara 2 engkripsi password, dan ini sama saja dengan cara 1
        $validatedData['password'] = Hash::make($validatedData['password']); // jika gunakan ini perlu menambahkan class di atasnya

        User::create($validatedData); // ikita akan memasukkan kedalam table model User kita

        // tampilan flassdata 
        //$request->session()->flash('success', 'Registrasi berhasill! Silahkan login');
        // kita akan tendang
        return redirect('/login')->with('success', 'Registrasi berhasill! Silahkan login'); // bisa kita lakukan juga pesannya menggunakan ini sama dengan falidasi diatas
    }
}
