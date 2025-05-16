
<div style="width: 30%; margin-left: auto; margin-right: auto;" class="contato-principal">
    @if(isset($pedido_produto))
    <form action="{{route('app.pedido-produtos.update', $pedido_produto->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('app.pedido-produtos.store', $pedido->id)}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
        <table id="table-datatable" class="table table-bordered   table-hover table-responsve-md dataTable dtr-inline">
            <thead>
                <tr>
                    <th style="width: 10px" colspan="2">Detalhes do Pedido</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pedido: {{$pedido->id}}</td>
                    <td>Cliente: {{$pedido->cliente->nome}}</td>
                </tr>
            </tbody>
        </table>

        <input type="hidden" name="pedido_id" value="{{$pedido->id}}">

        <div class="col">
            <div class="form-floating">
                <select class="form-select" name="produto_id" id="produto_id">
                    <option value="">Selecione...</option>
                    @foreach ($produtos as $key => $produto)
                        <option value="{{$produto->id}}" {{ ($pedido_produto->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>    
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
        <div class="div-col">
            <div class="form-floating">
                <input type="text" class="form-control" name="quantidade" placeholder="quantidade" id="quantidade" value="{{ isset($pedido_produto) ? $pedido_produto->quantidade : old('quantidade')}}">
                <label for="quantidade">Quantidade</label>
            </div>
            @if($errors->has('quantidade'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('quantidade')}}
                </div>
            @endif
        </div>
        
        {{-- <div class="div-col">
            <div class="form-floating">
                <input type="text" class="form-control" name="site" placeholder="Site" id="site" value="{{ isset($cliente) ? $cliente->site : old('site')}}">
                <label for="site">Site</label>
            </div>
            @if($errors->has('site'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('site')}}
                </div>
            @endif
        </div>
        <br>

        <div class="div-col">
            <div class="form-floating">
                <input type="text" class="form-control" name="uf" placeholder="UF" id="uf" value="{{ isset($cliente) ? $cliente->uf : old('uf')}}">
                <label for="uf">UF</label>
            </div>
            @if($errors->has('uf'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('uf')}}
                </div>
            @endif
        </div>
        <br>

        <div class="div-col">
            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="E-mail" id="email" value="{{ isset($cliente) ? $cliente->email : old('email')}}">
                <label for="email">E-mail</label>
            </div>
            @if($errors->has('email'))
                <div style="
                    text-align: left;
                    width: 98%;
                    background: red;
                    color: white;
                    margin-top: -10px;
                    padding: 5px;
                ">
                    {{$errors->first('email')}}
                </div>
            @endif
        </div>
        <br> --}}
        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('app.pedidos.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>  
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-sm btn-success">{!!(isset($pedido_produto)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            </div>
        </div>
    </form>
</div>