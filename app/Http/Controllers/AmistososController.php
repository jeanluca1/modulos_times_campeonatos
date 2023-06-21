<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\time;
use App\Models\partida;
use App\Models\local;
use App\Http\Requests\TimeRequest;
use App\Models\joga_em;
use App\Models\jogador;
use App\Models\arbritos;
use Auth;

class AmistososController extends Controller
{
    private $objUsuario;
    private $objTime;
    

    public function listarpartidasamistosos($idTime)
    {  
        $modelPartidas=new partida();

        $mandante=$modelPartidas-> listaamistosos($idTime);

dd($mandante);

    }
    
    
    public function criaramistoso($idTime)
    {  
        
        $modelTime=new time();
        $times=$modelTime->sltTimes();
        $modelLocal = new local();
        $locais= $modelLocal->lstLocais(true);
        $idCampeonato=0;
        $formato=null;
        $grupo=null; 
        $modelArbrito = new arbritos();
        $arbritos = $modelArbrito->lstArbritos(0);


        return view(
            'campeonatos.criaPartidas',
            compact('idCampeonato', 'times', 'locais', 'formato', 'grupo', 'arbritos' ,'idTime')
        );

    }
    public function show(){
        
    }


    



}
