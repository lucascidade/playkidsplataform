@extends('app.layouts.basico')
@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Cadastrar Novo Usuário</h1>
        </div>

    <div class="menu">
        <ul>
            <li><a href=" {{ route('app.usuario.adicionar') }}"> Novo </a></li>
            <li><a href="{{ route('app.principal') }}"> Consulta </a></li>

        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action={{ route('app.usuario.cadastrar') }} method="post">
                @csrf
                <select name="tipo_usuario" id="tipo_usuario">
                    <option value="" disabled selected>Selecione o tipo de usuário</option>
                    <option value="desenvolvedor">Desenvolvedor</option>
                    <option value="usuario_normal">Usuário comum</option>
                </select>
                <input name="name" type="text" value="{{ $user->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                {{ $errors->has('name') ? $errors->first('name') : '' }}
                <input type="hidden" name="id" value="{{ $user->id ?? '' }}">
                <br>
                <input name="password" value="{{ $user->password ?? old('password') }}" type="password" placeholder="Senha" class="borda-preta">
                {{ $errors->has('password') ? $errors->first('password') : '' }}
                <br>
                <input name="email" type="text" value="{{ $user->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <br>
                <button type="submit" class="borda-preta"> Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
