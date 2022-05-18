@extends('app.layouts.basico')
@section('titulo', 'Jogos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Mais Jogados</h1>
        </div>

    <div class="informacao-pagina">
        <div style="width: 60%; margin-left: auto; margin-right: auto;">
        <table border="4" width="100%">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Categoria </th>
                    <th> Autor </th>
                    <th> Ação </th>
                </tr>
            </thead>
                <tbody>
                    @foreach ( $jogos as $jogo )
                        <tr>
                            <td> {{ $jogo->nome }} </td>
                            <td> {{ $jogo->categoria }} </td>
                            <td> {{ $jogo->autor }} </td>
                            <td>
                                <a href="{{ route('app.jogos.executar', $jogo->id) }}">Jogar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
