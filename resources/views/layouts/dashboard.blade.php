@extends('layouts.app')

@section('titulo')
{{$user->username}}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex-col items-center">
        <div class="md:w-8/12 lg:w-6/12 px-5">
            <img src="{{asset('img/user.png')}}" alt="user_img">
        </div>
    </div>
    <div class="md:w-8/12 flex lg:w-6/12 px-5 flex-col items center p-10  md:justify-center">
        <p class="text-gray-700 text-2xl">{{$user->username}}</p>
        <p class="tetx-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal"> Seguridores</span>
        </p>
        <p class="tetx-gray-800 text-sm mb-3 font-bold">
            0
            <span class="font-normal"> Siguiendo</span>
        </p>
        <p class="tetx-gray-800 text-sm mb-3 font-bold">
            0
            <span class="font-normal"> post</span>
        </p>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10"> Publicaciones</h2>
   @if ($posts->count()) 
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post)    
            <a href="{{ route('post.show',[
                'post' => $post,
                'user' => $user

                ]) }}">
                <img src="{{asset('uploads').'/'.$post->imagen}}" alt="imagen {{ $post->titulo }}">
            </a>
    @endforeach
   </div>
<div class="my-10">
    {{$posts->links()}}
</div>
   @else
   <p class="text-gray-600 uppercase text-sm text-center"> Sin publicaciones </p>
   @endif
    </section>

@endsection

