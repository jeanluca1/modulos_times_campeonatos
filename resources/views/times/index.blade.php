@extends('times.tela.telas')

@section('parte')
<title>Cadastro - Time</title>
</head>
<body>
    @if(session('mensagem'))
		<div class="alert alert-success text-center mt-4 mb-4 p-2">
			<p>{{session('mensagem')}}</p>
		</div>
    @endif
    <?php
    $texto='Times';?>
    @if(!is_null(Auth::user()) && Auth::user()->hasAnyRole(['AdminTime', 'AdminGeral']))
    <?php 
    $texto= 'Gerenciar Times'
    
    ?>
    @endif
	<div class="text-left mt-3 mb-4" >
		<div class="col-8 m-auto">
            <h1> <?php echo($texto) ?></h1>
        </div>
    </div>
    
    @if(!is_null(Auth::user()) && Auth::user()->hasAnyRole(['AdminTime', 'AdminGeral']))
    <div class="text-center col-8 m-auto">
        <a href="{{ route('time.cadastrar',['idUsuario' => Auth::user()->id]) }}">
            <button class="btn btn-outline-success">Criar Novo Time</button>
        </a>
    </div>
    @endif
    <div class="col-8 m-auto">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sigla</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($times as $time)
                    
                        <?php
                            if ($time['Eexcluido'] == 0) {
                                $desab=null;
                                $style = null;
                                $texto = 'Desativar';
                                $cor = 'danger';
                                $rota = 'desativar';
                            } else {
                                $texto = 'Ativar';
                                $cor = 'success';
                                $rota = 'ativar';
                                $desab='disabled';
                                $style='pointer-events: none';
                            }
                        ?>
                        <tr>
                            <th scope="row">{{$time['sigla']}}</th>
                            <td>{{$time['nome']}}</td>
                            <td>{{$time['Eexcluido'] == 0 ? 'Ativo' : 'Inativo'}}</td>
                            <td>
                            @if(!is_null(Auth::user()) && Auth::user()->hasAnyRole(['AdminTime', 'AdminGeral']))
                                <div input-group>
                                    <a style= "<?php echo $style ?>"href="{{ route('time.gerenciar',['idTime' => $time['id']]) }}">
                                        <button class="btn btn-primary btn-size-120" <?php echo $desab?>>Gerenciar</button>
                                    </a>
                                    <a href="{{ route('time.ativarDesativar',['idTime' => $time['id']]) }}">
                                        <button class="btn btn-{{$cor}} btn-size-120">{{$texto}}</button>
                                    </a>
                                    <a href="{{ route('time.editar',['idTime' => $time['id']]) }}">
                                    <button class="btn btn-warning btn-size-120">Editar Time</button>

                                    </a>
                                </div>@endif

                                @if(!is_null(Auth::user()) && Auth::user()->hasAnyRole(['Usuario']))
                                <div>
                                <a href="{{route('amistoso.listar',['idTime' => $time['id']])}}">
                                        <button class="btn btn-primary btn-size-120"  >Ver partidas</button>
                                    </a>

                                </div>


                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        
@endsection
