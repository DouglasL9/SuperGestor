
<div style="width: 30%; margin-left: auto; margin-right: auto;" class="contato-principal">
    @if(isset($cliente))
    <form action="{{route('app.clientes.update', $cliente->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
    <form action="{{route('app.clientes.store')}}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
        <div class="div-col">
            <div class="form-floating">
                <input type="text" class="form-control" name="nome" placeholder="Nome" id="nome" value="{{ isset($cliente) ? $cliente->nome : old('nome')}}">
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
                <a href="{{route('app.clientes.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-undo-alt"></i> CANCELAR</a>  
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-sm btn-success">{!!(isset($cliente)) ? '<i class="fas fa-sync"></i> ATUALIZAR' : '<i class="fas fa-save"></i> SALVAR'!!}</button>
            </div>
            
        </div>
    </form>
</div>