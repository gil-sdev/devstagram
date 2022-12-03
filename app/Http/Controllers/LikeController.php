<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request,Post $post)
    {
    
       $post->likes()->create([
        'users_id' => $request->user()->id,
       ]);


       //regresa de donde viene la peticion
       return back();
    }

   public function destroy(Request $request, Post $post)
   {
    // Con la relacion creada en hasMany en modelo user
 //   $request->user()->likes() --> returna los likes 
 //->where('post_id',$post->id)- filtra el post actual del like 
 //delete() --> porcede a eliminar
    $request->user()->likes()->where('post_id',$post->id)->delete();

    // regresa a la pagina de la peticion    
    return back();
   }
}
