<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\CssSelector\XPath\Extension\PseudoClassExtension;

class PostController extends Controller
{
    public function __construct()
    {
        //revisar la autenticacion del usuario para proteger 
        // las url 
        $this->middleware('auth')->except(['show','index']);
    }
    public function index(User $user)
    {
      // se ahce la consulta de los post de usuario
      // usando el modelo eloquet y paginar los resultados
      $posts = Post::where('users_id',$user->id)->latest()->paginate(3);
//      dd($posts);
      return view('layouts.dashboard',[
        'user' => $user,  // datos del usuario
        'posts' => $posts  // datos del post para la vista
      ]);
    //    dd($user->username);
    //    echo 'Muro';
     //   dd(auth()->user());
     // enviando datos de user a dashboard
        return view('layouts.dashboard',['user'=>$user]);
    }

    public function create()
    {
      return view('post.create');
    }
    public function store(Request $request)
    {
     //  dd($request);


        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        //1 forma de crear una bases de datos

/*
        Post::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen'=>$request->imagen,
        'user_id'=> auth()->user()->id,
        ]);
 */

        // 2 otra forma de crear una bases de datos
        $post = new Post;
        $post->titulo =$request->titulo;
        $post->imagen = $request ->imagen;
        $post->descripcion = $request->descripcion;
        $post->users_id = auth()->user()->id;
        $post->save();


      //3ra forma de escribir en la Bd
      /*
      $request->user()->post()->create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen'=>$request->imagen,
        'user_id'=> auth()->user()->id,
      ]);
      */

        return redirect()->route('post.index',auth()->user()->username);

    }

    public function show(User $user,Post $post)
    {

      //dd('MIs post');

    //  dd($post);
      return view('post.show',[
        'post' => $post,
        'user' => $user
      ]);
    }

    public function destroy(Post $post)
    {
     // if($post->user_id == auth()->user()->id);

      //revisa la autorizacion  de la operacion con el modelo
     $this->authorize('delete',$post);
     //elmina el registro
      $post->delete();

      //Eliminar imagen 
      $imagen_path = public_path('uploads/'.$post->imagen);
      if(File::exists($imagen_path)){
        unlink($imagen_path); //funcion php
    //    File($imagen_path);// funcion laravel
      }

      return redirect()->route('post.index', auth()->user()->username);
    }


  }
