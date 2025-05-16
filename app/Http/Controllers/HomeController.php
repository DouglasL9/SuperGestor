<?php

namespace App\Http\Controllers;

use App\Models\Motivocontato;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal(){
        $motivo_contatos = Motivocontato::all();

        return view('site.principal', compact('motivo_contatos'));
    }

    public function inicio(){
        return view('app.home.index');
    }
}
