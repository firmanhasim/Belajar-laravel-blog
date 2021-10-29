<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; // unutk melakukan paginator ini harus ditambahkan
use Illuminate\Support\ServiceProvider;
use App\Models\User; // kita copikan dari documentasi gate laravel
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap(); // unutk menambahkan tampilan bostrap pada pagination kita agar menampilkan tampilan bootstrap 

        // disini kita akan tambahkan atribut bawaan laravel yang namanya gate
        Gate::define('admin', function (User $user) { // disini kita akan gate define admin fn user
            return $user->is_admin; // kemudian kita kembalikan $dari table user ambil username sehingga hanya username firman yang bisa akses admi
            // dan jangan lupa kita use
        });

        // kemudian kita gunakan ini ke file sidebar kita mengguanaka @can dengan memanggil define adminnya
    }
}
