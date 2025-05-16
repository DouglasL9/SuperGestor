<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Início</a></li>
            <li><a href="{{ route('app.clientes.index') }}">Clientes</a></li>
            <li><a href="{{ route('app.pedidos.index') }}">Pedidos</a></li>
            <li><a href="{{ route('app.fornecedores.index') }}">Fornecedores</a></li>
            <li><a href="{{ route('app.produtos.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>