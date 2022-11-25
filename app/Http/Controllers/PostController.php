<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostController extends Controller
{
    public function __construct()
    {
        //revisar la autenticacion de la
        $this->middleware('auth');
    }
    public function index(User $user)
    {
    //    dd($user->username);
    //    echo 'Muro';
     //   dd(auth()->user());
     // enviando datos de user a dashboard
        return view('layouts.dashboard',['user'=>$user]);
    }
}
