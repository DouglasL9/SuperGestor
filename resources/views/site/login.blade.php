@extends('site.layouts.base')
@section('titulo')
    Super Gestor - Login
@endsection
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <label for="usuario" style="margin-left:0px; ">Usuário</label>
                    <input type="text" name="usuario" value="{{ old('usuario') }}" placeholder="Usuário" class="borda-preta">
                    @if($errors->has('usuario'))
                        <div style="
                            text-align: left;
                            width: 98%;
                            background: red;
                            color: white;
                            margin-top: -10px;
                            padding: 5px;
                        ">
                            {{$errors->first('usuario')}}
                        </div>
                    @endif

                    <label for="senha" style="margin-left:0px; ">Senha</label>
                    <input type="password" name="senha" placeholder="Senha" class="borda-preta">
                    @if($errors->has('senha'))
                        <div style="
                            text-align: left;
                            width: 98%;
                            background: red;
                            color: white;
                            margin-top: -10px;
                            padding: 5px;
                        ">
                            {{$errors->first('senha')}}
                        </div>
                    @endif
                    {!! isset($erro) && $erro != '' ? "<div style='
                    text-align: center;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                '>
                    $erro
                </div>" : '' !!}
                    <button type="submit" class="borda-preta"> ENTRAR </button>
                </form>
                
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
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection