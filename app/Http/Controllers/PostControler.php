<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // agar dapat terkoneksi dengan model kita
use App\Models\Category; // agar dapat terkoneksi dengan model kita
use App\Models\User; // agar dapat terkoneksi dengan model kita

class PostControler extends Controller
{
    // kita akan membuat method defauld dulu
    public function index()
    {
        //dd(request('search')); // untuk mengecek apakah datanya bisa tertangkap ataw tidak, dan jiak suda tertangkap maka kita akan tngkap datanya dengan membuat variable baru

        //$cari = Post::Latest(); //yang akan berisi query dari database, dan akan mencari data didalam Post dan urutkan berdasarkan yang paling baru Post adalah nama table database kita



        // disini kita akan membuat pengkondisian berdasarkan categori atau author yang dipijit

        $title = ''; // disini kita akan membuat variable kosong dengan tujuan jika salah satu category atau author tidak ditekan maka category atau author tidak terisi
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category')); // kita ambil categorynya dalam database category dan model category berdasarkkan slugnya dan kita lakukan request pada category
            $title = ' in ' . $category->name; // dan jika category ditekan makan akan diisi dengan in dan juga nama categori berdasarkan name category yang di tekan
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author')); // berdasarkan model pada user
            $title = ' by ' . $author->name;
        }

        return view('post', [
            "title" => "All Post" . $title,
            "active" => "post",
            // "post" => Post::all() // dibaca mengambil dari model post method all() untuk mendapatkan semua data postingan
            //"post" => Post::latest()->get() // untuk menampilkan semua data berdasarkan yang terbaru
            "post" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() // untuk menampilkan semua data berdasarkan yang terbaru
            // filter kita ambil dalam model Post methot scopeFilter yang diambil filter-nya saja dan akan merequest search


            // ini kita pindahkan di model
            //"post" => Post::with(['author', 'category'])->latest()->get() // disini kita akan tambahka sebuah igre dan akan melakukan igre pada model author(user) dan category sehingga melakukan 1 query saja
        ]);
    }

    // method show menggunakan model route banding
    public function show(Post $data) // $data harus sama dengan fariabel yang dikirim di routes file web.php
    // dibaca mengirim model kedalam controler dan diikat kedalam $data, dan kita gunakan cara ini untuk menampilkan data bukan lagi menggunakan id, untuk menjalan kan ini kita buat field baru di dalam migration kita dengan nama slug (bebas)
    {
        return view('pos', [
            "title" => "single post",
            "active" => "post",
            //"post" => Post::find($id) // method all dan method find suda tersedia memang dalam laravel sehingga tidak perlu membuat mothod find kedalam model dan akan otomatis akan menampilkan datanya
            "post" => $data // sehingga yang dikirimkan hanya $data nya
        ]);
    }
}
