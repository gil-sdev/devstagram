<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
       // dd($user);
        //validar
        $this->validate($request,[
            'comentario' => 'required|max:255',
        ]);

        //almcenar
        Comentario::create([
            'users_id' => auth()->user()->id,
            'posts_id' => $post->id,
            'comentario' => $request->comentario
        ]);


        //redigir o imprimir mensaje de exito

        return back()->with('mensaje', 'Ha comentado correctamente');

    }
}
