@extends('app.layouts.basico')
@section('titulo', 'Adicionar Jogo')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Cadastrar Novo Jogo</h1>
        </div>

    <div class="menu">
        <ul>
            @role('desenvolvedor')
                <li><a href=" {{ route('app.jogos.adicionar') }}"> Novo </a></li>
            @endrole
            @role('admin')
                <li><a href="{{ route('app.jogos') }}"> Consulta </a></li>

            @endrole

        </ul>
    </div>

    <div class="informacao-pagina">
        {{ $msg ?? '' }}
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action={{ route('app.jogos.cadastrar') }} method="post" enctype="multipart/form-data">
                @csrf
                <input name="nome" type="text" placeholder="Nome do jogo" class="borda-preta" required>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                <br>
                <select name="categoria" id="categoria" required>
                    <option value="">Selecione a categoria</option>
                    <option value="matematica">Matemática</option>
                    <option value="raciocinio">Raciocinio Lógico</option>
                    <option value="portugues">Lingua Portuguesa</option>
                </select>
                <br>
                <input name="autor" type="text" placeholder="Autor do jogo" class="borda-preta" required>
                {{ $errors->has('autor') ? $errors->first('autor') : '' }}
                <br>
                {{ $errors->has('categoria') ? $errors->first('categoria') : '' }}
                <input type="file" name="arquivo" id="arquivo" accept=".zip">
                <br>
                <textarea name="tutorial" id="tutorial" cols="30" rows="10" placeholder="Tutorial" required></textarea>
                <button type="submit" class="borda-preta"> Cadastrar</button>
                {{ $errors->has('arquivo') ? $errors->first('arquivo') : '' }}
            </form>
        </div>
    </div>
@endsection
