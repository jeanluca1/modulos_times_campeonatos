@extends('times.tela.telas')

@section('parte')
<title>Cadastro - Time</title>
</head>
<body>

	<div class="text-left mt-3 mb-4" >
	<div input-group class="card col-9 m-auto"  >

	<div class="card-header text-left">{{ __('Cadastrar Time') }}</div>
		<div class="col-8 m-auto ">
		
			@if(isset($time))
			<?php $id=$time[0]['id'];?> 	
				<form class="row g-7" name="formEdit" id="formEdit" method="post" action="{{url("time/$id")}}">
				@method('PUT')
			@else
				<form class="row g-7" name="formCadastro" id="formCadastro" method="post" action="{{url('time')}}">
			@endif
				@csrf
				<label for="nometime" class="form-label row">Nome do Time:</label>
				<input
					type="text"
					class="text45Left form-control"
					name="inNometime"
					 value= "{{isset($time)? $time[0]['nome']:''}}"
					id="inNometime"
					placeholder="Nome Time"
					required
				>

				<label for="sigla" class="form-label row">Sigla:</label>
				<input
					type="text"
					class="text45Left form-control"
					id="inSigla"
					value= "{{isset($time)? $time[0]['sigla']:''}}"
					name = "inSigla"
					placeholder="Sigla do Time"
					required
				>

				<label for="cep" class="form-label row">CEP:</label>
				<input
					type="text"
					class="text45Left form-control cep"
					id="inCep"
					name= "inCep"
					value= "{{isset($time)? $time[0]['cep']:''}}"
					placeholder="_____ - __"
					required
				>

				<label for="endereco" class="form-label row">Endereço:</label>
				<input
					type="text"
					class="text45Left form-control"
					id="inEndereco"
					value= "{{isset($time)? $time[0]['endereco']:''}}"
					name="inEndereco"
					placeholder="Logradouro:"
					required
				>

				<label for="bairo" class="form-label row">Bairro:</label>
				<input
					type="text"
					class="text45Left form-control"
					id="inBairro"
					value= "{{isset($time)? $time[0]['bairro']:''}}"
					name="inBairro"
					placeholder="Bairro:"
					required
				>

				<label for="complemento" class="form-label row">Complemento:</label>
				<input
					type="text"
					class="text45Left form-control"
					id="inComplemento"
					name="inComplemento"
					value= "{{isset($time)? $time[0]['complemento']:''}}"
					placeholder="Apartamento, quadra..."
				>

				<label for="cidade" class="form-label row">Cidade:</label>
				<input
					type="text"
					class="text45Left form-control"
					id="inCidade"
					name="inCidade"
					value= "{{isset($time)? $time[0]['cidade']:''}}"
					placeholder="Cidade: "
					required
				>

				<label for="estado" class="form-label row">Estado:</label>
				<select id="slEstado" name="slEstado" class="text45Left form-select">
					
					<option selected>Selecione</option>
					<option selected>MG</option>
				</select>
				<div><br>
				<button type="submit" class="btn btn-primary col-12 btn-size-120">Salvar</button> </div>
				
</div>
				<!--<button class="btn btn-danger">Cancelar</button>-->
			</form>
		</div>
	</div>
	@endsection
