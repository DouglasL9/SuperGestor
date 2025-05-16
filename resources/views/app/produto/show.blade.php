@extends('app.layouts.base')
@section('titulo')
    Super Gestor - Produto
@endsection

@section('conteudo')

    <div class="row">
        <div class="titulo-pagina-2">
            <h1>Produtos</h1>
        </div>
        <div class="col-md-12" style="width: 70%; margin-left: auto; margin-right: auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{$produto->nome}} </h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="callout callout-info">
                                <b>ID: </b> {{$produto->id}}<br>
                                <b>Peso: </b> {!!($produto->peso) ? '<span class="text-primary">' . $produto->peso . '</span>' : '<span class="text-danger">Não informado</span>'!!}<br>
                                <b>Descrição: </b> {{$produto->descricao}}<br>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold">
                            <h5 style="color: white">Fornecedor</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-responsive-md">
                                <thead class="table-info">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Uf</th>
                                        <th>Site</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($produto->fornecedor)
                                    <tr>
                                        <td>{{ $produto->fornecedor->nome}}</td>
                                        <td>{{ $produto->fornecedor->uf}}</td>
                                        <td>{{ $produto->fornecedor->site}}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                    <a href="{{ route('app.fornecedores.show', $produto->fornecedor->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Visualizar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    <tr><td colspan="4"><span class="text-danger">Nenhum registro encontrado.</span></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header bg-primary font-weight-bold">
                            <h5 style="color: white">Detalhes do Produto</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-responsive-md">
                                <thead class="table-info">
                                    <tr>
                                        <th>Comprimento</th>
                                        <th>Largura</th>
                                        <th>Altura</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($produto->detalhes)
                                    <tr>
                                        
                                        <td>{{ number_format($produto->detalhes->comprimento, 2, ',','.') }} cm</td>
                                        <td>{{ number_format($produto->detalhes->largura, 2, ',','.') }} cm</td>
                                        <td>{{ number_format($produto->detalhes->altura, 2, ',','.') }} cm</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                    <a href="{{ route('app.produto-detalhe.edite', $produto->detalhes->id) }}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$produto->detalhes->id}})"><i class="fas fa-trash"></i> Remover</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @else
                                    <div class="">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a href="{{ route('app.produto-detalhe.create') }}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO DETALHES</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <tr><td colspan="4"><span class="text-danger">Nenhum registro encontrado.</span></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>


                    {{-- <div class="callout-info">
                        <h5><i class="fas fa-angle-right"></i> Detalhes do Produto</h5>
                        <hr>
                        <table class="table table-bordered table-striped table-hover table-responsive-md dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th>Comprimento</th>
                                    <th>Largura</th>
                                    <th>Altura</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produto->detalhes as $produto_detalhe)
                                    <tr>
                                        <td>{{ number_format($produto_detalhe->comprimento, 2, ',','.') }} cm</td>
                                        <td>{{ number_format($produto_detalhe->largura, 2, ',','.') }} cm</td>
                                        <td>{{ number_format($produto_detalhe->altura, 2, ',','.') }} cm</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                    <a href="{{ route('app.produto-detalhe.edite', $produto_detalhe->id) }}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$produto_detalhe->id}})"><i class="fas fa-trash"></i> Remover</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3"><span class="text-danger">Nenhum registro encontrado.</span></td></tr>
                                @endforelse
                            </tbody>
                        </table>                        
                    </div> --}}

                    <hr>
                    <div class="dropdown-divider"></div>
                    <div class="row col-md-12">
                        <div class="mr-2">
                            <a href="{{route('app.produtos.index', $produto->id)}}" class="btn btn-outline-danger"><i class="fas fa-undo"></i> Voltar</a>
                                        
                            {{-- @if (($produto->id == auth()->usuario()->id ) || ( auth()->usuario()->companies->firstWhere('superadmin', 1))) --}}
                                
                                <a href="{{ route('app.produtos.edite', $produto->id) }}" class="btn btn-outline-success"><i class="fas fa-edit"></i> Editar </a>
                            
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Removendo o registro --}}
<script>
    function remover(fornecedor){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/construtoras/"+company+"/funcionarios/"+funcionario+"/destroy"
        }
    }
</script>