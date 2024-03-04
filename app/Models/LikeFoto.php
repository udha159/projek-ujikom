<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeFoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto'
    ];
    protected $table = 'likefotos';

    // Relasi Kedalam tabel Foto
    public function foto()
    {
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }

    //nilai balik ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
