@extends('layouts.app')

@section('titulo')
{{$user->username}}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex-col items-center">
        <div class="md:w-8/12 lg:w-6/12 px-5">
            <img src="{{
                $user->imagen ? //condicion si imagen vacio
                asset('perfiles').'/'.$user->imagen : // else
                asset('img/user.png')}}" alt="user_img">
        </div>
    </div>
    <div class="md:w-8/12 flex lg:w-6/12 px-5 flex-col items center p-10  md:justify-center">
        <p class="text-gray-700 text-2xl">{{$user->username}}</p>
    
    <div class="flex items-center gap-2"> 
        @auth
           @if($user->id === auth()->user()->id)
                <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>                      
                </a>
           @endif
       @endauth
    </div>  
        <p class="tetx-gray-800 text-sm mb-3 font-bold">
        
         {{ $user->follower()->count() }}
        <span class="font-normal"> 
            @choice('Seguidor|Seguidores',$user->follower()->count())
        </span>
        </p>
        <p class="tetx-gray-800 text-sm mb-3 font-bold">
            {{ $user->followings()->count() }}
            <span class="font-normal">   @choice('Siguiendo|Siguiendo',$user->follower()->count())</span>
        </p>
        <p class="tetx-gray-800 text-sm mb-3 font-bold">
            {{$user->posts->count() }}
            <span class="font-normal"> post</span>
        </p>
 
        @auth      
            @if (auth()->user()->id !== $user->id)
                @if(!$user->siguiendo(auth()->user()))             
                    <form action="{{ route('users.follow', $user) }}"  
                        method="POST">
                        @csrf
                        <input type="submit" value="Seguir" 
                        class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text--xs font-bold cursor-pointer">
                    </form>
                @else
                        <form 
                            action="{{ route('users.unfollow', $user) }}" 
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Dejar de seguir" 
                            class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text--xs font-bold cursor-pointer">
                        </form>
                @endif
            @endif  
        @endauth

    </div>
</div>

<section class="container mx-auto mt-10">
<h2 class="text-4xl text-center font-black my-10"> Publicaciones</h2>
<!-- se emplea el componete $post -->
<x-listar-post :post="$posts"/>  
 </section>

@endsection

