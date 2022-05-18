<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo2.png') }}">

    </div>
    <div class="menu">
        <ul>
            <li><a href=" {{ route('app.principal') }}">Principal</a></li>
            @hasanyrole('usuario_normal')
            <li><a href=" {{ route('app.jogos.mais_jogados') }}">Mais Jogados</a></li>
            <li><a href=" {{ route('app.categorias') }}">Categorias</a></li>
            @endhasanyrole
            @hasrole('desenvolvedor|admin')
            <li><a href=" {{ route('app.jogos.relatorio') }}">Relatório</a></li>
            @endhasrole
            @hasanyrole('desenvolvedor|admin')
            <li><a href=" {{ route('app.jogos') }}">Jogos</a></li>
            @endhasanyrole
            @role('desenvolvedor')
                    <li><a href=" {{ route('app.jogos.mais_jogados') }}"> Mais jogados </a></li>
                @endrole
            @role('admin')
                <li><a href=" {{ route('app.jogos.mais_jogados') }}"> Mais jogados </a></li>
                <li><a href=" {{ route('app.categorias') }}">Categorias</a></li>
                @endrole
            <li><a href="{{ route('site.sair') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                >Sair</a></li>

            <form id="logout-form" action="{{ route('site.sair') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>
