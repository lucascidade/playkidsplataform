{{ $slot }}
<form method="post" action=" {{ route('site.cadastrar') }}">
    @csrf
    <select name="tipo_usuario" id="tipo_usuario">
        <option value="" disabled selected>Selecione o tipo de usuário</option>
        <option value="desenvolvedor">Desenvolvedor</option>
        <option value="usuario_normal">Usuário comum</option>
    </select>
    <input name="name" type="text" placeholder="Nome" class="{{ $classe }}">
    {{ $errors->has('name') ? $errors->first('name') : '' }}
    <br>
    <input name="password" type="password" placeholder="Senha" class="{{ $classe }}">
    {{ $errors->has('password') ? $errors->first('password') : '' }}
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}"> REGISTRAR</button>
</form>

