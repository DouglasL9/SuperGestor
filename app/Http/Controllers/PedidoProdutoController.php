<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        return view('app.pedido._produto.create', compact('produtos', 'pedido'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $request->validate(
            [
            'produto_id' => 'exists:produtos,id|required',
            'pedido_id' => 'exists:pedidos,id|required',
            ],
            [
                'produto_id.required' => 'Necessário selecionar um produto.',
                'pedido_id.required' => 'Necessário selecionar um pedido.',
            ]
        );
        
        DB::beginTransaction();
        try {

            $pedido->produtos()->attach(
                $request['produto_id'],
                [
                    'quantidade' => $request['quantidade']
                ],
            );

            // PedidoProduto::create(
            //     [
            //         'produto_id' => $request['produto_id'],
            //         'pedido_id' => $pedido->id,
            //         'quantidade' => $request['quantidade'],
            //     ]
            // );
            DB::commit();
            return redirect()->route('app.pedido-produtos.create', $pedido->id)->with('success', 'Produto adicionado com sucesso!!!');

        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Não foi possível cadastrar produto ao pedido');
        }
        
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
    public function edit(string $id)
    {
        //
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
    public function destroy(PedidoProduto $pedido_produtos, Pedido $pedido)
    {
        DB::beginTransaction();
        try {
            $pedido_produtos->delete();
            DB::commit();
            return redirect()->route('app.pedidos.show', $pedido->id)->with('success', 'Produto removido com sucesso!!!');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('erros', 'Não foi possível remover produto');
        }
        
    }
}
