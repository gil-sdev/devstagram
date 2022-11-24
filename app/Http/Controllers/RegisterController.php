<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    // debug del post
   //dd($request);

   //Validacion de datos 
   $this->validate($request, [
    'name' => 'required|min:5',
    'username'=> 'required|unique:users|min:3|max:20',
    'email'=> 'required|unique:users|email|max:60',
    'password'=> 'required|confirmed',
   ]);

  // dd($request);
   // veridicar tambien que todos los campos esten registrados en fillabe en app\models\user.php
   // de lo contrario maracara error al intentar mandar datos 
   User::create([
        'name'=> $request->name,
        'username' => $request ->username,
        'email' => $request ->email,
        'password' => $request ->password
    ]);

    dd('Creado');
}

}
