@extends('app.layouts.basico')
@section('titulo', 'Jogos')

@section('css')
<style>
    .informacao-pagina {
        text-align: left;
        margin-top: 0;
    }
</style>
@endsection
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>{{ $jogo->nome }}</h1>
        </div>

        <div class="informacao-pagina" id="parent" style="width: 80%; margin-left: auto; margin-right: auto; height: 100%">
            <div id="wrapper" style="position:relative">
                <iframe style="position:absolute;top:0px;width:100%;height:100vh;" src="/storage/jogos_aprovados/{{ $jogo->nome_pasta }}"></iframe>
            </div>
        </div>
        {{-- <div class="informacao-pagina">
            <div style="width: 80%; margin-left: auto; margin-right: auto; height: 100%">
                <iframe src="/storage/jogos_aprovados/{{ $jogo->nome_pasta }}" scrolling="no" frameborder="0"
                    style="position: relative; height: 100%; width: 100%;"></iframe>
            </div>
        </div> --}}
    </div>
@endsection
