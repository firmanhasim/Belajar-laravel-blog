<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// ini timbul karena kita suda ketikkan php artisan make:model -m Post sehingga migration ini otomatis dibuatkan
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // kemudian disini kita akan menambahkan field table kita sesuai yang kitainginkan
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id'); // dan ini akan memjdi forenki kedlam table kategori
            $table->foreignId('user_id'); // agar bisa terhubung dengan table user
            $table->string('title'); // title field baru pada table string = varchar
            $table->string('slug')->unique(); // tidak boleh ada slug yang sama dan ini akan menjadi url kita
            $table->string('image')->nullable(); // string sama dengan varchar
            $table->text('detail'); // text adalah tipedata untuk menampung banyak tulisan pada saat diinputkan
            $table->text('body');
            $table->timestamp('public_at')->nullable(); // jenis tipe data untuk membuat tanggal postingan kita dibuat dan nullable berarti ini bisa dikosongkan
            $table->timestamps(); // sedangkan ini untuk membuat method create up dan update up dan dan sda memang disediakan oleg migration

            // kemudian kita jalankan migrasinya kedalam terminal dengan cara 'php artisan migrate:fresh' cara ini untuk menghapus table lama dan membuat table baru, dan bisa juga gunakan 'php artisan migrate' agar table lama tidak terhapus, jika suda kita akan mengisi tablenya secara manual dengan menggunakan 'php artisan tinker' pada terminal
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
