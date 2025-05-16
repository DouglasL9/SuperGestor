<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Produtodetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutodetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        return view('app.produto_detalhe.create', compact('unidades', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $msg = '';
        $type = '';
        $request->validate([
            'altura' => 'required',
            'largura' => 'required',
            'comprimento' => 'required',
            'unidade_id' => 'exists:unidades,id|required|integer',
            'produto_id' => 'exists:produtos,id|required|integer',
        ],
        [
            'altura.required' => 'O campo altura precisa ser preenchido',
            'largura.required' => 'O campo largura precisa ser preenchido',
            'comprimento.required' => 'O campo comprimento precisa ser preenchido', 
            'unidade_id.required' => 'O campo unidade precisa ser preenchido',
            'produto_id.required' => 'O campo produto precisa ser preenchido',
        ]
        );

        if (Produtodetalhe::where('produto_id', $request->produto_id)->first()) {
            return back()->withErrors('Detalhe do Produto já cadastrado');
        }
        
        try {
            Produtodetalhe::create($request->all());
            return redirect()->route('app.produto-detalhe.index');
        } catch (\Throwable $th) {
            $msg = 'Falha ao realizar cadastro';
            $type = 'info';
            dd($th->getMessage());
            return redirect()->route('app.produto-detalhe.create',compact('msg', 'type'));
        }

        $type = 'success';
        $msg = 'Cadastro realizado com sucesso!';
        return redirect()->route('app.produto-detalhe.index',compact('msg', 'type'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edite(Produtodetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();
        return view('app.produto_detalhe.edite', compact('unidades', 'produtos', 'produto_detalhe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produtodetalhe $produto_detalhe)
    {
        if (Produtodetalhe::where('id', '!=', $produto_detalhe->id)->where('produto_id', $request->produto_id)->first()) {
            return back()->with('error', 'Detalhe de Produto já Cadastrado');
        }
        DB::beginTransaction();
        try {
            $produto_detalhe->update($request->all());
            DB::commit();
            return redirect()->route('app.produto-detalhe.edite', $produto_detalhe->id)->with('success', 'Detalhe de produto atualizado com sucesso!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Atualização não realizada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
