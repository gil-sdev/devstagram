@extends('layouts.app')

@section('titulo')

{{ $post->titulo}}
@endsection

@section('contenido')
<div class="container mx-auto flex">
    <div class="md:w-1/2">
        <img src="{{asset('uploads').'/'.$post->imagen}}" alt="imagen {{ $post->titulo }}" with="20%"> 
    </div>
   <div class="p-3">
    <p>Likes: 0</p>
    </div>
    <div>
     <a href="#" class="font-bold ">{{ $user->username }}</a>
     <a class="text-sm text-gray-500">
        <!--
        -- imprimer la fecha del registro ademas formatea la diferencia usando 
        -- biblioteca de laravel obtenirdo de CARBON
        --
        -->
        {{ $post->created_at->diffForHumans()}}
     </a>
       <a href="#">
        {{ $post->descripcion }}    
    </a> 


</div>
   
@endsection

