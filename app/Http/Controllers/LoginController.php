<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(Request $request){
        
        $erro = '';
         if($request->get('erro') == 1 ){
            $erro = 'Usuario ou senha invalidos';
         }
        return view('web.login',['erro' => $erro]);
    }


    public function autenticar(Request $request){

        $regras = [
            'usuario'=> 'email',
            'senha'=> 'required',
        ];

         $feedback = [
            'usuario.email' => 'O campo (E-mail) deve ser preenchido',
            'senha.required' => 'O campo senha e obrigatorio'
         ];

         $request->validate($regras,$feedback);

         $email = $request->get('usuario');
         $senha = $request->get('senha');

         $candidato = new Candidato();
         $usuario =  $candidato->where('email',$email)->where('senha',$senha)->get()->first();

        
         
         if(isset($usuario->nome)){
             
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

            }else{
               return redirect()->route('login.index',['erro' => 1]);
            }
        
    }


    public function logout(){        
        session_destroy();
        return redirect()->route('login.index');
    }

}
