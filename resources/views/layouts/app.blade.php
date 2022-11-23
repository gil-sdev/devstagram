<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Devstagram - @yield('titulo')</title>
        <!-- Se hace instancia del css de Tailwin css -->
        @vite('resources/css/app.css')
        <link href="{{asset('css/app.cs')}}" rel="stylesheet">
        <script src="{{asset('js/app.cs')}}" defer></<script>      
        </script>
    </head>
    <body class="bg-gray-100">
            <header class="p-5 border-b bg-white" shadow>
                <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>
                <nav>
                    <a href="#" class="font-bold uppercase">Ingresar</a>
                    <a href="#" class="font-bold uppercase">Crear cuenta</a>
                </nav>
                </div>
            </header>
            <main class="container mx-auto mt-18">
                <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
                @yield('contenido')
            </main>
            <footer>
                Devstagram - Todos los derechos reservados 
                @php echo date('Y') @endphp
                <br>
                Fecha del servidor:
                {{now() }}
            </footer>

        

    </body>
</html>
