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