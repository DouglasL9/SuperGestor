@extends('app.layouts.base')
@section('titulo')
    Super Gestor - Pedido
@endsection

@section('conteudo')
    <div class="row">
        <div class="titulo-pagina-2">
            <h1>Pedido</h1>
        </div>
        <div class="col-md-12" style="width: 70%; margin-left: auto; margin-right: auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{$pedido->cliente->nome}} </h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="row"> --}}
                        {{-- <div class="col-md-6"> --}}
                            {{-- <div class="callout callout-info"> --}}
                                {{-- <b>ID: </b> <br>
                                <b>E-mail: </b> {!!($pedido->cliente->nome) ? '<span class="text-primary">' . $pedido->cliente->nome . '</span>' : '<span class="text-danger">Não informado</span>'!!}<br> --}}
                                {{-- <b>Usuário autoriza pelo setor de engenharia ?: </b>
                                    @if ($pedido->pessoa->engenharia == 1)
                                        SIM
                                    @else
                                        NÃO
                                    @endif
                                <br> --}}
                                {{-- <b>Usuário autoriza pelo setor de segurança no trabalho ?: </b>
                                    @if ($pedido->pessoa->seguranca == 1)
                                        SIM
                                    @else
                                        NÃO
                                    @endif
                                <br> --}}
                                {{-- <b>Uf: </b> {{ $pedido->uf }}<br>
                                <b>Site: </b> {{$pedido->site}}<br> --}}
                            {{-- </div>
                            <br> --}}

                            <div class="card">
                                <div class="card-header bg-primary font-weight-bold">
                                    <h5 style="color: white">produtos</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-responsive-md">
                                        <thead class="table-info">
                                            <tr>
                                                <th>Pedido N°</th>
                                                <th>Produto</th>
                                                <th>Peso</th>
                                                <th>Quantidade</th>
                                                <th>Criado em</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse ($pedido->produtos as $key => $produto)
                                            <tr>
                                                <td>{{ $pedido->id }}</td>
                                                <td>{{ $produto->nome}}</td>
                                                <td>{{ $produto->peso}}</td>
                                                <td>{{ $produto->pivot->quantidade}}</td>
                                                <td>{{ date('d/m/Y', strtotime($produto->pivot->created_at) )}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-light" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                            <a href="{{ route('app.produtos.show', $produto->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Visualizar</a>

                                                            <div class="dropdown-divider"></div>
                                                            <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$produto->pivot->id}}, {{$pedido->id}})"><i class="fas fa-trash"></i> Remover</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a href="{{ route('app.pedido-produtos.create', $pedido->id) }}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO PEDIDO</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <tr><td colspan="4"><span class="text-danger">Nenhum registro encontrado.</span></td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- <div class="callout callout-info">
                                <b>Estado </b> 
                                {!!($usuario->active) ? '<span class="badge badge-pill badge-success">ATIVO</span>' : '<span class="badge badge-pill badge-danger">INATIVO</span>'!!}
                                    
                                { {--<br>
                                <b>Perfil </b> {!!($perfil) ? $perfil->nome : '<span class="badge badge-pill badge-danger">NÃO INFORMADO</span>' !!} --} }
                                
                                <br>
                            </div> --}}
                        {{-- </div> --}}
                        
                        {{-- <div class="callout callout-info col-md-6 border p-2 text-center">
                            <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/{{str_replace('public', 'storage', $usuario->imagem)}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">
                            @if($usuario->where('imagem_origem', 'c'))
                                <img class="img-fluid" src="{{url('/')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                            @else
                                <img class="img-fluid" src="{{env('APP_URL_GESTOR')}}/storage/{{$usuario->imagem}}" width="500" alt="{{mb_strtoupper($usuario->nome)}}" title="{{mb_strtoupper($usuario->nome)}}">    
                            @endif
                            
                        </div> --}}
                    {{-- </div> --}}
                    <hr>
                    <div class="dropdown-divider"></div>
                    <div class="row col-md-12">
                        <div class="mr-2" style="text-align: right">
                            <a href="{{route('app.pedidos.index', $pedido->id)}}" class="btn btn-outline-danger"><i class="fas fa-undo"></i> Voltar</a>
                                        
                            {{-- @if (($pedido->id == auth()->usuario()->id ) || ( auth()->usuario()->companies->firstWhere('superadmin', 1))) --}}
                                
                                <a href="{{ route('app.pedidos.edite', $pedido->id) }}" class="btn btn-outline-success"><i class="fas fa-edit"></i> Editar </a>
                            
                            {{-- @endif --}}
                            <a href="javascript:void(0)" class="btn btn-outline-danger" onclick="removerpedido({{$pedido->id}})"><i class="fas fa-trash"></i> Remover</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Removendo o registro --}}
<script>
    function remover(pedido_produtos, pedido){
        $confirmacao = confirm('Tem certeza que deseja remover este produto?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/app/pedido-produtos/"+pedido_produtos+"/pedido/"+pedido+"/destroy"
        }
    }
</script>

<script>
    function removerpedido(pedido){
        $confirmacao = confirm('Tem certeza que deseja remover este pedido?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/app/pedido/"+pedido+"/destroy"
        }
    }
</script>