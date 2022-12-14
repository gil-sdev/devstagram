@extends('layouts.app')


@section('titulo')
Cear
@endsection

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />  
@endpush

@section('contenido')


    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <!-- se emplea dropzone configurar en resurces/js/app.js --> 
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class=" dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

            <div class="md:w-4/12 bg-white shadow-xl md:items-center">

                <form action="{{route('post.store')}}" method="POST">
                    <!-- directiva de seguridad  implementa un token -->
                    @csrf
                    <div class="mb-5">
                        <label for="titulo" class="mb-2 block uppercase text-teal-500 font-bold">  Titulo  </label>
                        <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicación" class="border p-3 w-full rounded-lg @error('titulo')
                            border-red-500 
                        @enderror"
                         value="{{ old('titulo')}}"
                        >
                <!--Directiva de error returnado de COntroller-->    
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                    @enderror
                    </div>
                        <div class="mb-5">       
                        <label for="descripcion" class="mb-2 block uppercase text-teal-500 font-bold"> Descripcion </label>
                        <input id="descripcion" name="descripcion" type="text"  placeholder="Escriba lo que piensa" class="border p-3 w-full rounded-lg @error('name')
                        border-red-500 
                            @enderror"
                            value="{{ old('descripcion')}}" >
                        </div>
                        @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
                       @enderror
                        <div class="mb-5">
                        <input name="imagen" type="hidden" value="{{old('imagen')}}35dcbbde-9111-4a78-8d7a-3e96953558ec.png">
                        </div>
                         <input type="submit" value="Publicar" class="bg-sky-600 rounded inline-block">
                </form>
            </div>
        </div>
    </div>
@endsection

