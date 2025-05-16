@extends('app.layouts.base')
@section('titulo')
    Super Gestor - Produto
@endsection

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produtos</h1>
        </div>
        
        <div class="informacao-pagina">
            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                            <div class="">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="{{ route('app.produtos.create') }}" class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO PRODUTO</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Nome</th>
                                        <th>Peso</th>
                                        <th>Unidade</th>
                                        <th>Descrição</th>
                                        <th>AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($produtos as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->nome}}</td>
                                            <td>{{$row->peso}}</td>
                                            <td>{{$row->unidade_id}}</td>
                                            <td>{{$row->descricao}}</td>
                                            {{-- <td>{{date('d/m/Y', strtotime($row->funcionario->data_admissao))}}</td> --}}
                                            
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-light" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                        <a href="{{ route('app.produtos.edite', $row->id) }}" class="dropdown-item"><i class="far fa-edit"></i> Editar</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ route('app.produtos.show', $row->id) }}" class="dropdown-item"><i class="fas fa-eye"></i> Visualizar</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}})"><i class="fas fa-trash"></i> Remover</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8"><span class="text-danger">Nenhum registro encontrado</span></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <br>
                            <div class="d-flex">
                                {{$produtos->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection


@section('content')

    

@endsection

{{-- Removendo o registro --}}
<script>
    function remover(produto){
        $confirmacao = confirm('Tem certeza que deseja remover este Funcionário?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/app/produtos/"+produto+"/destroy"
        }
    }
</script>