@extends('layouts.app')

@section('titulo')
Editar {{ auth()->user()->username }}
@endsection


@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form action="{{ route('perfil.store') }}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-teal-500 font-bold">  Usuario  </label>
                <input id="username" 
                name="username" 
                type="text" 
                paceholder="Nombre Usuario" 
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                value="{{ auth()->user()->username }}"
                >
        <!--Directiva de error returnado de registerCOntroller-->    
                 @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-teal-500 font-bold">  Imagen  </label>
                <input id="imagen" 
                name="imagen" 
                type="file"         
                accept=".jpeg, .png, jpg"
                >
            </div>
            <input type="submit" value="Guardar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold text-white w-full rounded-lg">
        </form>
    </div>
</div>
@endsection