<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\LikeFoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\album;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'url',
        'album_id',
        'id_user'

    ];
    protected $table = 'fotos';

    // Relasi Kedalam tabel Foto
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relasi Kedalam tabel Like
    public function likefotos()
    {
        return $this->hasMany(LikeFoto::class, 'id_foto', 'id');
    }

    //nilai ke komentar sudah umpan balik
    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_foto', 'id');
    }

    //nilai ke favorite sudah umpan balik
    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'id_foto', 'id');
    }
    public function album()
    {
        return $this->belongsTo(album::class,'album_id','id');
    }
    
}
