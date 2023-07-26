<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use Illuminate\Http\Request;
use App\Models\Vaga;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{


    public function index(Request $request){
        $vagas = Vaga::where('descricao','like','%'.$request->input('descricao').'%')
        ->paginate(5);     
        return view('app.home',['vagas'=>$vagas,'request'=> $request->all()]);
    }


    public function candidatura(Request $request){
        
         
        $msg = '';
        $statusVaga = $request->get('status');

        $consultaCandidatura =  DB::table('table_candidatura')->where('id_vaga',$request->id_vaga )->first();                  
        $candidatura = new Candidatura($request->all());
     
        if(!$consultaCandidatura){
            if($statusVaga === 'Ativo'){
                $candidatura->status = 'sim';
                $candidatura->save();
                $msg = 'Candidatura feita com sucesso';
                return redirect()->route('app.home',['msg'=>$msg]);
                $msg ='';
            }else{
                echo "Essa vaga expirou";
            }
        }else{
            echo "Você já se candidatou a essa vaga";
        }
        
        $msg ='';
    }
    
}
