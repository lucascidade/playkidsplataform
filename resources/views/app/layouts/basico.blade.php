<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>PLAYKIDS - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
        @yield('css')
    </head>

    <body>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
        @yield('js')
    </body>
</html>
