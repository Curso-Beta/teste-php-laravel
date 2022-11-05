<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class ApiVagas extends Controller
{ 

 

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagas = new Vaga();
        return $vagas::all();
        
    }

 

    

    

     
}
