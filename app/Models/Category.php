<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    // wajib melakukan ini jika mengisi data menggunakan $category:create
    protected $guarded = ['id']; // hanya fild id yang ngga boleh diisi lain bleh

    //  disini kita akan menghubungkan category dengan post agar bisa di hubungkan menggunakan {hasMany} yaitu satu category bisa dimiliki banyak post
    public function posts() // harus sesuai dengan method yang ada di rautes 'post' => $category->post
    {
        return $this->hasMany(Post::class); // untuk menghubungkan model category dengan model post
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name' // berdasarkan fielt name agar slugnya diambil dari name dan source berasal dari documentasi
            ]
        ];
    }

    // disini kita akan tambahkan method agar yang di eksekusi adalah slugnya yang telah disediakn oleh laravel
    public function getRouteKeyName()
    {
        return 'slug'; // sehingga pada view kita ganti menjadi slug bukan lagi id
    }
}
