<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\User;


class PerfilController extends Controller
{
    public function __construct()
    {
        // proyejemos el sitio de los invitados, solo iniciado session
        $this->middleware('auth');
    }
   public function index()
   {
     return view('perfil.index');
   }
   public function store(Request $request)
   {

    //formato del texto
    $request->request->add(['username'=>Str::slug($request->username)]);

    // validacion del campo
        $this->validate($request,[
            // Por conveccion de laravel si son mas tres validaciones crear un arreglo
            'username' => ['required', 
                            'unique:users,username,'.auth()->user()->id, 
                            'min:3', 
                            'max:10',
                            'not_in:root,editar_perfil, administrador, jefe',
                           ],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            // $input = $request->all(); 
      
      
            // CRear nombres unicos de los archios de imagen 
            $nombreImagen = Str::uuid().".".$imagen->extension();
      
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
      
            $imagenPath = public_path('perfiles').'/'.$nombreImagen;
            $imagenServidor->save($imagenPath);
      
      
        } 

        // asignacion de valores 
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null; // asignar nombre usuario o poder dejarlo vacio


        //gurdar valores nuevos
        $usuario->save();

        return redirect()->route('post.index',$usuario->username);
   //     dd($request);
   }
}
