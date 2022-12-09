<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {

    // dd(auth()->user()->id);
    //  attach para las relaciones de muchos a muchos pero en este caso dela misma tabla
        $user->follower()->attach(auth()->user()->id);
        return back();
    }

    public function destroy(User $user)
    {
        $user->follower()->detach(auth()->user()->id);
        return back();
        dd('Dejando de seguir');
    }
}
