<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
   public function store()
   {

    // cerrar sesion 
    auth()->logout();
    return redirect()->route('register');
    //dd('Cerrando sesion');
   }
}
