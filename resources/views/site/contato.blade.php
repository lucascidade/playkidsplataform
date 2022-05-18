@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível</p>
                <p>Nosso tempo médio de resposta é de 48 horas</p>
                <input name="email" type="text" placeholder="E-mail" class="borda-preta" required>
                <textarea name="feed" id="feed" cols="30" rows="10" placeholder="Escreva sua dúvida ou sugestão" required></textarea>
                <button type="submit" class="borda-preta"> Enviar </button>
            </div>
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
            <span>lucas@dev.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
