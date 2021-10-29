<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    // data yang direkomendasikan harus di isi berdasarkan table
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // yang ini kebalikan dari yang diatas dimana semua bisa di isi terkecuali id
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //untuk menghubungkan model user dengan model Post
    public function post()
    {
        // 1 user boleh punya banyak post
        return $this->hasMany(Post::class); // kemudian kita ke model Post
    }
}
