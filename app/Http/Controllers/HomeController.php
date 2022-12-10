<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        //Obliga a iniciar session para ver lo post
        $this->middleware('auth');
    }

        /*
        * Tip para controlador de un solo metodo es mejor utilizar _invoke
        * en lugar de index() 
        * funciona de manera similar a un constructor
        */
    
    public function __invoke()
    {
        // ver seguidos
        // pluck extrae solo los datos de un campo      
       
        $idSeguidos = auth()->user()->followings->pluck('id')->toArray();
        $post = Post::whereIn('users_id',$idSeguidos)->latest()->paginate(3);
            return view('home',[
                'post' => $post,
            ]);
    }

}
