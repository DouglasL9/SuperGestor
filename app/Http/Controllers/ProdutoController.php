<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::cursorPaginate(10);
        $msg = $request['msg'];
        $type = $request['type'];
        return view('app.produto.index', compact('produtos', 'type', 'msg'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        
        return view('app.produto.create', compact('unidades','fornecedores'));
    }

    public function edite(Request $request, Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        
        return view('app.produto.edite', compact('unidades', 'fornecedores', 'produto'));
    }

    public function show(Request $request, Produto $produto)
    {
        return view('app.produto.show', compact('produto'));
    }

    public function store(Request $request)
    {
        $msg = '';
        $type = '';
        $request->validate([
            'nome' => 'required|min:3',
            'peso' => 'required',
            'unidade_id' => 'exists:unidades,id|required|integer',
            'fornecedor_id' => 'exists:fornecedores,id|required|integer',
            'descricao' => 'min:3',
        ],
        [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'peso.required' => 'O campo peso precisa ser preenchido',  
            'nome.min' => 'O campo nome precisa ter no minino 3 caracteres',
            'unidade_id.required' => 'O campo unidade precisa ser preenchido',
            'fornecedor_id.required' => 'O campo fornecedor precisa ser preenchido',
            'unidade_id.integer' => 'O campo unidade precisa ser um número inteiro',
            'descricao.min' => 'O campo descricao precisa ter no minino 3 caracteres',
        ]
        );

        if (Produto::where('nome', $request->nome)->first()) {
            return back()->withErrors('Produto já cadastrado');
        }
        
        try {
            Produto::create($request->all());
        } catch (\Throwable $th) {
            $msg = 'Falha ao realizar cadastro';
            $type = 'info';
            return redirect()->route('app.produtos.create',compact('msg', 'type'));
        }

        $type = 'success';
        $msg = 'Cadastro realizado com sucesso!';
        return redirect()->route('app.produtos.index',compact('msg', 'type'));
    }

    public function update(Request $request, Produto $produto){
        
        if (Produto::where('id', '!=', $produto->id)->where('nome', $request->nome)->first()) {
            return back()->with('error', 'Produto já Cadastrado');
        }
        DB::beginTransaction();
        try {
            // dd($request->all());
            $produto->update($request->all());
            
            DB::commit();
            return redirect()->route('app.produtos.edite', $produto->id)->with('success', 'Fornecedor atualizado com sucesso!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back()->with('error', 'Atualização não realizada!');
        }
    }

    public function destroy(Produto $produto){
        
        DB::beginTransaction();
        try {
            $produto->delete();
            DB::commit();
            return redirect()->route('app.produtos.index')->with('success', 'Produto deletado com sucesso!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Erro ao excluir produto!');
        }
    }
}