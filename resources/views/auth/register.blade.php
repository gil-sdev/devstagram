@extends('layouts.app')
@section('titulo')
    Registrarse en DevStagram
@endsection

@section('contenido')
<div class="md:flex justify-center" >
    <div class="mb:flex md:justify-center md:gap-10 md:items-center">
        <img src="{{asset('img/login.png')}}" alt="Imagen">
    </div>
    <div class="md:w-4/12 bg-white shadow-xl md:items-center">
        <form action="/crear-cuenta" method="POST">
            <!-- directiva de seguridad  implementa un token -->
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-teal-500 font-bold">  Nombre  </label>
                <input id="name" name="name" type="text" placeholder="Nombre" class="border p-3 w-full rounded-lg">
            </div>
                <div class="mb-5">       
                <label for="username" class="mb-2 block uppercase text-teal-500 font-bold">   Nombre de usaurio </label>
                <input id="username" name="username" type="text"  placeholder="Usuario" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-teal-500 font-bold">   Email </label>
                <input id="email" name="email" type="email"  placeholder="Email" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-teal-500 font-bold">   Contraseña </label>
                    <input id="password" name="password" type="password"  placeholder="Contraseña" class="border p-3 w-full rounded-lg">
                 </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-teal-500 font-bold">   Confirmar Contraseña </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"  placeholder="Confirmar Contraseña" class="border p-3 w-full rounded-lg">
                 </div>
                 <input type="submit" value="Crear Cuenta" class="bg-sky-600 ">
        </form>
    </div>
</div>
@endsection