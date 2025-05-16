<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(LogAcessoMiddleware::class);
    // }

    public function sobre_nos(){
        return view('site.sobrenos');
    }
}
