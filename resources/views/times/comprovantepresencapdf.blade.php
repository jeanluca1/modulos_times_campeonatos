<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta charset="uft-8">
    <title>Sumula PDF</title>
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
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th{
            background-color: #d3d3d3;
            font-size: 14px;
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
        <thead>
            <tr>
                <th colspan="3" class="tableitem">{{strtoupper(' LMF - Liga Monlevadense de Futebol')}}</th>
                
            </tr>
            
            <th colspan="3" class="tableitem">{{strtoupper(' LISTA DE PRESENÇA')}}-{{$time[0]['nome']}}</th>
                    
            <tr>
                <th colspan="3" class="tableitem">{{$partida[0]['timeCasa']}} <a> {{( 'Vs')}} <a> {{$partida[0]['timeVisitante']}}</th>
            </tr>
            
        </thead>
        <tbody>
            
            <tr>
                <td colspan="1" class="tableitem"> <b> Data da Partida: {{date( 'd/m/Y' , strtotime($partida[0]['dataHora']))}}</td>
                <td colspan="1" class="tableitem"> <b> Hora do Inicio: {{substr($partida[0]['dataHora'], 10)}}</td>
                <td colspan="1" class="tableitem"><b>Local: {{$partida[0]['nome']}}</td>
                <tr>
                
                <td colspan="1" class="tableitem">Time Mandante: {{$partida[0]['timeCasa']}}</td>
                <td colspan="1" class="tableitem">Time Visitante: {{$partida[0]['timeVisitante']}}</td>
                <td colspan="1" class="tableitem">Arbrito: {{$partida[0]['arbritoNome']}}</td>
            </tr>
            
            <tr>
                <td colspan="1" class="tableitem">Horário de Início:</td>
                <td colspan="1" class="tableitem">Intervalo:</td>
                <td colspan="1" class="tableitem">Horário de Termino:</td>
            </tr>
            
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="30" class="tableitem">{{$partida[0]['timeCasa']}}</th>
                
            </tr>
        </thead>
        <tbody>
            @for ($i=0; $i < 28; $i = $i+2)
            <?php $j = $i + 1; ?>
            <tr>
                <td colspan="12">{{isset($jogadoresTimeCasa[$i]) ? $jogadoresTimeCasa[$i]['apelido'] : ''}}</td>
                <td colspan="2" class="tableitem">&nbsp;</td>
                <td colspan="14">{{isset($jogadoresTimeCasa[$j]) ? $jogadoresTimeCasa[$j]['apelido'] : ''}}</td>
                <td colspan="2" class="tableitem">&nbsp;</td>
                
                
            </tr>
            @endfor
        
            

            
            <

            <tr>
                <th colspan="30" class="tableitem">Relatório Final da Partida</th>
            </tr>
            @for($i=0; $i < 7;$i++)
            <tr>
                <td colspan="30" class="tableitem">&nbsp;</td>
            </tr>
            @endfor
        </body>
    </table>

</html>