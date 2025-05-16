
<div style="width: 30%; margin-left: auto; margin-right: auto;" class="contato-principal">
    @if(isset($produto_detalhe))
    <form action="{{route('app.produto-detalhe.update', $produto_detalhe->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('app.produto-detalhe.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="col">
        <div class="form-floating">
            <select class="form-select" name="produto_id" id="produto_id">
                <option value="">Selecione...</option>
                @foreach ($produtos as $key => $produto)
                    <option value="{{$produto->id}}" {{ ($produto_detalhe->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>    
                @endforeach
            </select>
            <label for="produto_id">produto</label>
        </div>
        @if($errors->has('produto_id'))
            <div style="
                text-align: left;
                width: 99.3%;
                background: red;
                color: white;
                margin-top: -10px;
                padding: 5px;
            ">
                {{$errors->first('produto_id')}}
            </div>
        @endif
    </div>
        <br>
        
        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="comprimento" placeholder="comprimento" id="comprimento" value="{{ isset($produto_detalhe) ? $produto_detalhe->comprimento : old('comprimento')}}">
                <label for="comprimento">comprimento</label>
            </div>
            @if($errors->has('comprimento'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('comprimento')}}
                </div>
            @endif
        </div>
        <br>

        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="largura" placeholder="largura" id="largura" value="{{ isset($produto_detalhe) ? $produto_detalhe->largura : old('largura')}}">
                <label for="largura">largura</label>
            </div>
            @if($errors->has('largura'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('largura')}}
                </div>
            @endif
        </div>
        <br>

        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="altura" placeholder="altura" id="altura" value="{{ isset($produto_detalhe) ? $produto_detalhe->altura : old('altura')}}">
                <label for="altura">altura</label>
            </div>
            @if($errors->has('altura'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('altura')}}
                </div>
            @endif
        </div>
        <br>

        <div class="col">
            <div class="form-floating">
                <select class="form-select" name="unidade_id" id="unidade_id">
                    <option value="">Selecione...</option>
                    @foreach ($unidades as $key => $unidade)
                        <option value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->unidade }}</option>    
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

        <hr>
        
        <div class="row">
            <div class="col-md-6">
                {{-- {!! isset($produto_detalhe) ? <a href="{{route('app.produtos.show', $produto_detalhe->produto_id)}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a> : <a href="{{route('app.produtos.show', $produto_detalhe->produto_id)}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>  !!}   --}}
                <a href="{{route('app.produtos.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-sm btn-success">{!!(isset($produto_detalhe)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            </div>
            
        </div>
    </form>
</div>