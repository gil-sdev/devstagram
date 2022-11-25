@extends('layouts.app')
@section('titulo')
    Ingresar
@endsection

@section('contenido')
<div class="md:flex justify-center" >
    <div class="mb:flex md:justify-center md:gap-10 md:items-center">
        <img src="{{asset('img/user.png')}}" alt="Imagen">
    </div>
    <div class="md:w-4/12 bg-white shadow-xl md:items-center">
        <form action="{{route('login')}}" method="POST" novalidate>
            <!-- directiva de seguridad  implementa un token -->
            @csrf

            @if (session('mensaje'))

            <!-- session fue creado en Llogin controler con sus respectivos valores -->
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{session('mensaje')}}</p>   
            @endif
                <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-teal-500 font-bold">   Email </label>
                <input id="email" name="email" type="email"  placeholder="Email" class="border p-3 w-full rounded-lg @error('email')
                border-red-500 
                @enderror"
                value="{{ old('email')}}" >
                </div>
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
               @enderror

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-teal-500 font-bold">   Contraseña </label>
                    <input id="password" name="password" type="password"  placeholder="Contraseña" class="border p-3 w-full rounded-lg">
                 </div>
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
               @enderror
                 <div class="mb-5">
                    <input type="checkbox" name="remember"> <label class="mb-2 text-gray-500 text-sm">Mantener sesion abierto</label>
                 </div>

               <input type="submit" value="Iniciar" class="bg-sky-600 ">
        </form>
    </div>
</div>
@endsection