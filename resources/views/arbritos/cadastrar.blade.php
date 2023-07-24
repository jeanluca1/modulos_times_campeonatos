@extends('times.tela.telas')

@section('parte')
<title>Arbrito</title>

	<div class="text-left mt-3 mb-4">
	<div input-group class="card col-9 m-auto" >
		@if(!empty($id))
			<form name="formEdit" id="formEdit" method="put" action="{{ route("arbrito.edita", ['id' => $id]) }}">
				@method('PUT')
		@else
			<form name="formCadastro" id="formCadastro" method="post" action="{{route("arbrito.salva")}}">
		@endif
		@csrf
		
		<div class="card-header text-left">{{ __('Cadastro Árbitro') }}</div>
		<div class="col-8 m-auto">
			<label for="nome" class="form-label">Nome:</label>
			<input
				type="text"
				class="text45Left form-control"
				id="inNome"
				name='inNome'
				value="{{$arbrito[0]['nome'] ?? ''}}"
				placeholder="Nome Sobrenome"
				required
			>

			<label for="cpf" class="form-label">CPF:</label>
			<input
				type="cpf"
				class="text45Left form-control cpf"
				id="inCpf"
				name='inCpf'
				value="{{$arbrito[0]['cpf'] ?? ''}}"
				placeholder="***.***.***-**"
				required
			>

			<label for="telefone" class="form-label">Telefone:</label>
			<input
				type="text"
				class="text45Left form-control telefone"
				id="inTelefone"
				name='inTelefone'
				value="{{$arbrito[0]['telefone'] ?? ''}}"
				placeholder="(  ) - ---- ----"
			>

            <label for="email" class="form-label">Email:</label>
			<input
				type="mail"
				class="text45Left form-control inEmail"
				id="inEmail"
				name='inEmail'
				placeholder=" exemplo@email.com"
				value="{{$arbrito[0]['email'] ?? ''}}"
			>

		</div>
		<div>
			<br>
		<div class="col-8 m-auto">
		<div input-group class=" text-center" >
			<button type="submit" class="btn btn-primary col-12 btn-size-120">Salvar</button>

		</div>
		</div>

	</form>
	</form>
				<form action="{{ route('arbrito.index') }}"   ><a>
				<div class="col-8 m-auto">
				<div input-group class=" text-center" >
					<div class="col-10-auto">
                <button  class="btn btn-warning col-12 btn-size-120">Cancelar</button>
					</div>
				</div>
				</div>
            </a></form>
</div>
			<br>

@endsection('parte')
