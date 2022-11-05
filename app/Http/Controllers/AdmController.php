<?php

namespace App\Http\Controllers;

use App\Models\Adm;
use App\Models\Candidato;
use App\Models\Vaga;
use Illuminate\Http\Request;

class AdmController extends Controller
{

    public function index(){        
        return view('admin.index');
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

         $adm = new Adm();
         $usuario =  $adm->where('email',$email)->where('senha',$senha)->get()->first();

         if(isset($usuario->email)){
             
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('home.adm');

            }else{
               return redirect()->route('index.adm',['erro' => 1]);
            }
        
    }


    public function logout(){        
        session_destroy();
        return redirect()->route('login.adm');
    }


    public function home(){
        return view('admin.home');
    }


    public function listarVagas(Request $request){
        $vagas = Vaga::where('descricao','like','%'.$request->input('descricao').'%')
        ->paginate(20);

        return view('admin.listarVagas',['vagas'=>$vagas,'request'=> $request->all()]);
    }


    public function criaAdm(Request $request){
             
        $criarAdm = new Adm($request->all());

        if(isset($criarAdm->senha)){
            
            //bcrypt senha
            //$criarCanditado->senha = password_hash($request->password,PASSWORD_BCRYPT);

            session_start();
            $_SESSION['nome'] = $criarAdm->nome;
            $_SESSION['email'] = $criarAdm->email;
             
            $criarAdm->save();
            return redirect()->route('home.adm');
        }


        return view("admin.criaAdm");
    }


    public function listarUsuarios(Request $request){
        $candidatos = Candidato::where('email','like','%'.$request->input('email').'%')
        ->paginate(20);
         return view('admin.usuarios.listarUser',['candidatos'=>$candidatos,'request'=>$request->all()]);
    }

    public function editarUsuarios($id){
        $id = Candidato::find($id);
        return view('admin.usuarios.editarUsuario',['id'=>$id]);
    }

    public function editarUsuariosId(Request $request,$id){                     
        $id = Candidato::find($id); 
        $id->update($request->all());  
        return redirect()->route('home.adm'); 
    }
 
    public function excluirUsuariosId($id){
        Candidato::find($id)->delete();
        return redirect()->route('listarUsuarios');
    }

}

