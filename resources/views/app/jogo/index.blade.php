@extends('app.layouts.basico')
@section('titulo', 'Jogos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Upload de Jogos</h1>
        </div>

        <div class="menu">
            <ul>
                @role('desenvolvedor')
                    <li><a href=" {{ route('app.jogos.adicionar') }}"> Novo </a></li>
                    <li><a href=" {{ route('app.jogos.mais_jogados') }}"> Mais jogados </a></li>
                @endrole
                @role('admin')

                @endrole
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 60%; margin-left: auto; margin-right: auto;">
                <table border="4" width="100%">
                    <thead>
                        <tr>
                            <th> Nome </th>
                            <th> Categoria </th>
                            <th> Status </th>
                            <th> Tutorial </th>
                            <th> Ação </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jogos as $jogo)
                            <tr>
                                <td> {{ $jogo->nome }} </td>
                                <td> {{ $jogo->categoria }} </td>
                                <td> {{ $jogo->status }} </td>
                                <td> <a href="#" id="btnModal" data-id={{ $jogo->id}}
                                    onclick="abrirModal(this);">Como Jogar?</a>
                                    <input type="hidden" id="txt-tutorial-{{ $jogo->id }}" name="txt-tutorial-{{ $jogo->id }}"
                                    value="{{ $jogo->tutorial }}"> </td>

                                <td>
                                    @if ($jogo->status == 'pendente')
                                        <a href="#" onclick="event.preventDefault();
                                    document.getElementById('aprovar-{{ $jogo->id }}').submit();"> Aprovar </a>

                                        <a href="#" onclick="
                                        event.preventDefault();
                                        reprovar(this)" data-id="{{ $jogo->id }}"> Reprovar </a>

                                        <a href="#" id="btnModal" data-id={{ $jogo->id}} onclick="abrirModal(this);">Tutorial</a>
                                        <input type="hidden" id="txt-tutorial-{{ $jogo->id }}" name="txt-tutorial-{{ $jogo->id }}" value="{{ $jogo->tutorial }}">
                                        <form id="aprovar-{{ $jogo->id }}"
                                            action="{{ route('app.jogos.aprovar', $jogo->id) }}" method="POST">
                                            @method('put')
                                            @csrf
                                        </form>

                                        <form id="reprovar-{{ $jogo->id }}"
                                            action="{{ route('app.jogos.reprovar', $jogo->id) }}" method="POST">
                                            @method('put')
                                            <input type="hidden" name="motivo_reprovacao"
                                                id="motivo_reprovacao_{{ $jogo->id }}">
                                            @csrf
                                        </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="modalTutorial" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Tutorial</h2>
                    </div>
                    <div class="modal-body">
                        <p id="tutorialTxt"></p>
                    </div>
                </div>
            </div>
        @endsection

        @section('js')
            <script>
                function reprovar(d) {
                    var idJogo = d.getAttribute('data-id');
                    var motivo = window.prompt('Informe o motivo da reprovação')
                    if (motivo == null || motivo == "") {
                        return false;
                    } else {
                        document.getElementById('motivo_reprovacao_' + idJogo).value = motivo
                        document.getElementById('reprovar-' + idJogo).submit();
                    }
                }

                var modal = document.getElementById("modalTutorial");
                var btn = document.getElementById("btnModal");
                var span = document.getElementsByClassName("close")[0];
                var textoTutorial = document.getElementById("tutorialTxt");

                function abrirModal(d) {
                    modal.style.display = "block";
                    var jogoId = d.getAttribute('data-id');
                    var texto = document.getElementById('txt-tutorial-' + jogoId).value;
                    textoTutorial.innerHTML = texto
                }

                span.onclick = function() {
                    modal.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>
        @endsection

        @section('css')
            <style>
                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgb(0, 0, 0);
                    background-color: rgba(0, 0, 0, 0.4);
                }

                .modal-content {
                    background-color: #fefefe;
                    margin: 15% auto;
                    padding: 20px;
                    border: 1px solid #888;
                    width: 80%;
                }

                .close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                }

                .close:hover,
                .close:focus {
                    color: black;
                    text-decoration: none;
                    cursor: pointer;
                }

                .modal-header {
                    padding: 2px 16px;
                    background-color: #2a9ee2;
                    color: white;
                }

                .modal-header h2 {
                    color: white;
                }

                .modal-body {
                    padding: 2px 16px;
                }

                .modal-content {
                    position: relative;
                    background-color: #fefefe;
                    margin: auto;
                    padding: 0;
                    border: 1px solid #888;
                    width: 80%;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    animation-name: animatetop;
                    animation-duration: 0.4s
                }

                @keyframes animatetop {
                    from {
                        top: -300px;
                        opacity: 0
                    }

                    to {
                        top: 0;
                        opacity: 1
                    }
                }

            </style>
        @endsection
