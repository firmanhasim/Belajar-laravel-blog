<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    // disini kita akan membuat factorinya untuk melaukan pengimputan data mlik laravel itu sendiri
    public function definition()
    {
        // kdisini kita isi berdasarkan fild yang ada di dalam table Post kita
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)), // sentence yaitu sebuat perintah yang akan melakukan pengimputan kata, mt_rand(2,8) yaitu untuk merandem katanya secara otomatis dengan 2 -> kata paling sedikit dan 8 -> kata paling banyak
            'slug' => $this->faker->slug(), // slug juga sebuah perinta untuk membuat judul url yang suda di sediakan oleh laravel untuk melakukan pengimputan data secara otomatis
            'detail' => $this->faker->paragraph(), // untuk dibuatkan sebuah paragraph

            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''), // untuk membuat paragraphs paling sedikit 5 parag dan paling banyak 10 parag
            // fn = function, kita gunakan colection dan map untuk membuat sebuah kalimat yang dibungkus oleh paragraf dan kita tutup dengan implode('') jangan lupa migrate:fresh --seed

            // untuk category_id kita laukan dlu secara manual disini begitu pula user_id
            'user_id' => mt_rand(1, 3), // untuk melakukan randem dengan menampilkan id 1 sampai 3 penulis
            'category_id' => mt_rand(1, 3) // karena category kita cuma terdapat 2 category saja

            // kemidian kita buat seedersnya yaitu Post::factori(20)->create()
        ];
    }
}
