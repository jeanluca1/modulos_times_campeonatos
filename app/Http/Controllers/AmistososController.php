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
use App\Models\Arquivo;

class AmistososController extends Controller
{
    private $objUsuario;
    private $objTime;
    

    public function listarpartidasamistosos($idTime)
    {  
        $modelPartidas=new partida();

        $partidas=$modelPartidas-> listaamistosos($idTime);

 //dd($mandante);
$times= array_column($partidas, 'id_time_casa');
$locais= array_column($partidas, 'nome', 'idlocal');
//$arbritosmodel=new arbritos;   
$modelArquivo = new Arquivo();
$arquivos = array_column(
    $modelArquivo->lstArquivos(array_column($partidas, 'id')),
    'id_partida',
    'arquivo',
);
//dd($partidas);
return view(
    'times.partidasAmistosas',
    compact('partidas' , 'arquivos', 'idTime')
);

/*return view(
  'times.partidasAmistosas',
compact(  'times', 'locais', 'arbritos' ,'idTime')
);*/

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
