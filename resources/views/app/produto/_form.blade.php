
<div style="width: 30%; margin-left: auto; margin-right: auto;" class="contato-principal">
    @if(isset($produto))
    <form action="{{route('app.produtos.update', $produto->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('app.produtos.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
        <div class="col">
            <div class="form-floating">
                <select class="form-select" name="fornecedor_id" id="fornecedor_id">
                    <option value="">Selecione...</option>
                    @foreach ($fornecedores as $key => $fornecedor)
                        <option value="{{$fornecedor->id}}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }} >{{ $fornecedor->nome }}</option>    
                    @endforeach
                </select>
                <label for="fornecedor_id">Fornecedor</label>
            </div>
            @if($errors->has('fornecedor_id'))
                <div style="
                    text-align: left;
                    width: 99.3%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('fornecedor_id')}}
                </div>
            @endif
        </div>
        <br>
        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="nome" placeholder="Nome" id="nome" value="{{ isset($produto) ? $produto->nome : old('nome')}}">
                <label for="nome">Nome</label>
            </div>
            @if($errors->has('nome'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('nome')}}
                </div>
            @endif
        </div>
        <br>
        
        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="peso" placeholder="peso" id="peso" value="{{ isset($produto) ? $produto->peso : old('peso')}}">
                <label for="peso">Peso</label>
            </div>
            @if($errors->has('peso'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('peso')}}
                </div>
            @endif
        </div>
        <br>

        <div class="col">
            <div class="form-floating">
                <select class="form-select" name="unidade_id" id="unidade_id">
                    <option value="">Selecione...</option>
                    @foreach ($unidades as $key => $unidade)
                        <option value="{{$unidade->id}}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->unidade }}</option>    
                    @endforeach
                </select>
                <label for="unidade_id">Unidade</label>
            </div>
            @if($errors->has('unidade_id'))
                <div style="
                    text-align: left;
                    width: 99.3%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('unidade_id')}}
                </div>
            @endif
        </div>
        <br>

        <div class="col">
            <div class="form-floating">
                <textarea name="descricao" placeholder="" class="form-control" id="descricao" rows="3">{{isset($produto) ? $produto->descricao : old('descricao')}}</textarea>
                <label for="descricao">Descrição</label>
            </div>
        </div>

        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('app.produtos.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>  
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-sm btn-success">{!!(isset($produto)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            </div>
            
        </div>
    </form>
</div>