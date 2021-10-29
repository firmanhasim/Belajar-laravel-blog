<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // kita akan membuat filt table baru disini
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // untuk membuat categori harus unik
            $table->string('slug')->unique(); // harus unik
            $table->timestamps();

            // kemudian kita akan menghubungkan table categori dan table post kita dengan membuat forenki kedalam migrationnya post
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
