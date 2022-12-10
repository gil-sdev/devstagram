<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Devstagram: @yield('titulo')</title>
        <!-- Se hace instancia del css de Tailwin css -->
        @vite('resources/css/app.css')
        <!-- etiquta que ayuda llamar estilos de uso de no solo una vez 
            se usara usando la directiva push desde create.blade.php

                    stack('style')
        -->      
        @stack('scripts')
        @stack('styles')
        @vite('resources/js/app.js')
        <link href="{{asset('css/app.cs')}}" rel="stylesheet">
        <script src="{{asset('/js/app.js')}}" defer=""></<script> 
        </script> 
    </head>
    <body class="bg-gray-100">
            <header class="p-5 border-b bg-white" shadow>
                <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                   <a href="{{ route('home') }}" class="text-3xl font-black"> 
                    Devstagram
                </a>
                </h1>

                <!-- primera forma de autenticar -->
                <!-- Segunda forma de autenticar -->
                @auth
                <nav class="flex gap-2 items-center">
                    <!-- heroicons at heroicons.com -->
                    <a href="{{route('post.create')}}" class="flex items-center grap-2 bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>                     
                    Crear
                </a>
                </nav>   
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="front-bold uppercase text-gray-600 text-sm" value="Cerrar sesion">
                        Cerrar sesion
                        </button>
                    </form>
                @endauth
                
                @guest
                <nav>
                    <a href="{{route('login')}}" class="font-bold uppercase">Ingresar</a>
                    <a href="{{route('register')}}" class="font-bold uppercase">Crear cuenta</a>
                </nav>  
                @endguest

 
                </div>
            </header>
            <main class="container mx-auto mt-18">
                <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
                @yield('contenido')
                
                <br>
            </main>
            <footer>
                <hr>
                Devstagram - Todos los derechos reservados 
                @php echo date('Y') @endphp
                <br>
                Fecha del servidor:
                {{now() }}
            </footer>

        

    </body>
</html>
