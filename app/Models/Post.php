<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    //para prevenir el error en la bases de datos
    //mediante este medio confirmamos cuales campos seran enviados 
    // a la BD

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'users_id'
    ];
// un psot pertence a un usuario
    public function user()
    {
        //se lee los datos del usuario solo el nombre y nombre de usuario
        return $this->belongsTo(User::class)->select(['name','username']);
    }
}
