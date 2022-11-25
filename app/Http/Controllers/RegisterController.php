<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    //
public function index()
{
    return view('auth.register');
}
public function store(Request $request)
{

    //modificar Request
    $request->request->add(['username' =>Str::slug($request->username)]);
    // debug del post
   //dd($request);

   //Validacion de datos 
   $this->validate($request, [
    'name' => 'required|min:2',
    'username'=> 'required|unique:users|min:3|max:20',
    'email'=> 'required|unique:users|email|max:60',
    'password'=> 'required|confirmed',
   ]);

  // dd($request);
   // veridicar tambien que todos los campos esten registrados en fillabe en app\models\user.php
   // de lo contrario maracara error al intentar mandar datos 
   User::create([
        'name'=> $request->name,

        //method generates a URL friendly "slug" from the given string:
        'username' => $request ->username,
        'email' => $request ->email,
        // hashing password
        'password' => Hash::make($request ->password)
    ]);

    //autenticar usaurio primera manera
    /*
    auth()->attempt([
        'email'=> $request->name,
        'password' => $request->password
    ]);
*/

    //autenticar usaurio segunda manera
    auth()->attempt($request->only('email','password'));


   // dd('Creado');

   // redireccionando
   return redirect()->route('post.index');
}

}
