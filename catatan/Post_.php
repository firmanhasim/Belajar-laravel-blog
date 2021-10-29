<?php

namespace App\Models;

// untuk terhubung ke database karena kita belum gunakan database maka kita hilangkan atw komentari saja
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


// untuk menyimpan data dari postingan kita
class Post
{
    // kita gunakan properti sttic agar mudah digunakan di classnya dan kita gunakan private karena kita ambil di bagian classnya saja
    private static $blog_post = [
        [
            "title" => "Judul Post Kebersiha",
            "slug" => "Judul Post Pertama",
            "author" => "Firman Hasim",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsum, voluptatibus quia obcaecati eius animi veritatis illo fugit minus eveniet provident, sapiente ea libero, debitis optio temporibus perspiciatis. Et enim ratione nihil illum fuga, aut veritatis beatae necessitatibus autem tempora eaque ad cumque qui facere quidem ipsam corrupti, saepe perferendis.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsum, voluptatibus quia obcaecati eius animi veritatis illo fugit minus eveniet provident, sapiente ea libero, debitis optio temporibus perspiciatis. Et enim ratione nihil illum fuga, aut veritatis beatae necessitatibus autem tempora eaque ad cumque qui facere quidem ipsam corrupti, saepe perferendis."
        ],
        [
            "title" => "Judul Post Keaneka Ragaman",
            "slug" => "Judul Post Kedua",
            "author" => "Firman",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsum, voluptatibus quia obcaecati eius animi veritatis illo fugit minus eveniet provident, sapiente ea libero, debitis optio temporibus perspiciatis. Et enim ratione nihil illum fuga, aut veritatis beatae necessitatibus autem tempora eaque ad cumque qui facere quidem ipsam corrupti, saepe perferendis.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsum, voluptatibus quia obcaecati eius animi veritatis illo fugit minus eveniet provident, sapiente ea libero, debitis optio temporibus perspiciatis. Et enim ratione nihil illum fuga, aut veritatis beatae necessitatibus autem tempora eaque ad cumque qui facere quidem ipsam corrupti, saepe perferendis.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsum, voluptatibus quia obcaecati eius animi veritatis illo fugit minus eveniet provident, sapiente ea libero, debitis optio temporibus perspiciatis. Et enim ratione nihil illum fuga, aut veritatis beatae necessitatibus autem tempora eaque ad cumque qui facere quidem ipsam corrupti, saepe perferendis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsum, voluptatibus quia obcaecati eius animi veritatis illo fugit minus eveniet provident, sapiente ea libero, debitis optio temporibus perspiciatis. Et enim ratione nihil illum fuga, aut veritatis beatae necessitatibus autem tempora eaque ad cumque qui facere quidem ipsam corrupti, saepe perferendis."
        ]
    ];

    // membuat methotnya
    public static function all()
    {
        // karena di atas bentuknya static maka kita gunakan keyword self dari oop sama dengan $this-> $blog_post;
        //return self::$blog_post; (sebelum diganti jadi colecr)
        return collect(self::$blog_post); // ini bisa kita gunakan jadi sebuah colection
    }

    // unutuk membuat detail dari post yang kita buat
    public static function find($slug)
    {
        // untuk mengambil self blog diatas
        //$blog = self::$blog_post; (sebelum diganti jadi colector)

        //jika menggunakan colect maka 
        $blog = static::all(); //akan merubah menjadi static untuk mengambil data di atas, sehingga tidak lagi menggunakan lupingan

        //kemudia disini kita akan mencari slug yang sama dengan parameter kita (luping)
        // $new_post = [];
        // foreach ($blog as $p) {
        //     if ($p["slug"] === $slug) {
        //         $new_post = $p;
        //     }
        // }
        // return $new_post; (sebelum diganti jadi colect)
        return $blog->firstWhere('slug', $slug); // akan dipanggil seperti ini yaitu mencari yang pertama di temukan yang dimana slugnya = $slug
    }
}
