<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'ini halaman categoryes';
        // jika gunakan guest tidak usah pakai !
        // disini kita akan melakukan pengkondisian agar halaman ini tidak dapat di akses oleh semua user dengan cara
        //if (!auth()->check() || auth()->user()->username !== 'firmanhasim') { //kita akan gunakan auth bawaan dari larael kemudian kita gunakan chek untuk mengecek dan gunakan auth unutk tble user kemudian ambil field username tidak sama dengan firman makan akan di tendang ke halaman abort 
        //  abort(403); // halaman kosong
        //} // dan jika benar kita tampilkan. dan ini kita pindahkan saja dalam file admin midleware kita


        return view('dashboard.category.index', [
            // unutk menampilkan semua data categorynya
            'title' => 'Categoryes',
            'category' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.category.create', [
            'title' => 'Tambah Category',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories' // categories berdasarkan nama table database
        ]);

        Category::create($validasi);
        return redirect('/dashboard/categoryes')->with('success', 'Category baru berhasil di tambahkan!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.category.edit', [
            'title' => 'Edit Category',
            'category' => $category

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $val = [
            'name' => 'required|max:255'
        ];

        // kita akan cek slugnya disini dengan pengkondisian
        if ($request->slug != $category->slug) { // kalau request->slug tidak sama dengan $post->slug.. kita akan kasi val dan kita timpah menggunankan variable
            $val['slug'] = 'required|unique:categories'; // $validasi yang keynya slug kita isi

        }
        //kemudian kita akan validasi disini
        $validasi = $request->validate($val);

        Category::where('id', $category->id)
            ->update($validasi);

        return redirect('/dashboard/categoryes')->with('success', 'Category berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categoryes')->with('success', 'Category berhasil di hapus!');
    }
}
