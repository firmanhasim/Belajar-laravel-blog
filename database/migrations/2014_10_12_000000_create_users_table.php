<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// table users
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // digunakan untuk membuat struktur(skema) table
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique(); // untuk membuat nama urlnya sehingga ketika di ketik akan menampilakn nama sipenulis buka id 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); //bisa dikosongkan
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // untuk menghilangkan skema yang telah kita buat
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
