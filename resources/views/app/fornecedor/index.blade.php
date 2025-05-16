@extends('app.layouts.base')
@section('titulo')
    Super Gestor - Fornecedor
@endsection

@section('conteudo')
    <div class="titulo-pagina-2">
        <h1>Fornecedores</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ">
                            <li class="nav-item">
                                <a href=" {{ route('app.fornecedores.create') }} " class="nav-link active"><i class="fas fa-plus-circle"></i> NOVO FORNECEDOR</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($type))
                    <div id="alert" style="display: none" class="alert alert-{{$type}}" role="alert">
                        {{$msg}}
                    </div>    
                    @endif
                    
                    <table id="table-datatable" class="table table-bordered table-striped table-hover table-responsve-md dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>NOME</th>
                                <th>E-mail</th>
                                <th>UF</th>
                                <th>SITE</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fornecedores as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->nome}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->uf}}</td>
                                    <td>{{$row->site}}</td>
                                    {{-- <td>{{date('d/m/Y', strtotime($row->funcionario->data_admissao))}}</td> --}}
                                    
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-light" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                <a href="{{ route('app.fornecedores.edite', $row->id) }}" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Editar </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('app.fornecedores.show', $row->id) }}" class="dropdown-item"><i class="fa-solid fa-eye"></i> Visualizar </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger" onclick="remover({{$row->id}})"><i class="fa-solid fa-trash"></i> Remover </a>
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
                    <div class="d-flex justify-content-end" style="display: inline">
                        {{$fornecedores->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Removendo o registro --}}
<script>
    function remover(fornecedor){
        $confirmacao = confirm('Tem certeza que deseja remover este Fornecedor?');

        if($confirmacao){
            window.location.href = "{{url('/')}}/app/fornecedores/"+fornecedor+"/destroy"
        }
    }
</script>