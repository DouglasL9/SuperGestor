{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
        @if($errors->has('nome'))
            <div style="
                text-align: left;
                width: 99.3%;
                background: red;
                color: white;
                margin-top: -10px;
                padding: 5px;
            ">
                {{$errors->first('nome')}}
            </div>
        @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
        @if($errors->has('telefone'))
            <div style="
                text-align: left;
                width: 99.3%;
                background: red;
                color: white;
                margin-top: -10px;
                padding: 5px;
            ">
                {{$errors->first('telefone')}}
            </div>
        @endif
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
        @if($errors->has('email'))
            <div style="
                text-align: left;
                width: 99.3%;
                background: red;
                color: white;
                margin-top: -10px;
                padding: 5px;
            ">
                {{$errors->first('email')}}
            </div>
        @endif
    <br>
    
    <select name="motivocontato_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $key => $motivo)
            <option value="{{$motivo->id}}" {{ (old('motivocontato_id') == $motivo->id ? 'selected' : '') }} >{{ $motivo->motivo_contato }}</option>    
        @endforeach
    </select>
        @if($errors->has('motivocontato_id'))
            <div style="
                text-align: left;
                width: 99.3%;
                background: red;
                color: white;
                margin-top: -10px;
                padding: 5px;
            ">
                {{$errors->first('motivocontato_id')}}
            </div>
        @endif
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Descreva sua mensagem aqui...">{{(old('mensagem') != '') ? old('mensagem') : ''}}</textarea>
        @if($errors->has('mensagem'))
            <div style="
                text-align: left;
                width: 99.3%;
                background: red;
                color: white;
                margin-top: -10px;
                padding: 5px;
            ">
                {{$errors->first('mensagem')}}
            </div>
        @endif
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

    
{{-- @if($errors->any())
    <div class="alert alert-danger" style="position: absolute; top: 0px; left: 0px; width: 100%; background: red; color: white;" role="alert">
        {{-- <pre> --}}
        {{-- <ul class="list">
            @foreach ($errors->all() as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul> --}}
        {{-- </pre> -- }}
    </div>
@endif --}}