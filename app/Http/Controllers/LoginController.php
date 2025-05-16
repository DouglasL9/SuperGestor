<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if ($request['erro'] == 1 ) {
            $erro = 'Usuário ou Senha incorreto';
        } elseif( $request['erro'] == 2) {
            $erro = 'Necessário realizar Login';
        }
        
        return view('site.login', compact('erro'));
    }

    public function autenticar(Request $request){
        $request->validate(
            [
                'usuario' => 'email',
                'senha' => 'required',
            ],
            [
                'usuario.email' => 'O campo usuário precisa ser um e-mail válido',
                'senha.required' => 'O campo senha precisa ser preenchido',
            ]
        );

        $email = $request['usuario'];
        $senha = $request['senha'];

        $user = User::where('email', $email)->where('password', $senha)->first();
        if ($user) {

            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;
            $_SESSION['senha'] = $user->password;

            return redirect()->route('app.home');
        } else {
            $erro = 1;
            return redirect()->route('site.login', compact('erro'));
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
