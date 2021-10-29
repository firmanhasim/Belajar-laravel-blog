<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User; // agar terhubung ke model
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // kita akan lakukan untuk user dlu
        User::factory(3)->create(); // dan kita gunakan ini untuk menambahkan data untuk mengambil data dari factories sebnayak 5 data dan kita panggil pada terminal kita

        // kita buat untuk melakukan pengimputan Post
        Post::factory(20)->create(); // kita membuat sebuah postingan sebanyak 20 postingan
        // kemudian kita jalankan php artisan migrate:fresh --seed



        // untuk melakukan pengimputan data kita ketikkan seperti yang kita lakukan di tinker dan jangan lupa untuk menambahkan import all calsses sehingga datanya akan mengisi data yang dibawa ini setiap kali pembaharuan
        User::create([
            'name' => 'Firman Hasim',
            'username' => 'firmanhasim',
            'email' => 'Firmanhasim199@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Firman',
        //     'email' => 'Firman@gmail.com', // ini kita komentari karena kita tidak lagi lakukan ini untuk mengimputkan datanya dan yang kita lakukan untuk mengimputkan datanya di folder factory
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programing'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);


        // ini kita komentari saja karena kita suda melakukan pengimputan secara otomatis menggunakan factory

        // Post::create([

        //     'title' => 'Judul Pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'detail' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia voluptates officiis provident, quae, inventore magni corporis voluptatibus vero atque tempore sapiente expedita voluptatem numquam rerum facere nulla molestiae officia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus molestias consectetur beatae quas, officiis necessitatibus natus nulla qui dolorum reprehenderit sed nisi officia accusantium aut aliquam amet ratione minima perferendis.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque.</p>'

        // ]);

        // Post::create([

        //     'title' => 'Judul Ke Dua',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => 'judul-ke-dua',
        //     'detail' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia voluptates officiis provident, quae, inventore magni corporis voluptatibus vero atque tempore sapiente expedita voluptatem numquam rerum facere nulla molestiae officia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus molestias consectetur beatae quas, officiis necessitatibus natus nulla qui dolorum reprehenderit sed nisi officia accusantium aut aliquam amet ratione minima perferendis.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque.</p>'

        // ]);
        // Post::create([

        //     'title' => 'Judul Ke Tiga',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => 'judul-ke-tiga',
        //     'detail' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia voluptates officiis provident, quae, inventore magni corporis voluptatibus vero atque tempore sapiente expedita voluptatem numquam rerum facere nulla molestiae officia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus molestias consectetur beatae quas, officiis necessitatibus natus nulla qui dolorum reprehenderit sed nisi officia accusantium aut aliquam amet ratione minima perferendis.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque.</p>'

        // ]);
        // untuk menjalankan ini kita bisa lakukan perinta php artisan migrate:fresh --seed agar melakukan pembaharuan data secara otomatis
    }
}
