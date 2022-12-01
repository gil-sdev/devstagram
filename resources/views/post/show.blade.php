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

