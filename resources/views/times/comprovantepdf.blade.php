<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta charset="uft-8">
    <title>Dados da Partida</title>
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
        
            <tr>
                <th colspan="3" class="tableitem">{{strtoupper('Comprovante Partida Amistosa')}}</th>
            </tr>
            <tr>
                <th colspan="3" class="tableitem">{{$partida[0]['timeCasa']}}  VS  {{$partida[0]['timeVisitante']}}</th>
            </tr>
            
        </thead>
        
        <tbody>
            
            <tr>
                <td colspan="1" class="tableitem">Data da Partida: {{date( 'd/m/Y' , strtotime($partida[0]['dataHora']))}}</td>
                <td colspan="1" class="tableitem">Hora: {{substr($partida[0]['dataHora'], 10)}}</td>
                <td colspan="1" class="tableitem">Local: {{$partida[0]['nome']}}</td>
                <tr>
                
                <td colspan="1" class="tableitem">Time Mandante: {{$partida[0]['timeCasa']}}</td>
                <td colspan="1" class="tableitem">Time Visitante: {{$partida[0]['timeVisitante']}}</td>
                <td colspan="1" class="tableitem">Arbrito: {{$partida[0]['arbritoNome']}}</td>
            </tr>
            <tr>
                <th colspan="3" class="tableitem">{{strtoupper('EndereÇo')}}</th>
            </tr>
            <tr>
                <td colspan="1" class="tableitem"> Rua:  {{$partida[0]['endereco']}},   N°: {{$partida[0]['numero']}} </td>
                <td colspan="1" class="tableitem"> Bairro:  {{$partida[0]['bairro']}}</td>
                <td colspan="1" class="tableitem"> Cidade:  {{$partida[0]['cidade']}}</td>
                
            </tr>
            
            
        </tbody>
    </table>

    

</html>