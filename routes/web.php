<?php

use App\Http\Controllers\AdminCategory;
use App\Models\User;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\RegisterControler;
use App\Models\Category; // untuk menghubungkan dengan model kita
use App\Http\Controllers\PostControler; // untuk terhubung dengan controler
use App\Http\Controllers\DashboardPostController; //agar terhubung ke controler
use App\Models\Post; // untuk menghubungkan ke model agar terkoneksi dengan model

// agar lebis cepat untuk membuat class kita bisa click kanan kemudian import all classes sehingga akan membuatkan use class baru

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { // untuk mengatur route alur dari web kita
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    // disini kita bisa juga mengirimkan datanya berupa array
    return view('about', [
        "name"  => "Firman Hasim",
        "email" => "Firmanhasim199@gmail.com",
        "image" => "bean.jpg",
        "title" => "About",
        "active" => "about"
        // kemudian kita panggil keynya di view
    ]);
});



// /blog nama urlnya
Route::get('/blog', [PostControler::class, 'index']); //untuk memanggil file controler dan mencari method index agar berjalan

// disini kita akan membuat halaman single post untuk menampilkan halaman baru
//slug untuk menangkap parameter pada method show untuk menampilkan detail
// Route::get('post/{slug}', [PostControler::class, 'show']); // menjalankan controler methot show

// bisa juga kita lakukan cara ini yaitu route banding untuk menggantikan {id} menjadi {data}
Route::get('post/{data:slug}', [PostControler::class, 'show']); // menjalankan controler methot show
// sehingga yang kita kirimkan kedalam Postcontroler adalah {data} dan kita tambahkan {data:slug} untuk mencari data berdasarkan judul slugnya agar yang tampil buka id di dalam urlnya


// RAUTES INI TIDAK DIPAKAI LAGI KARENA SUDA KITA LAKUKAN DI MODEL

// kita akan membuat routes baru untuk mengarahkan <a href="/categories/{{ $post->category->slug }}"> 
// Route::get('categories/{category:slug}', function (Category $category) {  // menggunakan route banding dan category harus sama dengan $category, dan janagn lupa untuk Categorinya kita tambahkan di atas dan bisa klick kanan dan import class

//     return view('post', [
//         'title' => "Category By : $category->name",
//         'active' => "categories",
//         //'post' => $category->posts, // mengambil data dari table post karena kita gunakan forenki dan bisa kita bolak balikkan dari tabel posts kecategori begitu pula sebaliknya dan untuk melakukan ini kita gunakan hasMany bisa lihat di model category
//         //'category' => $category->name
//         'post' => $category->posts->load('category', 'author'),

//         // kemudian disini kita akan membuat view category
//     ]);
// });




Route::get('categories', function () {
    return view('categories', [
        'title' => "Post Categories",
        'active' => "categories",
        'categories' => Category::all() // mengambil dari model category untuk memua data yang ada di model category
    ]);
});


// INI JUGA TIDAK KITA LAKUKAN LAGI
// dsini kita akan membuat model routes kita unutk menampilan semua postingan si penulis berdasrkan penulis yang dipilih
// Route::get('/author/{author:username}', function (User $author) { // User untuk menghubungkan model user

//     // kita akan menggunakan viewnya post untuk menampilkan post si penulis
//     return view('post', [
//         'title' => "Post Author By : $author->name", // untuk mengambil name ny dari table user
//         'active' => "post",
//         //'post' => $author->post,
//         'post' => $author->post->load('author', 'category'), // kita tambahkan load pada halam ini karena dya untuk melakukan detail jika buka detail maka gunakan with() agar melakukan 1 query 
//     ]);
// });


// membuat rautes login
Route::get('/login', [LoginControler::class, 'index'])->name('login')->middleware('guest'); // /login nama url kita kemudian kita akan membuat logincontroler dengan method index, dan jangan lupa di inqlude dengan cara import all calsses unutk itu kita buat dulu 
// unutk membuat file controler kita tinggal tekan ctrl + shif + p

//catatan : kita tambahkan middleware('guaes') bertujuan agar halama ini hanya bisa di akses oleh yang belum lakukan registrasi atau autentikasi dan kita perlu atur method providers file RouteServiceProvider agar mengarah ke halaman utama kita, dan kita tambahkan name pada routes kita dengan name('login) agar web kita tahu bahwa ada route login, dan juga suda terdaftar ke autentikasi middleware sehingga harus ditambahkan name untuk route login

// route unutk login
Route::post('/login', [LoginControler::class, 'login']);

// route untuk keluar
Route::post('/keluar', [LoginControler::class, 'keluar']);

Route::get('/register', [RegisterControler::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterControler::class, 'store']); // raute register kita, kemudian kita akan membuat methid store pada controler register kita

// routes unutk dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth'); // kitah tambahkan ini agar user yang belum login tidak bisa masuk ke halaman dashboard kita


// rote unutk slug
Route::get('/dashboard/posts/chekSlug', [DashboardPostController::class, 'chekSlug'])->middleware('auth');


// kita akan membuat route unutk controler dashboard kita dan ini sda otomatik akan memanggil semua method pada dashboard controler kita
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth'); // tambahkan midleware hanya akan di aksess yang suda login jangan lupa buat classnya di atas
// kemudian kita akan isi raoute kita kedalam controler

// route untuk mengarah ke controler admin
Route::resource('/dashboard/categoryes', AdminCategory::class)->except('show')->middleware('admin'); // middleware yang kita buat
// dan disini kita tidak akan menggunakan method show unutk itu kita tambahkan except pda route kita agar tidak menampilkan method show dan tidak di pakai 
// jika suda kita akan ke halaman controler admin kita method index untuk membatasi siapa saja yang bisa mengakses ini

Route::get('/dashboard/categoryes/checkSlug', [AdminCategory::class, 'checkSlug'])->middleware('admin');
