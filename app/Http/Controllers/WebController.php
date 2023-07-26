<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vaga;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function principal(Request $request){
        $vagas = Vaga::where('descricao','like','%'.$request->input('descricao').'%')
        ->paginate(20);
        return view("web.principal",['vagas'=>$vagas,'request'=> $request->all()]);
    }

    public function criaUsuario(Request $request){
             
        $criarCanditado = new Candidato($request->all());

        if(isset($criarCanditado->senha)){
            
            //bcrypt senha
            //$criarCanditado->senha = password_hash($request->password,PASSWORD_BCRYPT);

            session_start();
            $_SESSION['nome'] = $criarCanditado->nome;
            $_SESSION['email'] = $criarCanditado->email;
             
            $criarCanditado->save();
            return redirect()->route('app.home');
        }

        return view("web.cadastro");
    }
}
