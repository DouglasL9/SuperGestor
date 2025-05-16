<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        // $clientes = Cliente::paginate(10);
        $clientes = Cliente::cursorPaginate(10);
        
        return view('app.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            // 'site' => 'required',
            // 'email' => 'required|email',
            // 'uf' => 'required|min:2|max:2',
        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido', 
            'nome.min' => 'O campo nome precisa ter no minino 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no maximo 50 caracteres',

            // 'site.required' => 'O campo site precisa ser preenchido',
            // 'email.required' => 'O campo email precisa ser preenchido',
            // 'email.email' => 'O campo e-mail precisa ser um e-mail válido',
            // 'uf.required' => 'O campo mensagem precisa ser preenchido',
            // 'uf.min' => 'O campo uf precisa ter no minino 2 caracteres',
            // 'uf.max' => 'O campo uf precisa ter no maximo 2 caracteres',
        ]
        );

        if (Cliente::where('nome', $request->nome)->first()) {
            return back()->withErrors('Nome de usuário já utilizado');
        }

        try {
            Cliente::create($request->all());
            return redirect()->route('app.clientes.index');
        
        } catch (\Throwable $e) {
            return redirect()->route('app.clientes.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('app.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edite(Request $request, Cliente $cliente)
    {
        return view('app.cliente.create', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
