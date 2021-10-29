<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <p>

        PROSES PENGINSTALAN LARAVEL DI WINDOWS

        1. hal yang pertama kita lakukan adalah membuat folder baru untuk memnyimpan palikasi laravel kita di dictori
        mana saja
        2. kemudian kita arahkan terminal kita agar mengarah kedalam terminal kita (terminal yang digunakan git bush)
        dengan cara

        -> {cd D: }'agar mengarah ke local drive kita yang terdapat folder yang telah kita buat' kemudian enter
        -> {cd aplication} 'nama folder yang kita buat dan didalam ini kita akan mendownload aplikasi laravel kita'
        kemudian enter untuk menginstal laravel kita dengan cara
        -> {composer create-project laravel/laravel coba-laravel} 'folder coba-laravel adalah nama aplication kita'
        -> {ls} 'untuk mengecek folder apa saja yang ada dalam folder aplication'
        -> {cd coba-laravel} 'agar kita masuk kedalam folder aplication kita yaitu coba-laravel'
        -> {php artisan serve} 'untuk menjalankan aplication kita dan akan diberikan alamat url aplikasi kita dan kita
        copy dan paste di browser kita'

        3. cara kedua untuk mengistal aplication laravel kita, sebelum itu kita matikan dulu terminal kita dengan Ctrl +
        C

        -> {composer global require laravel/installer} untuk mengintal aplication kita secara global kedalam folder
        coba-laravel kita
        -> {cd ..} untuk melakukan itu yang pertama kita lakukan yitu kita naik dulu satu folder ataw masuk kedalam
        folder aplication kita, kemudian kita ketik {laravel} unutk mengecek invariement kita dan akan menampilakn

        => laravel installer 4.2.7
        usage:
        cammand [option] [arguments] dan lailain
        jika ini suda tampil berarti aman, dan jika belum maka kita akan seting terlebih dahulu dengan cara
        => klick kanan di start menu
        => System
        => kemudian didalama About kita pilih Advanced System Settings
        => pilih Environment Variable
        => Kemudian di system variable pilih Path dan pilih edit
        => kemudian pilih New
        => didalam itu kita akan copikan {%USERPROFILE%\AppData\Roaming\Composer\vendor\bin} yang diambil dari documentasi laravel 'the laravel installer' dan setelah itu kita ok, dan ini dilakukan sekali saja
        => jika suda lakukan konvigurasi di atasa kita akan cek kembali dengan cara ketik {laravel} kedalam folder aplication kita

        -> jika suda kita akan masukkan perintah {laravel new coba2-laravel} kedalam folder aplication untuk membuat folder aplication 
           kita
        -> untuk menjalankan nya kita masuk dulu kedalam aplication {cd coba2-laravel} dan ketikkan {php artisan serve}

        jika suda kita akan menjalankan aplication kita dengan menggunakan [valet] sehingga ketika menjalankan aplication kita, tidak perlu menjalannkan menggunakan php artisan secara berulang-ulang, unutk lebih jelasnya kita bisa liha documentation dari laravel yaitu [Valet], dan untuk melakukan ini kita perlu download valetnya dari composer, sebelum itu kita buka dlu [Packagist.org] utuk melihat documentasi valet

        -> dalam pencarian kita ketikkan {valet-windows} dan akan pilih {cretueusebiu/valet-windows} dan untuk melakukan ini kita wajib mempunyai php 8 ataw paling rendah php 7 dan sda menginstal composer php -v dan composer -v untuk cek versi php dan composer
        -> dan jika suda tersedia maka kita akan instal {composer global require cretueusebiu/valet-windows} dan bisa kita lakukan di folder mana saja karena diinstal secara global
        -> setelah selesai kita akan install valetnya {valet install} dan ini dilakukan sekali saja kemudian tekan yes saja sampai seterusnya dan akan tampil valet installed successfully
        -> setalh ini kita harus lakukan convigurasi secara manual DNS kita dan kita ketik saja {manually configure} dalam documentasi nya
        -> dan bisa kita pilih windows 10 unutk confignya dan distu akan menampilkan cara mengconfignya
        -> dan karena valet kita menggunakan port 8080 maka kita akan ubah juga configurasi dari xampp kita agar tidak bentrok
            -> buka xampp 
            -> pilih config pada apache -> apache (httpd.coof)
            -> kemudian kita akan cari port nya dan kita ubah menjadi 8080
            -> agar cepat bisa kita tekan Ctrl + f ataw pilih edit kemudian fine
            -> directionnya kita pilih down dan kita ketikkan 80
            -> kemudian fine next, nanti akan ada listen 80 
            -> kita akan ubah menjadi listen 8080 
            -> dan serveename localhost: 8080
            -> jika suda maka di save, 
           dan sekarang untuk mengakses htdocs xampp kita kita ketikkan localhost:8080
        -> dan kemudian kita akan letakkan valet kita kedalam folder aplication kita sehingga aplikasi yang berada dalam folder aplication bisa menggunakan valet
        -> {valet park} maka akan timbul 
           ->this directory has been added to valet's paths.
        jika suda otomatis semua aplikasi laravel kita bisa kita akses dengan memanggil nama folder laravel kita [coba-laravel.test]
        dan tidak perlu menggunakan php artisan serve dan tidak perlu jalankan xampp
        -> unutk mengaktifkan kembali web kita tinggal kita lakukan {valet start}


    </p>

    <p>

      CARA CONFIGURASI LARAVEL

        1. hal pertama ynang kita lakukan adalah mengganti base url kita pada file .env
        menjadi http://coba-laravel.test/
        dan menggandi app_name mejdai nama project kita dan bebas
        dan kita akan menyimpan nama database kita di sini .env
        - untuk membuat table database kita bisa membuatnya lewat terminal denga memberikan perintah {php artisan
        migrate} maka akan otomatis dibuatkan table, dan untuk mengeceknya kita bisa cek di database dan akan ada folder
        migration dan {php artisan migrate:rollback} yaitu untuk menghilangkan tablenya, untuk {php artisan
        migrate:fresh} unutk menghapus serta membuat table baru
        - dan untuk menghapus salah satu field dari tabel kita bisa saja menghapus secara langsung dari folder migration
        table users'contoh' dan ketikan kembali {php artisan migrate:fresh} pada terminal makan akan otomatis field akan
        otomatis terhapus di phpmyadmin juga, dan untuk menambahkan field lgi maka kita tinggal tambahkan lagi di file
        tersebut dengan tipe datanya dan kemudian kita freskan lgi
        - untuk menambahkan datanya kita bisa gunakan eloquent orm untuk mempermudah melakukan proses pengimputan tampa
        harus mengisi kedalam phpmyadmin caranya kita ketikkan {php artisan tinker} kedalam terminal kita
        -> psy Shell v0.10.8 ..... 'jika tampil seperti ini selanjutnya kita masukan user yang kita inginkan dengan cara
        -->'
        -> $user = new App\Models\User; atau $user = new User; '$user adalan nama table kita, maka akan tampil -->'
        -> App\Models\User {#3...} atau Aliasing 'User' to 'App\Models\User'.... 'kemudian kita isikan datanya berdasarkan fild yang berada di folder models file user' cara mengisinya -->
                -> $user->name = 'firman hasim' 'kemudian enter'
                -> $user->email = 'firman@gmail.com' 'enter lagi'
                -> $user->password = bcrypt('12345') 'untuk pembuatan password menggunakan cara ini, dan enter lgi'
                -> $user->save() 'untuk menyipan datanya' 
                -> $user all() 'untuk menampilkan semua data yang telah kita isi'
            - untuk menambahkan user baru maka caranya sama yaitu $user = new User;
                -> $user->first() 'untuk menampilkan data pertama'
                -> $user->find(2) 'untuk menampilkan data yang idnya 2'
                -> $user->findOrFail(200) 'akan menampilkan erro jika datanya tidak ada, dan akan ditemukan jika datanya ada'
                -> $user::pluck('title') 'hanya untuk mengambil semua judulnya saja'

        2. untuk membuat folder view berada di folder recourses begitupila file routs
        3. untuk membuat file css kita bisa buat di
        folder public
        4. untuk membuat controler, berada di folder Http
        5. untuk membuat model kita bisa buat mengunakan laravel artisan yaitu ctrl + shif + p kemudian ketikan artisan
        dan pilih untuk membuat file apa pada model begitupula cara membuat controler

        MENGHUBUNGKAN MODEL KE DATABASE

        1. pertama yang kita lakukan membuat sebuah model melalui terminal kita (Git) kedalam folder coba-laravel
            -> untuk membuat model kita ketikkan perintah {php artisan help make:model} kedalam terminal kita, cara ini untuk membuat model beserta migrasinya dengan 1 kali koment, dan maka akam muncul tampilan seperti dibawah ini yaitu tampilan untuk membuat model
            $ php artisan help make:model
            Description:
              Create a new Eloquent model class
            
            Usage:
              make:model [options] [--] <name>
            
            Arguments:
              name                  The name of the class
            
            Options:
              -a, --all             Generate a migration, seeder, factory, policy, and resou
            rce controller for the model
              -c, --controller      Create a new controller for the model
              -f, --factory         Create a new factory for the model
                  --force           Create the class even if the model already exists
              -m, --migration       Create a new migration file for the model
                  --policy          Create a new policy for the model
              -s, --seed            Create a new seeder for the model
              -p, --pivot           Indicates if the generated model should be a custom inte
            rmediate table model
              -r, --resource        Indicates if the generated controller should be a resour
            ce controller
                  --api             Indicates if the generated controller should be an API c
            ontroller
              -h, --help            Display help for the given command. When no command is g
            iven display help for the list command
              -q, --quiet           Do not output any message
              -V, --version         Display this application version
                  --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
              -n, --no-interaction  Do not ask any interactive question
                  --env[=ENV]       The environment the command should run under
              -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output,
             2 for more verbose output and 3 for debug

             -> kemudian untuk membuat modelnya bisa kita ketikan {php artisan make:model -m Post (Post nama file kiat)} untuk membuat model beserta migrasinya -m diambil dari atas, maka otomatis akan dibuartkan 1 buah file model yang bernama post.php beserta table databasenya
             -> setelah itu kita buat fild table di folder migration yang kita buat tdi   

    </p>
  
      untu pemanggilan bisa juga kita lakukan dengan cara ini untuk memasukkan sekaligus untuk semua field kedalam table kita
      untuk kita kita perlu buat ->protected $fillable = ['title', 'detail', 'body'];<- kedalam folder model kita kita untuk memalukan pengimputan sekaligus kedalam table kita. dalam model kita gunakkan ->$fillable<-

      cara mengisinya dengan caranya ketikkan seperti ini dan tidak boleh menggunakan enter

      

      Post::create([
        'title' => 'Judul Ke Tiga',
        'slug' => 'judul-ke-tiga',
        'detail' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem.',
        'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia voluptates officiis provident, quae, inventore magni corporis voluptatibus vero atque tempore sapiente expedita voluptatem numquam rerum facere nulla molestiae officia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus molestias consectetur beatae quas, officiis necessitatibus natus nulla qui dolorum reprehenderit sed nisi officia accusantium aut aliquam amet ratione minima perferendis.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque.</p>'
      ])

      untuk mengisinya ulang kita harus ctrl + c untuk mereset ulang
      untuk mengubah datanya kita bisa ketikkan perintah 
      -> Post::find(3)->update(['title' => 'Judul Ketiga Berubah']) dan ini bisa berubah karena kita telah perbolehkan menggunakan $guarded pada model kita, find(3) yaitu mengambil id ke 3

  
    <p>

      MASUK MATERI POST KATEGORY & ELOQUENT RELATIONSHIP

      1. petaman kita buat dulu folder model kita beserta migrationnya kedalam terminal kita {php artisan make:model -m Category}
         -> pertama kita akan membuat fild table pada migration category kita dan setiap kali membuat table kita lakukan php artisan migrate:freh untuk melakukan pemulihan ulang pda table kita
         -> unutk membuat kategori kita harus menghubungkan table kategori dengan table post dengan memlakukan forenki kedalam table migrate post.
         -> setelah itu kita akan mengisikan datanya secara manual {php artisan tinker} {$category = new Category} maka akan tampil
            => App\Models\Category {#3448}
            >>> $category->name = 'Programming'
            => "Programming"
            >>> $category->slug = 'programming'
            => "programming"
            >>> $category->save()
            => true
            atau bisa juga
            Category::create([
              'name' => 'Personal',
              'slug' => 'personal'
            ]) untul melakukan cara ini jangan lupa gunakan fillable pada model kita jika sda buat jangan lupa ctrl+d pada terminal
         -> kemuadian kita juga akan mengisi table post kita dengan ini sebanyak 3x juga berdasarkan data yang ada pada table category
            Post::create([
              'title' => 'Judul Ke Tiga',
              'category_id' => 3, 
              'slug' => 'judul-ke-tiga',
              'detail' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem.',
              'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis mollitia voluptates officiis provident, quae, inventore magni corporis voluptatibus vero atque tempore sapiente expedita voluptatem numquam rerum facere nulla molestiae officia. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus molestias consectetur beatae quas, officiis necessitatibus natus nulla qui dolorum reprehenderit sed nisi officia accusantium aut aliquam amet ratione minima perferendis.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excepturi neque.</p>'
            ])
            kita gunakan 'category_id' => 1, agar dapat mengikat data category kita berdasarkan id
         -> selanjutnya kita akan menghubungkan model post dengan categori dengan cara melakukan belongsto
         -> jika suda maka kita akan tes kedalam teminal kita dengan cara mengambil sala satu postingannya
            $ php artisan tinker
            Psy Shell v0.10.8 (PHP 8.0.9 — cli) by Justin Hileman
            >>> $post = Post::first()
            [!] Aliasing 'Post' to 'App\Models\Post' for this Tinker session.
            => App\Models\Post {#4172
                  id: 1,
                  category_id: 1,
                  title: "Judul Pertama",
                  slug: "judul-pertama",
                  detail: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
            molestias sit natus non mollitia repellat neque exercitationem.",
                  body: "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
              molestias sit natus non mollitia repellat neque exercitationem, doloribus ratio
            ne maiores tenetur tempore officia. Suscipit cupiditate optio commodi excepturi
            ipsum assumenda. Dignissimos vitae ex, facere eum aliquid vero omnis ipsa nam re
            pellendus, porro error cupiditate doloribus nemo? Repudiandae porro officia corr
            upti facere provident consequuntur, odio atque? Dolores suscipit vel nihil tempo
            re consectetur, nobis inventore iure enim modi excepturi neque. Placeat fugiat e
            sse expedita iste deleniti impedit eveniet, corporis velit nemo doloribus. Lorem
              ipsum dolor sit amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit
            amet, consectetur adipisicing elit. Tempora molestias sit natus non mollitia rep
            ellat neque exercitationem, doloribus ratione maiores tenetur tempore officia. S
            uscipit cupiditate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex
            , facere eum aliquid vero omnis ipsa nam repellendus, porro error cupiditate dol
            oribus nemo? Repudiandae porro officia corrupti facere provident consequuntur, o
            dio atque? Dolores suscipit vel nihil tempore consectetur, nobis inventore iure
            enim modi excepturi neque. Placeat fugiat esse expedita iste deleniti impedit ev
            eniet, corporis velit nemo doloribus. Lorem ipsum dolor sit amet consectetur adi
            pisicing elit. Omnis mollitia voluptates officiis provident, quae, inventore mag
            ni corporis voluptatibus vero atque tempore sapiente expedita voluptatem numquam
              rerum facere nulla molestiae officia. Lorem ipsum dolor sit amet consectetur, a
            dipisicing elit. Delectus molestias consectetur beatae quas, officiis necessitat
            ibus natus nulla qui dolorum reprehenderit sed nisi officia accusantium aut aliq
            uam amet ratione minima perferendis.</p><p>Lorem ipsum dolor sit amet, consectet
            ur adipisicing elit. Tempora molestias sit natus non mollitia repellat neque exe
            rcitationem, doloribus ratione maiores tenetur tempore officia. Suscipit cupidit
            ate optio commodi excepturi ipsum assumenda. Dignissimos vitae ex, facere eum al
            iquid vero omnis ipsa nam repellendus, porro error cupiditate doloribus nemo? Re
            pudiandae porro officia corrupti facere provident consequuntur, odio atque? Dolo
            res suscipit vel nihil tempore consectetur, nobis inventore iure enim modi excep
            turi neque.</p>",
                  public_at: null,
                  created_at: "2021-09-24 09:08:22",
                  updated_at: "2021-09-24 09:08:22",
                }
            >>>
         -> jika udah benar melakukan relasinya kalau kita ketik {$post->category} maka akan dicarikan category yang sesuai maka akan muncul
            >>> $post->category
            => App\Models\Category {#4135
                  id: 1,
                  name: "Programming",
                  slug: "programming",
                  created_at: "2021-09-24 08:43:10",
                  updated_at: "2021-09-24 08:43:10",
                }
         -> untuk mengecek ini categorynya apa bisa kita ketikan {$post->category->name} tanpa harus melakukan join manual
            >>> $post->category->name
            => "Programming"

         -> kemudian kita akan terapkan kedalam web kita, untuk melakukannya kita buka view pos.php     
        </p>

        <p>

          MASUK MATERI DATABASE SEEDER
          
          seder untuk mempopulasi isi dari table kita
          1. untuk itu kita buka folder seeders dan untuk menjalankan tablenya kita ketikkan {php artisan db:seed}
             dan dilama file seeders kita akan lakukan sideng seara manual yaitu seperi apa yang kita lakukan ditinker kita akan melakuknya di seeder dengan mengisikan datanya secara otomatis
             -> dan untuk mengisi table baru yang kita lakukan migrate ulang dengan table kita agar tidak terjadi pemasukkann data yang   sama dan untuk mengatasi itu yang kita lakukan cukup ketikkan {php artisan migrate:fresh --seed} agar data yang dihapus akan mengisi lagi


          MASUK MATERI FAKTORY & FAKER

          INGATTT SETIAP KALI ADA PERUBAHAN DATA LAKUKAN {php artisan migrate:fresh --seed}

          1. faktori adalah pabrik pembuat data palsu dan dan langsung terhubung dengan librarinya yaitu faker
             dan fakeer juga bisa kita ubah datanya menjadi bahasa indonesia dengan cara
             -> membuka folder config
             -> kemudian membuka file app.php
             -> dan kita cari tulisan 'fallback_locale' => 'en', dan kita tambahkan menjadi 'fallback_locale' => env('FAKER_LOCALE', 
                'en_US'),
                untuk membaca faker  local kita yang berada di file env, untuk itu kita akan membuat faker localenya di env terlebidahulu
             -> selanjutnya buka file .env dan tambahkan FAKER_LOCALE=id_ID untuk mengubah menjadi bahasa indonesia
             -> kemudian kita akan melakukan pengimputan menggunakan factory untuk melakukan pengimputan secara otomatis bukan lgi 
                menggunakan seeders dan untuk pemanggilannya kita lakukan di seeders
                => untuk itu kita buat dlu file factory kita sendiri dengan ketikkan {php artisan make:factory PostFactory} PostFactory = 
                   nama file kita, dan untuk membuat satu paket yang mempunya migration factory dan seeders kita lakukan perinta {php artisan make:model NameFolde -mfs} agar dibuatkan satu paket 
                => jika file PostFactory kita suda dibuat maka kita buka
                   jika suda melakukan factory makan kita menuju ke tahap berikutnya

             -> kemudia disini kita akan membuat nama penulisnya menamapilkan semua postingan yang dibuat oleh si penulis
                -> kita akan membuat routes baru untuk menampilkan postingan berdasarkan siapa yang tulis

        </p>

        <p>

          MASUK MATERI N+1 PROBLEM

          n+1 yaitu proses pemanggilan query secara berulang ulang sehingga akan mengakibatkan performan website kita menjadi lemot saat dibuka karena melaukkan luping 
          dan untuk mengatasi itu kita bisa lakukan penginstalan sebuah library yang namanya clockword laravel
          -> cara menginstalnya dengan cara {composer require itsgoingd/clockwork} didalam folder laravel kita
          dan untuk melakukan clockwork kita lakukan yang namanya igerloading dalam laravel
          1. untuk melakukan igerloading, yang kita lakukan adalah melakukan perubhan pada conttroler ataw bisa juga didalam model Post 
             kita dengan menambahkan with([])
             -> mrnuju ke halaman controler uantuk semua pemanggilan yang memanggil menggunakan all atw latest
          2. dan kita lakukan juga {lazy iger loading} pada routes kita sehingga tidak lemot dengan melakukan load('author', 'category') 
             pada route kita agar pada saat proses detailya tidak lemot dan melakukan 1 query saja dan letakkan pada setiap route
             -> menuju kehalaman route untuk semua yang menggunaka detail berdasarkan id
          3. dengan melakukan ini maka website kita akan melakukan performance yang cepat 

        </p>

        <p>

          MATERI REDESIGN UI

          1. disini kita akan membuat tampilan blog kita dengan menambahkan sebuar card dari bostrap pada view post kita
             dan kita akan melakukan pengkondisian unutk meakukan penghitungan jumlah postingan sehingga jumlah cartnya akan banyak sesuai dengan jumlah postingan
             -> untuk menampilkan gambarnya kita bisa mengambilnya di unplash yang kita panggil api-nnya
                kita akan buka alamatnya di source.unplash.com dan kita ambil urlnya {https://source.unsplash.com/1600x900/?nature,water} unutk menghubungkan gambar kita dengan unplash dan kita masukkan categorinya {{ $post[0]->category->name }} sehingga menjadi https://source.unsplash.com/1600x900/?{{ $post[0]->category->name }}

        </p>

        <p>

          MATERI SEARCHING & PAGINATION

          1. untuk membuat vitur pencarian kita akan membuat tampilannya dihalaman Post.blade kita
             -> untuk menjalankan vitur search nya kita akan mengarahkan ke routenya agar menuju ke bagian raoute controler yaitu
                postControler methot index
             -> untuk itu pada saat di controler kita akan cek apakah pencarian kita menagkap datanya atw tidak
             -> jika suda tertangkap datanya maka selanjutnya kita akan query datanya dengan membuat fariable baru yaitu 
                $post = Post::Latest(); 
             -> setelah itu kita akan membuat methot baru dalam model Post kita dengan nama methot scopeFilter()
             -> kemudian setelah methotnya dibuat maka kita cek jika ada pencarian, dan kita cek kedalam Model Post kita.
             -> disini bisa juga kita menggunakan {when} untuk melakukan sebuah pencarian kedalam model kita post
             -> dan kita akam menambahkan juga query pencarian berdasarkan kategori yang yang dicari sehingga jika dya berada dalam
                sala satu kategori maka akan melakukan sebuah pencarian dalam kategory tersebut tidak kita gunakan
             -> jika suda melakukan pencarian berdasarkan category dan juga berdasarkan author maka kita akan membuat juga pada bagian 
                controler unutk menentukan all post apa yang telah di cari berdasarkan author atw category
             -> menuju controler membuat pengkondisian 
             -> sehingga rautes kita yang berada di web tidak dipakai karena suda dilakukan di model unutk melakukan pencarian

          2. kemudian kita akan membuat fitur pagination 
             disini laravel suda menyediakan fitur tersebut dan pada halaman controler kita cukup kita mengganti get yang dibawah ini menjadi paginate
             -> "post" => Post::latest()->filter(request(['search', 'category', 'author']))->get() 
             -> "post" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7) unutk memberikan 7 postingan perhalaman
             -> dan kita tambahkan withQueryString() agar ketika kita melakukan pencarian berdasarkan kategory atw author maka ketika kita berada di salah satu halaman tersebut maka paginationnya akan melakukan request pada kategory tersebut
             -> kemudian di halaman view post kita tambahkan  {{ $post->link() }} untuk memberikan tampilan boostrap
             -> untuk melakukan tampilan pada paginate kita, kita perlu tambahkan Paginate::useBootstrap() pada folder providers file appserviceproviders

        </p>

        <p>

          MATERI VIEW LOGIN & REGISTRATION

          1. kita akan membuat tampilan login 
            -> pertama kita akan tambahkan style css dari bootstrap unutk menampilkan icon bostrapnya yang diambil dari icon dsn botstrap
            -> kita akan membuat raoutes login kita pada file web kita
            -> kemudian kita akan membuat file logincontroler kita pada folder controler
            -> setelah membuat controler kta akan membuat view login kita
            -> unutk membuat tampilan kita perlu mendownload tampilan login kita pada bostrap
            -> dan kemudian kita pastekan pada file index kita pada folder view
            -> dan untuk css nya kita akan taruh pada folder [public/css file style.css] untuk menyimpan css kita
            -> setelah kita telah mengcopy paste template kita maka kita akan membuat controler unutk registrasi kita beserta view registrasi kita caranya sama seperti pembuatan login kita

        </p>

        <p>

          MATERI BACKAND REGISTRATION

          1. pertama kita akan memberikan action dan method pada form registration kita
            -> setelah memberikan action kita akan membuat route pada file web kita dan kita tambahkan @csrf unutk menambah sistem keamanan pada web kita
            -> setelah membuat raute register kita maka kita akan membuat methot store registrasi kita pada controler 
            -> kita akan menampilkan dulu semua data yan kita masukkan pada form register kita dan jika suda bisa kita hapus
            -> kemudian kita akan lakukan validasi pada registercontroler kita
            -> jika suda selesai melakukan rvalidasi maka kita akan memasukkan data kita kedalam database berdasarkan yang registrasi
            -> unutk melakukan penyumpanan kedalam database maka yang kita lakukan yaitu menyimpan semua validasi kedalam variable $validatedData sehingga kita isi menjadi User::create($validatedData);
            -> unutk itu kita perlu merubah model user kita sehingga yang diisi semua field table terkecuali id menggunakan method $guarded
            -> jika suda kita akan lakukan engkripsi password kita dan kita jalankan fungsi bcrypt()
            -> atau kita gunakan hassing dan jika kita gunakan ini maka kita harus memanggil klassnya terlebih dahulu agar jalan 
            -> kita akan membuat flash massage juga untuk memberikan informasi jika berhasil login, dan pesannya kita taruh di view login kita 


          USER LOGIN & MIDDLEWARE

          1. disini kita akan mulai memperbaiki form login kita dengan menambahkan action dan method
          2. jika suda kita akan membuat rotes unutk login kita menggunakan post agar tidak tampil pda url kita
          3. jika suda kita akan membuat method login kita pada folder controler 
          4. kemudian kita akan membuat validasi terlebih dahulu dan kita akan tambahkan is-invalid pada form login kita
          5. kita akam melakukan pengecekkan menggunakan [Auth::attemp] yaitu jika passwornya sudah benar maka akan kita tendang 
             kehalaman dashboart kita, dam kalau gagal kita akan kembalikan lagi ke login, unutk itu kita akan bungkus dlu validasi kita kedalam variable $credentiel dan ini bebas nama fariablenya
          6. dan sini kta akan membuat controler Dashboard unutk membuat halaman dashboard kita unutk melakukan request jika data 
             berhasil dimasukkan kedalam login kita
          7. setelah itu kita akan membuat juga route unutk dashboard kita

          MATERI MIDDLEWARE

          Middleware kita akan melakukan ini bertujuan unutk melakukan request yaitu ferifikasi jika user belum login maka user tidak akan bisa masuk kehalaman dashboard unutk jaankan ini kita akan memasang middleware pada routes kita
          -> dan didalam laravel suda ada middleware yang otomatis jalan setiap url kita dijalankan dia berada di folder middleware
            -> dan didalam file kernel ada istila 
                ->auth yaitu di ibaratkan user yang suda login dan ada juga 
                ->guest yaitu user yang belum login
               dan perintah ini suda tersediah didalam laravel dan tidak bisa diubah ubah

          1. dan untuk menerapkan itu kita akan terapkan pada halaman Route kita
          2. jika suda menerpakan middleware pada raute kita yang perlu kita lakukan mengubah setingan providers file 
             RoutesServiceProvider unutk mengarah kehalaman utama kita 
          3. dan jika kita suda mengubah arah privider kita maka kita akan memperbaiki tampilan navbar kita agar ketika suda login maka 
             menu login tidak di tampilkan lagi, dan disini kita akan gunakan @auth @else @endauth untuk membuat menu login hilang jika sda login kita akan buat ke halaman partials file navbar kita dan ini adalah cara kerja middleware
          4. selanjutnya kita akan membuat logout dan untuk membuat logout kita akan membuat rotes kleuar dlu di folder routs kita
          5. jka suda membuat routes kita akan membuat method keluat pada logincontroler kita
          6. dan untuk keluar kita gunakan [Auth::logout] bawaan dari laravel
          7. dan kita akan tambahkan middleware dahsboard kita agar dasbhoard kita hanya bisa di akses oleh user yang sudah login 
             dan kita akan menambahkannya pada route dahsboard kita


        </p>

        <p>

          MATERI UI DASHBOARD

          1. pertama kita akan menjalankan file dashboart kita kedalam routes dan kita akan menghapus controler dahsboard
          2. jika sda kita akan mengambil tempalte dari bostrap untuk tampilan dashboard kita dan kita akan panggil cssnya menggunakan 
             css online dari botstrap begitu pula js bundlenya 
          3. kemudian kita akan membuat resources controler yang akan menangani data crud
          4. untuk melakukan ini kita akan bikin sebuah routes yang mengarah ke kontroler yang disebut dengan resource controler yaiut 
             controler yang suda otomatis mengatur data crud  
          5. untuk membuat itu kita akan membuat menggunakan coment palet yaitu ctrl+shift+p kemudian kita ketikkan
             >artisan make controler 'kemudian kita akan membuat nama controler kita yaitu DashboardPostControler'
             >DashboardPostControler
             >Resource 'kita akan pilih yang resource'
             >Yes 'unutk langsung menghubungkan dengan model post kita'
             dan akan otomatis kita akan dibuatkan controler baru dan terhubung ke model post kita dan didalam controler kita sda banyak method yang disediakan unutk melakukan proses crud
          6. jikia suda membuat controler kita maka kita akan membuat routes kita kedalam file web kita dan sekarang methotnya sda 
             resource
          7. jika suda maka kita akan isi data kita kedalam dashboardpostcontroler
          8. kemudian kita akan membuat halaman post kita pada volder view file dashboard
          9. selanjudnya kita akan membuat tmpilan detail kita pada dashboard controler kita
          10, untk menampilakan data berdasrkan slugnya maka kita akan tambahkan method yang suda disediakan oleh laravel didalam model 
              post kita setelah kita tambahkan methot maka kita akan ganti menjadi slug pada view kita

        </p>

        <p>

          MATERI CRUD (CREATE POST FORM)

          1. yang pertama kita lakukan adalah menambahkan tombol tambah post pada tampilan post kita 
          2. kemudian kita akan buat view unutk menambahkan data kita.. unutk iru kita akan membuat perintah view pada method yang sda 
             disediakan pada controler dahsboard kita dan kemudian kita tambahkan form pada file create folder posts
          3. kemudian kita akan membuat inputan slug agar terisi secara otomatis berdasarkan title yang diisi
          4. unutk melakukan itu yang perlu kita lakukan pertama menginstal dlu [composer require cviebrock/eloquent-sluggable] kedalam 
             terminla kita
          5. jika suda kita akan pakai untuk itu kita akan update dlu model yang akan kita pasangkan [use sluggable], dan disini kita 
             akan pasang di model post kita dan jangan lupa kita tambahkan name spacenya
          6. jika suda kita akan buat methotnya agar sluggablenya berfungsi
          7. dan unutk menjalankan ini kita gunaka javascript dan kita akan buat scriptnya di view kita file create folder post
             dan yang kita gunakan yaitu menggunakan face api
             <script>
                 const title = document.querySelector(
                     '#title'); // kita akan ambil inputan title dengan id #title id yang berada di input
                 const slug = document.querySelector('#slug'); // begitupula ini

                 // sekarang kita akan bikin sebuah ivent heandler yang menangani ketika data yang dituliskan di title itu berubah
                 title.addEventListener('change', // kita gunakan change agar ketika selesai di ketik maka akan tampil otomatis
                     function() { // kemudian disini kita akan buat ketika title berubah isinya
                         fetch('/dashboard/posts/cekSlug?title=' +
                                 title // kita akan nge fetch data yang kita buat dari method kontroler kita
                                 .value //?title=' + title.value unutk mengirimkan datanya ke controler kita berdasarkan filt title
                             ) //kalau ada request /dashboard/posts/createSlug maka kita akan ambil isinya menggunakan then
                             .then(response => response
                                 .json()) //yang isinya kita akan jalankan kedalam response.json dak kita harus kasi then lagi
                             .then(data => slug.value = data
                                 .slug
                             ) // nanti akan dikembalikan berdasarkan data dan nanti data ini akan menganti si slug value kita, dan valuenya akan mengambil dari data yang nama propertinya slug
                     });
                 // kemudian disini kita akan fecth data yang kita buat di controler dashboard dan nanti kita akan membuat methot baru yang tugansya akan menangani permintaan slug

                 // catatan -> slug adalah element dari inputnya sedangkan value adalah isi dari inputanya
                 // kemudian kita akan membuat routesnya di file web kita untuk mengarahkan route di atas
             </script>

          8. kemudian kita akan membuat method baru didalam controler dashboard kita unutk menangani permintaan request slugnya
             // disini kita akan membuat method unutk menangani permintaan slugnya
              public function checkSlug(Request $request)
              {
                  // disini kita akan isi dengan route kita yang telah kita buat di view create tadi
                  $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
                  return response()->json(['slug' => $slug]);
              }
             dan didalam method kita kita akan cari routenya untuk kita isi kedalam methot kita
          9. unutk itu kita akan membuat dulu route kita untuk mengarahkan /dashboard/posts/createSlug kita dari view create tadi, dan 
             routenya kita akan buat secara manual
             // disini kita akan membuat raoute kita untuk /dashboard/posts/createSlug kita
              Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

          10. kemudian disini kita akan buat option category
          11. unutk option kita bisa luping dari table category dengan cara  inqlude kan categorinya kedalam controler unutk itu
              kita akan memanggil dlu modelnya kedalam controler dan kemudian kita kirim kedalam method create kita unutk mengirimkan category
          12. kemudian kita akan luping kedalam file create post kita
          13. kemudian kita akan buat tampilan textarea unutk pengetikan blog kita unutk itu kita perlu download zipnya dari ghitub yang 
              namanya trix editor dan yang kita butuhkan ada di fiolder dist yaitu trix.css dan trix.js saja dan kemudian kita akan kopikan file tadi kedalan folder public ita dan kita tempatkan di folder css dan js
          14. selanjutnya kita akan copy  kedalam main.balde.php kita <link rel="stylesheet" type="text/css" href="trix.css">
              <script type="text/javascript" src="trix.js"></script> diambil dari ghitub trix
          15. setelah itu kita copykan form nya untuk mengetik <input id="x" type="hidden" name="content">
             <trix-editor input="x"></trix-editor> di ambil dari ghitub
          16. dan untuk mengirimkan data kita akan request ke controler dashboard kita method store unutk mengimputkan data kita


        </p>

        <p>

         MATERI VALIDATION & INSERT POST

         1. pada controler dashboard kita di method store kita akan lakukan validasi
         2. kemudian kita ke view unutk menabahkan validasi kita tapi pada tiap tiap inputan
         3. dan unutk memberika value="{{ old('category') }}" pada categori kita, maka kita akan lakukan pengkondisian
         4. kemudian kita akan insert datanya pada controler dashboard kita method store untuk itu kita akan buat dlu data baru karena 
            kita baru melakukan separuh input data kita unutk data detail kita menggunaka Str::limit yang kita ambil dari documentasi laravel kita dan kita akan hubungkan table post user_id dengan table user id 
         5. kemudian kita akan insert data kita dengan memanggil model post kita
         6. jika suda kita akan lakukan pengkondisian untuk melakukan pemberitahuan jika ada data yang berhasil masuk ataw tida pada file 
            index post kita

        </p>

        <p>

         MATERI UPDATE & DELETE

         1. kita akan membuat fungsi hapusnya untuk itu kita akan masuk pada view index post kita dan tombol hapusnya harus kita taruh 
            kedalam form untuk menjalankan method delete karena kita butuh reques methodnya delete dan juga fitur @csrf
         2. kemudian kita akan ke dashboard controler kita method distroy unutk menjalankan fungsi hapusnya
            dan jangan lupa didalam view show post kita jalankan juga form hapus

         3. dan kita akan membuat halaman edit pada view index post kita dan untuk halaman edit kita cukup ketik pada href-nya saja dan 
            pada tampilan edit kita akan tambahkan edit di belakang blade kita {{ $tmp->slug }}/edit yang suda memang aturan default dari resource laravel dan unutk mengecek itu kita bisa ketikan [php artisan route:list] didalam ini suda tersedia seluruh route kita beserta methodnya
         4. unutk melakukan edit kita akan membuat view edit dlu pada folder post kita dan kita cukup lakkukan copy saja pda view create 
            kita
         5. kemudian kita akan perbaiki didalam controler dashboard kita untuk menampilkan editnya pada method edit
         6. setelah itu kita akan ubah juga pada view edit kita unutk menagkap data post yang ingin kita ubah 
            {{ old('title', $post->title) }} untuk manampilkan datanya kita cukup tambahkan $post->title pda old kita sehingga jika ada perubahan dan terjadi error maka perubahan kita tidak akan berubah seperti semula
         7. jika suda kita akan lakukan vlidasi pada method update kita pada controler dashboard unutk menjalankan fungsi updatenya 
            untuk slugnya kita akan lakukan di luar dan jangan kita taruh didalam seperti create, dan kita akan laakukan pengecekan kondisi, sehingga jika ada perubahan dan slugnya tidak ingin di ubah maka tidak akan terjadi error
            unutk updatenya kita akan contekkan sedikit dari create kita
         8. /dashboard/posts/{{ $detail->slug }}/edit dan jangan lupa juga kita tambahkan href editnya pada view show post kita

        </p>

        <p>

         MATERI UPLOAD IMAGE (GAMBAR)

         disini kita akan memperbaiki fitur view creat post kita unutk menambahkan fitur upload gambar
         1. kita akan ke file create post kita unutk tambahkan fitur upload gambar
            -> dan untuk menambahkan gambar kita harus tambahkan atribut enctype="multipart/form-data" pada form kita karena jika kita 
               tidak tambahkan fitur ini maka upload gambarnya tidak bisa di upload sehingga bisa menangani semua inputan
            -> untuk menyimpan gambarnya pertaman kita akan mencoba untuk return dlu peyimpanannya pada controler dashboard method store
               1. kita akan return unutk menyimpan gambar dan unutk sementara kita return agar validasi dibawahnya tidak dijalannkan
               2. return $request->file('image')->store('post-image'); kita akan request dengan mengambil isi file('image')-nya yang ada 
                  di view create post inputan kita tdi kemudian kita panggil method store kemudian kita simpan gambarnya di folder post-image yang kita buat dan otomatis terbuatkan letaknya di store->app->post-image
               3. jika suda kita akan perbaiki agar pentimpanan gambar kita tidak berada di folder store->app->post-image
               4. pertama kita atur dulu letak penyimpanannya 
               5. dan untuk mengaturnya berada di file config/filesystems.php dan dibagian 'default' => env('FILESYSTEM_DRIVER', 'local') 
                  kita tinggal tambahkan (FILESYSTEM_DRIVER=public) kedalan file .env kita ini bertujuan agar gambar postingan kita bisa di lihat oleh semua orang dalam blog kita
               6. jika sudah mengubah letak penyimpanan defaultnya di public maka folder penyimpanan awal kita bisa kita hapus sehingga 
                  folder post-image kita tersimpan kedalam folder store->app->public
               7. setelah itu kita haruh hubungkan dlu folder public yang ada di folder store dengan folder public yang ada di aplikasi 
                  kita yang tempat penyimpanan css img dan js kita dan folder ini adalah folder yang bisa di akses oleh user siapapun
               8. untuk menghubungkan kita harus gunakan yang namanya symbolic link (the public disk) yang berasal dari documentasi 
                  laraver caranya cukup ketikkan {php artisan storage:link} agar applikasi public kita dengan public store bisa terhubung
                  jika suda maka akan otomatis ada folder tambahan storage
               9. berikutnya kita akan tambahkan filt baru pada table post kita yaitu filt image kedalam file database/migration
              10. jika suda jangan lupa kita {php artisan migrate:fresh --seed}
              11. jika suda kita akan melakukan validasi pada controler dashboard kita pada method store
              12. dan kita akan buat juga pengecekkan jika user tidak menambahkan gambar sehingga gambarnya akan mengambil dari unplash
              13. jika suda kita akan melakukan pengecekan lagi pada view show post kita unutk menampilkan gambar postingan kita jika 
                  terdapat gambar yang di tambahkan dan unutk gambarnya kita arahkan ke {{ asset('storage/' . $detail->image) }} kita arahkan memang di asset kemudian kita masuk folder storage/, dan post-imagenya tidak usah di tulis karena suda kebawa denga post imagenya kedalam database (stroge dari aplikasi public kita tempat css img dan js)
              14. kemudian kita akan lakukan lagi pada halaman blog kita atw frontend

        </p>

        <p>

         MATERI PREVIEW, UPDATE & DELETE IMAGE

         1. pertama kita akan tambahkan fitur agar dapat menampilkan gambar pada saat mengupload gambar pada create post kita
            kita akan gunakan onchange"previewImage()" pada gambar kitah yang ada di javascript sehingga ketika previewImage() jalan maka gambarnya akan tampil di img kita, kita akan ke view create post kita
         2. kemudian kita akan jalankan java scriptnya agar tampilan gambar bisa tampil
            ingat unutk menggunakan kemal keys
            disini kita akan jalannkan extensi javascriptnya untuk menampilkan gambar dan kita masukkan kedalam function
            function previewImage() { // functionnya diambil dari onchange="previewImage"
               const image = document.querySelector('#image');
               // kemudian kita ambil tag image kosong tdi
               const imgPreview = document.querySelector('.img-preview');
   
               //style gambarnya kita akan ubah menjadi block
               imgPreview.style.display = 'block';
   
               // kemudian kita lakukan perintah unutk mengambil gambarnya
               const oFReader = new FileReader();
               oFReader.readAsDataURL(image.files[0]);
   
               // kemudian kita load dan kita jalanakan function yang parameternya oFREvent
               oFReader.onload = function(oFREvent) {
                  // kemudian imgPreview.srcnya kita isi dengan oFREvent.target
                  imgPreview.src = oFREvent.target.result;
               }
            }
         3. nanti gambar yang kita pilih akan kelihatan disini img-fluid agar responsive dam kita akan tambahkan img untuk mrnampilkan 
            gambarnya 
            <img class="img-preview img-fluid">
         4. kemudian kita lakukan pada edit juga agar tampilan gambarnya bisa kelihata dan jangan lupa untuk menambahkan enctipe pada 
            form nya
         5. dan kemudian kita akan tempelkan inputtan gambarnya pda post edit kita agar pada tampilan gambarnya bisa tampil dan scriptnya 
            juga kita copykan pada create
         6. kemudian kita akan lakukan pengkondisian pada gambar kita agar ketika gambar diedit maka akan tampil gambar lama kita menuju 
            kehalaman edit post kita
         7. kemudian ita akan lakukan validasi pada methot edit kita agar bisa berjalan editnya dan kita akan mengubahnya pada controler 
            dashboard kita
         8. kemudian kita akan cek juga jika ada gambar baru dan kita akan taruh dibawah validasinya agar melakukan pengecekkan
         9. kemudian kita akan membuat agar gambarnya tidak menumpuk pada saat kita update gambarnya sehingga pada saat kita update 
            gambarnya lamanya akan terhapus, dan cara hapusnya kita akan taru didalam ifnya pada method update kita dahsboard controler
            untuk itu kita akan buat dlu inputan kosong pada file edit post kita unutk menerima inputan gambar lama kita dengan type hidden
        10. jika suda maka kita akan cek pada controler dashboard kita unutk mengecek gambar lamanya
        11. kemudian kita akan lakukan juga di distroy kita yaitu delete... dimana ketika postingan kita hapus maka gambanrya akan ikutan 
            terhapus pada controler dashboar kita

        </p>

        <p>

         MATERI AUTHORIZATION

         disini kita akan membuat hak akses pada webside kita untuk mengontrol web kita
         
         1. disini kita akan membuat controler kita untuk admin yaitu Admin controler dengan cara [ctrl+shif+p]
            dengan type resource serta membuat modelnya
         2. kemudian kita akan membuat route kita untuk mengarah ke route controler admin
         3. kemudian kita akan membuat tampilan kita pada halaman index admincontroler kita dan untuk itu kita akan tambahkan link pada 
            menu sidebar kita
         4. jika suda kita akan membuat view category kita didalam folder dashboard dan kita akan copika pada tampilan post kita dan kita 
            akan memlakukan pengimputan data untuk menampilkan datanya pada controler admin kita
         5. kemudian kita akan membuta pengkondisian pada admin controler kita agar tidak dapat di kases semua user dengan cara
               if (!auth()->check() || auth()->user()->username !== 'firmanhasim') { //kita akan gunakan auth bawaan dari larael kemudian kita gunakan chek untuk mengecek dan gunakan auth unutk tble user kemudian ambil field username tidak sama dengan firman makan akan di tendang ke halaman abort 
                  abort(403); // halaman kosong
            }
            atau kita bisa kita membuat meidleware sendiri untuk menempelkannya di route masing masing sehingga jika kita tambahkan middleware sendiri makam hanya akan di akses yang oleh admin
         6. untuk membaut itu kita akan membuatnya dengan cara [ctrl+shif+p] 
            > make middleware
            > Admin ->nama midlewarekita dan ini bebas
            maka kita akan dibuatkan 1 file admin didalam folder middleware untuk mentimpan pengkondisian kita di atas, menuju ke file admin midleware
         7. dan untuk menjalankan ini kita harus masukkan juga kedalam kernelnya yaitu masuk kedalam file yang namanya kernel.php unutk 
            daftarkan middleware admin kita, menuju ke file kernel yatu {'admin' => \App\Http\Middleware\Admin::class}
         8. jika suda kita akan tambahkan middlewarenya pada route kita ke file web

         9. jika suda kita akan menghilangkan link Post categoryes kita sehingga jika bukan admin yang tampil maka tidaka akan di 
            tampilkan link categorynya dengan menggunakan [gates] dan cara ini agar bisa kita sisipkan dalam sidebar kita sehingga jika [definenya] bukan admin makan tidak akan ditampilkan
        10. untuk itu kita perlu tambahkan atribut baru yaitu [gate] pada folder providers file appservice providers pada method boot 
            sehingga jangkauan dari user admin akan menjadi leluasa. menuju ke file appserviceproviders dan jka lakukan ini kita tidak perlu tambahkan yang namanya middleware pada route kita
        11. kita gunakan ini jika kita ingin menghilangkan link pada sidebar sehingga link tersebut tidak terlihat terkecuali admin

        12. kemudian gimana caranya unutk menambah jumlah admin nantinya, caranya cukup kita tambahkan field baru pada table users kita 
            untuk meakukan itu kita perlu membuat yang namanya migration baru pada table user kita
            dan unutk menambhakan migrate pada table user atau menyisipkan dan tablenya tidak terganggu maka kita tingga lakukan 
            [ctrl+shif+p] 
            > make migration
            > add_si_admin_to_users_table dibaca kita akan tambahkan field baru yang namanya is_admin ke tbale users
            > No agar tidak membuat table baru
            > Yes untuk memodifikasi table yang suda ada yaitu users
            > users yaitu table yang di modifikasi
        13. kemudian migrate kita telah dibuat dengan nama add_is_admin
            kemudian di method up kita akan sisipkan sebuah fielt denga tipe data bolean
            $table->boolean('is_admin')->default(false); akan membuat nilainya 0 untuk semua user pada fild is_admin

            di method down jika nanti kita akan menghapus field tablenya
            $table->dropColumn('is_admin');

            kemudian kita jalankan dengan cara [php artisan migrate] unutk menjalankan migrasi yang blm dijalannkan saja dan tidak mengganggu table yang lain dan hanya mengubah table users yang tadinya tidak ada is_admin sekarang ada
            unutk menghapus fild is_admin kita gunakan [php artisan migrate:rollback]

        14. kemudian kita akan implementasikan dengan mengganti pada file profiders kita yang tadinya 
            Gate::define('admin', function (User $user) { // disini kita akan gate define admin fn user
                  return $user->username === 'firmanhasim'; 
            });
            menjadi
            Gate::define('admin', function (User $user) { // disini kita akan gate define admin fn user
                  return $user->is_admin; ->akan menghasilkan true sehingga masuk ke halaman admin sedangkan fild tablenya tadi bernilai false
            });

        15. di bagian middlewarenya file admin juga kita ganti yang tadinya
               if (!auth()->check() || auth()->user()->username !== 'firmanhasim') { 
                  abort(403); // halaman kosong
            } 
            menjadi
               if (!auth()->check() || !auth()->user()->is_admin) { ->kalau dya bukan admin maka kita akan kasi forbiden
                  abort(403); // halaman kosong forbiden
            }


        </p>

</body>

</html>
