@extends('app.layouts.basico')
@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Olá, bem-vindo!</h1>
        </div>

    <div class="menu">
        @hasrole('admin')
        <ul>
            <li><a href=" {{ route('app.usuario.adicionar') }}"> Novo </a></li>
            <li><a href="{{ route('app.principal') }}"> Consulta </a></li>
        </ul>
        @endhasrole
    </div>

    <div class="informacao-pagina">
        @hasrole('admin')
        {{ $msg ?? ''}}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="{{ route('app.usuario.consultar') }}" method="post">
                @csrf
                <input name="name" type="text" placeholder="Nome" class="borda-preta">
                {{ $errors->has('name') ? $errors->first('name') : '' }}
                <br>
                <input name="email" type="text" placeholder="E-mail" class="{{ "borda-preta" }}">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <br>
                <button type="submit" class="borda-preta"> Consultar Cadastros</button>
            </form>
        </div>
        @endhasrole
    </div>
@endsection
