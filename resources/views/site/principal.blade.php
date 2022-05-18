@extends('site.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-destaque">
    @csrf
        <div class="esquerda">
            <div class="informacoes">
                <h1>Plataforma de Jogos PlayKids</h1>
                <p>Um solução digital no auxilio da educação infantil nas escolas públicas.<p>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Jogos Interativos e Educativos</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Aprendizado de forma lúdica e divertida</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('img/img2.png') }}">
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Cadastre-se</h1>
                @component('site.layouts._components.form_contato', ['classe' => 'borda-branca'])

                @endcomponent

            </div>
        </div>
    </div>
@endsection
