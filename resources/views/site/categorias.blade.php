@extends('app.layouts.basico')

@section('titulo', 'Categorias')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Olá, escolha aqui a categoria de ensino para começar a aprender e se divertir!</h1>
        </div>

        <div class="informacao-pagina">
            <a href="{{ route('app.jogos.buscar', 'matematica')}}"> Matemática </a><br>
            <a href="{{ route('app.jogos.buscar', 'raciocinio')}}"> Raciocínio Lógico </a><br>
            <a href="{{ route('app.jogos.buscar', 'portugues')}}"> Língua Portuguesa </a><br>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(92) 9271-6561</span>
            <br>
            <span>lucascidade96@gmail.com</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
