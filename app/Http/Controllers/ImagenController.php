<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use function GuzzleHttp\Promise\all;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');
      // $input = $request->all(); 


      // CRear nombres unicos de los archios de imagen 
      $nombreImagen = Str::uuid().".".$imagen->extension();

      $imagenServidor = Image::make($imagen);
      $imagenServidor->fit(1000,1000);

      $imagenPath = public_path('uploads').'/'.$nombreImagen;
      $imagenServidor->save($imagenPath);




        return response()->json(['imagen' => $nombreImagen]);
    }
}
