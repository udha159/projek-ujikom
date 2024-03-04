<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto',
    ];

    //nilai balik ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    //nilai balik ke foto
    public function foto()
    {
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }
}
