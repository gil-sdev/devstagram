<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');
      // $input = $request->all(); 
        return response()->json(['imagen' => $imagen->extension()]);
    }
}
