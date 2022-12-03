@extends('layouts.app')

@section('titulo')

{{ $post->titulo}}
@endsection

@section('contenido')
<div class="container mx-auto flex">
    <div class="md:w-1/2">
        <img src="{{asset('uploads').'/'.$post->imagen}}" alt="imagen {{ $post->titulo }}" with="20%"> 
    </div>
   
    <div class="p-3 flex items-center gap-4">
        @auth
        @if ($post->checkLike(auth()->user()))

        <form action="{{ route('like.posts.destroy',$post) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="my-4">
                <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
                </button>
            </div>
        </form>


        @else

        <form action="{{ route('like.posts.store',$post) }}" method="POST">
            @csrf
            <div class="my-4">
                <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
                </button>
            </div>
        </form>

        @endif
       


        @endauth

        <div class="p-3">
            <!-- cuenta los likes por medio la asociasion del modelo -->
            <p class="font-bold ">
                <span class="font-normal">Likes: </span>
                    {{ $post->likes->count() }}</p>
            </div>
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

@auth
    @if ($post->users_id == auth()->user()->id) 
<form action="{{ route('posts.destroy', $post) }}" method="POST">
  @csrf
  <!-- Method spoofing forma de enviar un delete es meramente propiedad
-- de laravel no es soportado por los navegadores de manera nativa
-->
  @method('DELETE')
    <input 
   type="submit"
   value="Eliminar"
   class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"> 
</form>
@endif
@endauth

<!-- helper
-->
@auth

<div class="md:w-1/2 p-5">
    <div class="shadow bg-white p-5 mb-5">
    <p class="text-xl font-bold text-center mb-4">Comentar</p>
        @if (session('mensaje'))
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white">
                    {{ session('mensaje') }}
            </div>
        @endif

    
    <form action="{{ route('comentarios.store',['post' => $post, 'user' => $user ])}}" method="POST">
        @csrf
        <div class="mb-5">       
            <label for="comentario" class="mb-2 block text-teal-500 font-bold"> Comentario </label>
            <input id="comentario" name="comentario" type="text"  placeholder="Comentar" class="border p-3 w-full rounded-lg @error('name')
            border-red-500 
                @enderror"
                value="{{ old('comentario')}}" >
        </div>

            <input type="submit" value="Comentar" 
            class="bg-sky-600 hover:bg-sky-780 transition-colors cursor-pointer uppercase
            font-bold w-full text-white rounded-lg ">
    </form>
    </div>
</div> 
@endauth

<!-- Mostrar comentarios aun sin haber iniciado sesion -->

<div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
@if ($post->cometarios->count())
    @foreach ($post->cometarios as $comentario)
         <div class="p-5 border-gray-50 border-b">
            <a href="{{ route('post.index', $comentario->user) }}" class="font-bold"> 
                {{ $comentario->user->username}}: 
            </a>
            <a> {{$comentario->comentario}} </a>
            <a class="text-sm text-gray-500">
                {{ $comentario->created_at->diffForHumans() }}
            </a>
         </div>
    @endforeach

@else
    <a class="p-10 text-center"> Sin comentarios</a>
@endif

</div>
   
@endsection

