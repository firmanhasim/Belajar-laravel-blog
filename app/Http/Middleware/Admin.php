<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // jika gunakan guest tidak usah pakai !
        // disini kita akan melakukan pengkondisian agar halaman ini tidak dapat di akses oleh semua user dengan cara
        if (!auth()->check() || !auth()->user()->is_admin) { //kita akan gunakan auth bawaan dari larael kemudian kita gunakan chek untuk mengecek dan gunakan auth unutk tble user kemudian ambil field username tidak sama dengan firman makan akan di tendang ke halaman abort 
            abort(403); // halaman kosong
        }
        // dan untuk menjalankan ini kita harus masukkan juga kedalam kernelnya yaitu masuk kedalam file yang namanya kernel.php unutk daftarkan middleware admin kita
        return $next($request);
    }
}
