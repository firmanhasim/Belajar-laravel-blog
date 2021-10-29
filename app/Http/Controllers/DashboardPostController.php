<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category; // disini kita akan memanggil model category kita
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // jagan lupa tambahkan ini
use \Cviebrock\EloquentSluggable\Services\SlugService; // dan jangan lupa kita use

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // unutk menampilkan semua data postingan kita
    public function index()
    {
        // disini kita akan tampilkan data postigan kita
        return view('dashboard.posts.index', [
            'title' => 'Postingan',
            //'tampil' => Post::all() // untuk menapilkan semua data postingan 
            'tampil' => Post::where('user_id', auth()->user()->id)->get() // untuk menapilkan data postingan berdasarkan yang login(id)
            // kita akan ambil data postingan berdasarkan user id samadengan yang sedang login(auth)
            // kemudian kita luping kehalaman index kita
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    //unutk menampilakn halaman tambah postingan kita
    public function create()
    {
        //kita akan memanggil view kita disini
        return view('dashboard.posts.create', [
            'title' => 'Tambah Postingan',
            'categories' => Category::all() // unutk menampilkan semua kategory
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // unutk menjalankan fungsih tambahnya dan untuk menangakap data yang di inputkan
    public function store(Request $request)
    {
        //disini kita akan coba untuk menyimpan image sementara dengan cara return agar data dibawahnya tidak di exekusi
        //return $request->file('image')->store('post-image'); ini kita matikan karena berhasil pengecekanya
        // kita akan request dengan mengambil isi file('image')-nya yang ada di view create post inputan kita tdi kemudian kita panggil method store kemudian kita simpan gambarnya di folder post-image yang telah disediakan store->app->post-image

        // kita akan melakukan validasi
        $validasi = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', // walaupun uniqnya sda di tangani sluggalbe jadi kita buat saja walaupun tidak jadi masalah
            'category_id' => 'required',
            'image' => 'image|file|max:1024', // max, min, size, dan kalau size ukurannya harus sama persis, image = harus gambar dan harus pakai file agar tidak di anggap karakter
            'body' => 'required'
        ]);

        // disini kita lakukan pengecekan jika usernya tdak menambahkan gambar
        if ($request->file('image')) { // jika ada request file('image') maka kita lakukan falidasi
            $validasi['image'] = $request->file('image')->store('post-images'); // folder post-images bebas kita kasi nama dan ini lokasi penyimpanan gambar kita
        } // dan jika requestnya tidak ada maka request diatas tidak dijalannkan sehingga akan masuk pada databse langsung tanpa image


        // disini kita akan melakukan input baru unutk filt user_id dan detail kita karena itu blum kita lakukan di atas
        $validasi['user_id'] = auth()->user()->id; //ini agar user_id dari table posts kita bisa terikat dengan id yang ada di table user sehingga user_id bisa terisi dari id

        // kemudian kita lakukan ini juga agar pada tampilan blog kita tidak tampil semua isi postingan kita dan ini kita akan ambil dari body kita
        $validasi['detail'] = Str::limit(strip_tags($request->body), 200); // Str nya janagn lupa kita support yang di ambil dari documentasi laravel
        // kita akan batasi halaman body dan tampil sebagai detail menggunakan Str::limit dari isi body post sehingga yang tampil cma 200 kata saja dan tambahkan strip_tags agar sintax htmlnya tidak kebawa dala blog kita

        // kemudian kita akan melakukan insert data dengan memanggil model post kita
        Post::create($validasi); // gini saja

        return redirect('/dashboard/posts')->with('success', 'Postingan baru berhasil di tambahkan!'); // unutk menampilkan pesan sukses pada penambahan data 

        // dan kemudian kita buat pengkondisian pada file index post kita unutk memberitahukan jika ada postingan baru yang berhasil ditambahkan
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // berfungsi untuk lihat detail
    public function show(Post $post)
    {
        //disini kita akan tampilkan data detail kita
        return view('dashboard.posts.show', [
            'title' => 'Tampilkan Postingan',
            'detail' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // unutk menampilkan view ubah data kita
    public function edit(Post $post)
    {
        //kita akan memanggil view kita disini
        return view('dashboard.posts.edit', [
            'title' => 'Ubah Postingan',
            'post' => $post, // unutk menampilakn data post kita yang mw di edit
            'categories' => Category::all() // unutk menampilkan semua kategory
            // kemudian kita akan uabh view edit kita untuk menangkap datanya
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // unutk menjalankan proses ubah data
    public function update(Request $request, Post $post)
    {
        // disini kita akan jalankan validasi update kita
        $bebas = [
            'title' => 'required|max:255',
            //'slug' => 'required|unique:posts', //untuk slugnya kita akan lakukan di luar dan jangan kita taruh disini dan kita akan laakukan pengecekan kondisi
            'category_id' => 'required',
            // disini kita akan tambahkan validasi gambar
            'image' => 'image|file|max:1024', // max, min, size, dan kalau size ukurannya harus sama persis, image = harus gambar dan harus pakai file agar tidak di anggap karakter
            'body' => 'required'
        ];



        // kita akan cek slugnya disini dengan pengkondisian
        if ($request->slug != $post->slug) { // kalau request->slug tidak sama dengan $post->slug.. kita akan kasi validasi dan kita timpah menggunankan variable
            $bebas['slug'] = 'required|unique:posts'; // bebas yang keynya slug kita isi

        }

        //kemudian kita akan validasi disini
        $validasi = $request->validate($bebas);

        // disini kita lakukan pengecekan jika usernya tdak mengubah gambar
        if ($request->file('image')) { // jika ada request file('image') maka kita lakukan falidasi

            // disini kita akan cek gambarnya jika gambar lamanya ada kita akan hapus dengan memanggil librari Storage
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama); // dan jangan lupa kita use
            } // jika gambarnya suda di uplad aka kita akan lakukan gambar baru
            $validasi['image'] = $request->file('image')->store('post-images'); // folder post-images bebas kita kasi nama dan ini lokasi penyimpanan gambar kita
        } // dan jika requestnya tidak ada maka request diatas tidak dijalannkan sehingga akan masuk pada databse langsung tanpa image


        // disini kita akan melakukan input baru unutk filt user_id dan detail kita karena itu blum kita lakukan di atas
        $validasi['user_id'] = auth()->user()->id; //ini agar user_id dari table posts kita bisa terikat dengan id yang ada di table user sehingga user_id bisa terisi dari id

        // kemudian kita lakukan ini juga agar pada tampilan blog kita tidak tampil semua isi postingan kita dan ini kita akan ambil dari body kita
        $validasi['detail'] = Str::limit(strip_tags($request->body), 200); // Str nya janagn lupa kita support yang di ambil dari documentasi laravel
        // kita akan batasi halaman body dan tampil sebagai detail menggunakan Str::limit dari isi body post sehingga yang tampil cma 200 kata saja dan tambahkan strip_tags agar sintax htmlnya tidak kebawa dala blog kita

        // kemudian kita akan melakukan update data dengan memanggil model post kita
        Post::where('id', $post->id)
            ->update($validasi); // gini saja kita akan ambil id dari $post->id kemudian kita upate validasinya

        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil di ubah!'); // unutk menampilkan pesan sukses pada penambahan data 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // untuk menghapus data
    public function destroy(Post $post)
    {
        // perintah destroy unutk menghapus sama dengan delete
        // disini kita akan cek gambarnya agar ikutan terhapus pada penyimpanan gambar kita hapus dengan memanggil librari Storage
        if ($post->image) {
            Storage::delete($post->image); // dan jangan lupa kita use
        }
        Post::destroy($post->id); // gini saja kita akan mengambil model post kita kemudia kita hapus post berdasarkan id yang di pilih karena kita gunakan slug maka di dalam viewnya kita akan panggil slugnya untk menghapus datanya
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil di hapus!');
    }

    // method unutk menerima request permintaan slugnya shingga ini akan menangani jnis slug yang unig sehingga tidak akan sama
    public function chekSlug(Request $request)
    {
        // ini diambilka dari ghitub dan kita copy dan jangan lupa kita use agar slugservicenya berjalan
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        //create slug diamabil dari class Post terum ambil filtnya 'slug' dan kita request titlenya yang si ambil dari ?title=' + title.value
        return response()->json(['slug' => $slug]);
        // kita akan return sebagai respon agar bisa di olah oleh method json yang ada di create post kita dalam bentuk json yang keynya slug sehingga kita masukkan $slug-nya
    }
}
