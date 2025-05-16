<?php

namespace App\Http\Controllers;

use App\Models\Motivocontato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = Motivocontato::all();
        return view('site.contato', compact('request', 'motivo_contatos'));
    }

    public function store( Request $request){

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivocontato_id' => 'required',
            'mensagem' => 'required|max:2000',
        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido', 
            'nome.min' => 'O campo nome precisa ter no minino 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no maximo 40 caracteres',

            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'email.required' => 'O campo email precisa ser preenchido',
            'email.email' => 'O campo e-mail precisa ser um e-mail válido',
            'motivocontato_id.required' => 'O campo motivo contato precisa ser preenchido',
            'mensagem.required' => 'O campo mensagem precisa ser preenchido',
            'mensagem.max' => 'O campo mensagem precisa ter no maximo 2000 caracteres',
        ]
        );
        // dd($request->all());
        SiteContato::create($request->all());

        return redirect()->route('site.index')->with('sucsses', 'Registro criado com sucesso.');
    }
}
