<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class album extends Model
{
    use HasFactory;
    protected $fillable = ['Nama_Album','deskripsi','id_user'];
     //untuk konek ke table
     protected $table = 'album';
     //nilai ke foto
     public function foto()
     {
        return $this->hasMany(Foto::class,'album_id','id');
     }
     //nilai ke user
     public function users()
     {
        return $this->belongsTo(User::class,'id_user','id');
     }
}
