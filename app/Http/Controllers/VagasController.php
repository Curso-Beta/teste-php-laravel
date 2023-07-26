<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagasController extends Controller
{
   
    public function index(Request $request){
 
        $vagas = Vaga::where('descricao','like','%'.$request->input('descricao').'%')
        ->paginate(5);

        return view('admin.index',['vagas'=>$vagas,'request'=> $request->all()]);
    }

 
    public function Adicionar(Request $request){

            if($request->input('_token') != ''  && $request->input('id') == ''){
                $vaga = new Vaga();
                $vaga->create($request->all());

                return redirect()->route('listarVagas.adm');

            }

            return view('admin.adicionar');

    }

    
    public function editar($id){         
         $id = Vaga::find($id);
         return view('admin.editar',['id'=>$id]);
    }

    
    public function editarId(Request $request,$id){         
          $id = Vaga::find($id); 
          $id->update($request->all());  
          return redirect()->route('listarVagas.adm'); 
    }


    public function excluir($id){
        Vaga::find($id)->delete();
        return redirect()->route('listarVagas.adm');
    }

}
