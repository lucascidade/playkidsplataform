@extends('app.layouts.basico')
@section('titulo', 'Jogos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Relatório de Jogos</h1>
        </div>

    <div class="informacao-pagina">
        <div style="width: 60%; margin-left: auto; margin-right: auto;">
        <table border="4" width="100%">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Categoria </th>
                    <th> Autor </th>
                    <th> Status </th>
                    <th> Motivo Reprovação  </th>
                </tr>
            </thead>
                <tbody>
                    @foreach ( $jogos as $jogo )
                        <tr>
                            <td> {{ $jogo->nome }} </td>
                            <td> {{ $jogo->categoria }} </td>
                            <td> {{ $jogo->autor }} </td>
                            <td> {{ $jogo->status }} </td>
                            <td> {{ $jogo->status == 'reprovado' ? $jogo->motivo_reprovacao : '' }} </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
