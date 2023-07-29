<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta charset="uft-8">
    <title>Agenda partidas Amistosas</title>
   
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
        }
        h1, h2 {
            text-align:center;
        }

        h1{
            font-size: 20px;
        }

        h2 {
            font-size: 15px;
        }

        table {
            width: 700px;
            margin:1px auto;
            padding: 3px;
            border: 1px solid black;
        }
        

        td{
            font-size: 12px;
        }

        .tableitem
        {
            padding: 3px;
        }

    </style>
</head>

<body>
    
   
    
            <table>
            <tr >
                <th  colspan="3" class="tableitem">{{strtoupper(' LMF - Liga Monlevadense de Futebol')}}</th>
            </tr>
            <th  colspan="3" class="tableitem">{{strtoupper('Listagem de Partidas')}}</th>
            
            </table>  
            <table>
            <thead class="table" >
                        <tr style="width:150px">
                            <th style="width:80px"scope="col">Time <br> Casa</th>
                            <th style="width:80px"scope="col">Time <br> Visitante</th>
                            <th style="width:100px"scope="col">Data</th>
                            <th style="width:120px"scope="col">Local</th>
                            <th style="width:80px"scope="col">Status</th>
                            <th style="width:80px"scope="col">Resultado</th>
                            
                        </tr>
                    </thead>
            </table>

        <!-- tabelas partidas -->
        <div class="col-8 m-auto" style="overflow-x:auto;">
            
        @foreach($partidas as $partida)
                

            <?php
                    if ($partida['status'] == 0) {
                        $status = 'Não Iniciada';
                        $golsTimeCasa = '-';
                        $golsTimeVisitante = '-';
                        
                    } else {
                        $status = 'Encerrada';
                        $golsTimeCasa = $partida['gols_time_casa'];
                        $golsTimeVisitante = $partida['gols_time_visitante'];
                        
                    }

                    
                ?> 
                
                <table class="table text-center">
                    
                    <tbody>
                        <tr style="width:150px">
                            <td style="width:80px" scope="row">{{$partida['timeCasa']}}</td>
                            <td style="width:80px">{{$partida['timeVisitante']}}</td>
                            <td style="width:100px">{{date( 'd/m/Y H:i' , strtotime($partida['dataHora']))}}</td>
                            <td style="width:120px">{{$partida['nomeLocal']}}</td>
                            <td style="width:80px">{{$status}}</td>
                            <td style="width:50px">{{$golsTimeCasa . ' x '. $golsTimeVisitante}}</td>
                           
                                        
                                       

                                        
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
            </div>
    


    </body>

</html>