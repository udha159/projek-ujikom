<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\album;
use App\Models\Follow;
use App\Models\Comment;
use App\Models\Favorite;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'no_telepon',
        'jenis_kelamin',
        'tgl_lahir',
        'bio',
        'status_user',
        'pictures',
        'email',
        'password',
    ];

    // Relasi Kedalam tabel Foto
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'id_user', 'id');
    }
    // Relasi Kedalam tabel Comment
    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_user', 'id');
    }
    public function album()
    {
        return $this->hasMany(album::class,'id_user','id');
    }
    // follow
    public function follow()
    {
        return $this->hasOne(Follow::class, 'id_user', 'id');
    }
    // faforite
    public function favorite()
    {
        return $this->hasOne(Favorite::class, 'id_user', 'id');
    }
    public function like()
    {
        return $this->hasOne(LikeFoto::class, 'id_user', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
