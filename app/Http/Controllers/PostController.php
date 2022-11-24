<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        //revisar la autenticacion de la
        $this->middleware('auth');
    }
    public function index()
    {
        echo 'Muro';
     //   dd(auth()->user());
        return view('layouts.dashboard');
    }
}
