@extends('times.tela.telas')

@section('parte')
    <title>Amistosos</title>
    </head>
    <body>
        <div class="text-center col-8 m-auto">
            <hr>
            <h2 class="text-center">Partidas Amistosas</h2>
            <hr>

            @if(session('mensagem'))
                <div class="alert alert-success text-center mt-4 mb-4 p-2">
                    <p>{{session('mensagem')}}</p>
                </div>
            @endif

            @if(isset($errors) && count($errors)>0)
                <div class="alert alert-danger text-center mt-4 mb-4 p-2">
                    @foreach($errors->all() as $erro)
                        {{$erro}}
                        <br>
                    @endforeach
                </div>
            @endif

            @if(!is_null(Auth::user()) && Auth::user()->hasAnyRole(['AdminTime', 'AdminGeral']))
                
                <a  href="{{route('time.amistoso', ['idTime' => $idTime])}}">
                
                    <button class="btn btn-outline-success btn-margin-top-botton" >Cadastrar Nova Partida</button>
                </a>
            @endif
        </div>
        
        

        <!-- tabelas partidas -->
        <div class="col-8 m-auto" style="overflow-x:auto;">
            @foreach($partidas as $partida)
                <?php
                    if ($partida['status'] == 0) {
                        $status = 'Não Iniciada';
                        $golsTimeCasa = '-';
                        $golsTimeVisitante = '-';
                        $href = route("campeonato.encerraPartida", ['idPartida' => $partida['id']]);
                        $btn = 'Encerrar Partida';
                    } else {
                        $status = 'Encerrada';
                        $golsTimeCasa = $partida['gols_time_casa'];
                        $golsTimeVisitante = $partida['gols_time_visitante'];
                        $href = route("campeonato.editarResultado", ['idPartida' => $partida['id']]);
                        $btn = 'Editar Resultado';
                    }

                    if (in_array($partida['id'], $arquivos)) {
                        $textoSumula = 'Baixar PDF';
                        $rotaSumula = route("campeonato.downloadArquivo", ['idPartida' => $partida['id']]);
                        $propriedade = 'success';
                    } else {
                        $textoSumula = 'Enviar PDF';
                        $rotaSumula = route("campeonato.upLoadArquivo", ['idPartida' => $partida['id']]);
                        $propriedade = 'success';
                    }
                ?>
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Time <br> Casa</th>
                            <th scope="col">Time <br> Visitante</th>
                            <th scope="col">Data</th>
                            <th scope="col">Local</th>
                            <th scope="col">Status</th>
                            <th scope="col">Resultado</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="width:150px">
                            <th style="width:80px" scope="row">{{$partida['timeCasa']}}</th>
                            <td style="width:80px">{{$partida['timeVisitante']}}</td>
                            <td style="width:100px">{{date( 'd/m/Y H:i' , strtotime($partida['dataHora']))}}</td>
                            <td style="width:120px">{{$partida['nomeLocal']}}</td>
                            <td style="width:80px">{{$status}}</td>
                            <td style="width:80px">{{$golsTimeCasa . ' x '. $golsTimeVisitante}}</td>
                            <td style="width:80px">
                                <div input-group>
                                    @if(!is_null(Auth::user()) && Auth::user()->hasAnyRole(['AdminTime', 'AdminGeral']))
                                    
                                        @if($partida['id_time_casa']==$idTime )  
                                             <a href="{{
                                                route("campeonato.editarPartida", ['idPartida' => $partida['id']])
                                            }}">
                                                <button class="btn btn-primary btn-size-160">Editar Partida</button>
                                            </a>
                                        @endif
                                        @if(!in_array($partida['id'], $arquivos))
                                            <a href="{{
                                                route("amistoso.gerarcomprovante", ['idPartida' => $partida['id']])
                                            }}" target="_blank">
                                                <button class="btn btn-info btn-size-160">Imprimir Marcação</button>
                                            </a>
                                        
                                        @endif
                                        @if(!in_array($partida['id'], $arquivos))
                                            <a href="{{
                                                route("amistoso.gerarcomprovantepresenca", ['idPartida' => $partida['id']])
                                            }}" target="_blank">
                                                <button class="btn btn-outline-dark btn-size-160">Gerar Lista Presença</button>
                                            </a>
                                        
                                        @endif

                                        @if(!in_array($partida['id'], $arquivos))
                                            <a href="{{
                                                route("amistoso.geraPDF", ['idPartida' => $partida['id']])
                                            }}" target="_blank">
                                                <button class="btn btn-danger btn-size-160">Gerar Sumula</button>
                                            </a>
                                        
                                        @endif
                                        
                                       

                                        @if(in_array($partida['id'], $arquivos) )
                                        
                                        <a href="{{
                                            route("campeonato.removerSumula", ['idPartida' => $partida['id']])
                                        }}">
                                            <button class="btn btn-danger btn-size-160">Remover PDF</button>
                                        </a>
                                        @endif
                                        
                                        @if($partida['id_time_casa']==$idTime)  
                                        <a href="{{$href}}">
                                            <button class="btn btn-success btn-size-160">{{$btn}}</button>
                                        </a>
                                        @endif
                                    @endif
                                    @if ($partida['status'] == 1)
                                        <a href="{{$rotaSumula}}">
                                            <button class="btn btn-warning btn-size-160">{{$textoSumula}}</button>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
            </div>
    @endsection
