@extends('app.layouts.basico')
@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Consultar Cadastros!</h1>
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
        <div style="width: 60%; margin-left: auto; margin-right: auto;">
        <table border="4" width="100%">
            <thead>
                <tr>
                    <th> Nome: </th>
                    <th> E-mail: </th>
                    <th> Editar </th>
                    <th> Excluir </th>
                </tr>
            </thead>
                <tbody>
                    @foreach ( $users as $user )
                        <tr>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> <a href="{{ route('app.usuario.editar', $user->id) }}">  Editar </a></td>
                            <td> <a href="{{ route('app.usuario.excluir', $user->id) }}">  Excluir </a></td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
