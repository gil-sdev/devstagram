<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
      return view('auth.login');  
    }
    public function store(Request $request)
    {
       // dd($request->remember);

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        //esto permitira crear una cokie el cual gaurdara en el equipo y en la BD
        if(!auth()->attempt($request->only('email','password'),$request->remember))
        {
            // back permite volver al sitio anterior de donde fue isntaciado pero con valores que pueden ser leidos 
            // en este caso mensaje
            return back()->with('mensaje','credenciales incorrectas');
        }
        return redirect()->route('post.index');
        //dd('Sesion INICIADO');
    }
}
