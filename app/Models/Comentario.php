<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

class Comentario extends Model
{
    use HasFactory;


    //se auto realizan los campos a validar
    protected $fillable = [
        'users_id',
        'posts_id',
        'comentario',
    ];

    public function user(){
        //consultamso al usuario quien escribio el comentario
        return $this->belongsTo(User::class,'users_id');
    }
}
