<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable; //name space yang harus ada

// dubuat menggunakan php aartisan make:model -m Post pada terminal kita
class Post extends Model
{
    // disini kita akan tambahkan sluggable unutk melakukan pengisian otomatis nanti pada slug kita dan ini wajib kita buat methodnya
    use HasFactory, Sluggable;

    //protected $fillable = ['title', 'detail', 'body']; // agar bisa memasukkan data ke dalam fild mana saja kedalam table sekaligus dan ini penting ditulis, dari ketiga properti diatas adalah yang wajib diisi

    protected $guarded = ['id']; // dan bisa kita gunakan ini juga sdangkan ini kebalikan dari diatas yaitu hanya field id yang jangan diisi dan tidak bisa di ubah

    // bisa juga kita taruh disini
    protected $with = ['category', 'author']; // disini kita akan tambahka sebuah igre dan akan melakukan igre pada model author(user) dan category sehingga melakukan 1 query saja

    // untuk menghubungkan model post dengan category disini kita akan buat bulu method baru denagn nama method berdasarkan model yang dihubungkan
    public function category() // category = relationship
    {
        // kemudan disini kita akan mengembalikan relasi dari model post ini terhadap model kategory, dan satu postingan mempunyai 1 category dengan cara melakukan belongsto pada model categori class
        return $this->belongsTo(Category::class); // untuk menghubungkan model post dengan model category
    }

    public function author() // author = relationship
    {
        return $this->belongsTo(User::class, 'user_id'); // unutk menghubungkan model post dengan user
        // user_id untuk menangkap data yang diketik berdasarkan user_user id
    }

    // disini kita akam membuat methot pencarian
    public function scopeFilter($query, array $filters) // disini kita gunakan methot scopeFilter yang menerima sebuah parameter
    {
        // kemudain kita cek jika ada pencarian
        // if (isset($filters['search']) ? $filters['search'] : false) { // disini akan mengecek jika ada filter searcg maka ? atau tampilkan $filters tersebut jika tidak makan diakan false

        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%'); // kita akan menggabungkan $cari denga where untuk mencari berdasarkan title dan kita gabungkan dengan % dan request('search) dan % lagi agar datanya bisa dicari berdasarkan hurus yang di ketik. dan jika tidak ada maka querynya kita akan lakukan di $cari->get(), dan tambahkan onwhere untuk melakukan pencarian kedalam body

        // disini kita akan menggunakan when untuk melakukan sebuah pencarian untuk mengganti yang di atas 
        $query->when($filters['search'] ?? false, function ($query, $search) { // jika $filters['search'] nda ada maka pilih ?? false dan jka ada maka jalankan functionnya
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        // disini kita akan menambahkan vitur pencarian untuk mrnampilkan pencarian berdasarkan kategori yang dipilih dengan menggunakan callback dan dengan melakukan ini kita tidak butuh rautes lagi
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // disini kita akan return menggunakan join dengan table category sehingga melakukan pencarian yang sesuai berdasarkan kategory dan laravel sudah mempunyai sebuah method yang namanya whereHas dimana query ini punya relationship apa
            return $query->whereHas('category', function ($query) use ($category) { // disini kita gunakan use untuk membaca faribel categori yang diatas, karena kalaw digabungkan tidak terbaca
                $query->where('slug', $category); // slug adalah $category diatas dan ini umum

                // agar ini bisa berfungsi maka kita akan memperbaiki file post kita di filder fiew dan ada dua yang harus diperbaiki yaitu dipostingan pertama 

            });
        });

        // begitupula dengan ini
        //untuk melakukan pencarian berdasarkan author dengan menggunakan erofunction 
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) => // kita gunakan erofunction
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author) // username kita ambil berdasarkan username yang ada di view post kita pada author
            )
        );
    }

    // disini kita akan tambahkan method agar yang di eksekusi adalah slugnya yang telah disediakn oleh laravel
    public function getRouteKeyName()
    {
        return 'slug'; // sehingga pada view kita ganti menjadi slug bukan lagi id
    }

    // method sluggable unutk menentukan slugnya yang diambil dari laravel
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' // berdasarkan fielt title agar slugnya diambil dari title dan source berasal dari documentasi
            ]
        ];
    }
}
