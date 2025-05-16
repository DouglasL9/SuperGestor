<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\SobreNosController;
// use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//SITE
Route::get('/', [HomeController::class,'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobre_nos'])->name('site.sobre-nos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//APP
Route::group(['prefix'=>'app', 'as'=>'app.', 'middleware'=>['autenticacao']], function () {
    Route::get('/home', [HomeController::class, 'inicio'])
        ->name('home');

    Route::get('/sair', [LoginController::class, 'sair'])
        ->name('sair');

        Route::group(['prefix'=>'clientes', 'as'=>'clientes.'], function(){
            Route::get('/', [ClienteController::class, 'index'])
                ->name('index');
            Route::get('create', [ClienteController::class, 'create'])
                ->name('create');
            Route::post('store', [ClienteController::class, 'store'])
                ->name('store');
            Route::get('{cliente}/show', [ClienteController::class, 'show'])
                ->name('show');
            Route::get('{cliente}/edite', [ClienteController::class, 'edite'])
                ->name('edite');
            Route::put('{cliente}/update', [ClienteController::class, 'update'])
                ->name('update');
            Route::get('{cliente}/destroy', [ClienteController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'pedidos', 'as'=>'pedidos.'], function(){
            Route::get('/', [PedidoController::class, 'index'])
                ->name('index');
            Route::get('create', [PedidoController::class, 'create'])
                ->name('create');
            Route::post('store', [PedidoController::class, 'store'])
                ->name('store');
            Route::get('{pedido}/show', [PedidoController::class, 'show'])
                ->name('show');
            Route::get('{pedido}/edite', [PedidoController::class, 'edite'])
                ->name('edite');
            Route::put('{pedido}/update', [PedidoController::class, 'update'])
                ->name('update');
            Route::get('{pedido}/destroy', [PedidoController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'pedido-produtos', 'as'=>'pedido-produtos.'], function(){
            Route::get('/', [PedidoProdutoController::class, 'index'])
                ->name('index');
            Route::get('create/{pedido}', [PedidoProdutoController::class, 'create'])
                ->name('create');
            Route::post('store/{pedido}', [PedidoProdutoController::class, 'store'])
                ->name('store');
            Route::get('{pedido_produtos}/show', [PedidoProdutoController::class, 'show'])
                ->name('show');
            Route::get('{pedido_produtos}/edite', [PedidoProdutoController::class, 'edite'])
                ->name('edite');
            Route::put('{pedido_produtos}/update', [PedidoProdutoController::class, 'update'])
                ->name('update');
            Route::get('{pedido_produtos}/pedido/{pedido}/destroy', [PedidoProdutoController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'fornecedores', 'as'=>'fornecedores.'], function(){
            Route::get('/', [FornecedorController::class, 'index'])
                ->name('index');
            Route::get('create', [FornecedorController::class, 'create'])
                ->name('create');
            Route::post('store', [FornecedorController::class, 'store'])
                ->name('store');
            Route::get('{fornecedor}/show', [FornecedorController::class, 'show'])
                ->name('show');
            Route::get('{fornecedor}/edite', [FornecedorController::class, 'edite'])
                ->name('edite');
            Route::put('{fornecedor}/update', [FornecedorController::class, 'update'])
                ->name('update');
            Route::get('{fornecedor}/destroy', [FornecedorController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'produtos', 'as'=>'produtos.'], function(){
            Route::get('/', [ProdutoController::class, 'index'])
                ->name('index');
            Route::get('create', [ProdutoController::class, 'create'])
                ->name('create');
            Route::post('store', [ProdutoController::class, 'store'])
                ->name('store');
            Route::get('{produto}/show', [ProdutoController::class, 'show'])
                ->name('show');
            Route::get('{produto}/edite', [ProdutoController::class, 'edite'])
                ->name('edite');
            Route::put('{produto}/update', [ProdutoController::class, 'update'])
                ->name('update');
            Route::get('{produto}/destroy', [ProdutoController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix'=>'produto-detalhe', 'as'=>'produto-detalhe.'], function(){
            Route::get('/', [ProdutoDetalheController::class, 'index'])
                ->name('index');
            Route::get('create', [ProdutoDetalheController::class, 'create'])
                ->name('create');
            Route::post('store', [ProdutoDetalheController::class, 'store'])
                ->name('store');
            Route::get('{produto_detalhe}/show', [ProdutoDetalheController::class, 'show'])
                ->name('show');
            Route::get('{produto_detalhe}/edite', [ProdutoDetalheController::class, 'edite'])
                ->name('edite');
            Route::put('{produto_detalhe}/update', [ProdutoDetalheController::class, 'update'])
                ->name('update');
            Route::get('{produto_detalhe}/destroy', [ProdutoDetalheController::class, 'destroy'])
                ->name('destroy');
        });
});

Route::fallback( function() {
    echo" A rota acessada não existe <a href=" .Route("site.index"). ">Clique Aqui</a> para ir a pagina inicial";
});

