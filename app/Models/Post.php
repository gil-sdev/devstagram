<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Like;

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

    public  function cometarios()
    {
        // creando relacion de un post tendra multiples comentarios
        return $this->hasMany(Comentario::class,'posts_id');
    }

    public function likes()
    {
        //un post tine muchos likes
        return $this->hasMany(Like::class);
    }


    // revisar los like de un usuario para no duplicar
    public function checkLike(User $user)
    {
        // returna el id del usario que ya dio like al post
        return $this->likes->contains('users_id', $user->id);
    }
}
