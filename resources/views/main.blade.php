@extends('app')

@section('content')

<div class="container">
	
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<span class="navbar-brand">Bem Vindo {{$agente->name}} </span> <a href="/logout" class="btn btn-default navbar-btn">Sair</a>
		</div>
	</nav>

</div>

<div id="tabs">

	<ul>
		<li><a href="#tabs-1">Consulta Médica</a></li>
		<li><a href="#tabs-2">Cadastrar Paciente</a></li>
		@if($agente->admin === '1')
		<li><a href="#tabs-3">Adicionar Agente</a></li>
		@endif
		<li><a href="#tabs-4">Informativo</a></li>
	</ul>
	<div id="tabs-1" ng-controller="ConsultasCTRL">

		<div class="row">
			<div class="col-sm-5">

				<div class="panel panel-primary">
					<div class="panel-heading">Consultas</div>
					<div class="panel-body" id="containerLista">
						
						<ul class="consultList list-group" id="[[registro.id]]" >

							<li class="list-group-item list-group-item-success" ng-repeat="consulta in consultas" style="display:inline-table; float: left;">

								<div class="glyphicon glyphicon-calendar"></div>
								[[consulta.data]]&nbsp; 
								<div class="glyphicon glyphicon-hourglass"></div>
								[[ consulta.hora | strHora ]]&nbsp;<br />
								[[consulta.medico]]&nbsp;
							</li>
						</ul>
						
						<ul id="pagination" class="pagination-sm"></ul>
					</div>
				</div>
				
			</div>
			<div class="col-sm-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Inserir Consultas</div>
					<div class="panel-body"> 
					<div id="consulta_sucesso" class="alert alert-success" role="alert">[[inserirConsultaMensagem]]</div>

						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" ng-model="data" placeholder="Data" id="datepicker" size="8" />
								<input type="text" class="form-control" ng-model="hora"  placeholder="Hora" size="6" id="hora" />
								<input type="text" class="form-control" ng-model="medico" placeholder="Médico" />
							</div>
							<button type="submit" class="btn btn-default" ng-click="insertRegistro()" id="inserir">Incluir</button>
						</form>
					</div>
				</div>
			</div>			
		</div>
		
	</div>
	<div id="tabs-2" ng-controller="PacientesCTRL">
		<div class="row">
			<div class="col-sm-10">
				<div id="paciente_sucesso" class="alert alert-success" role="alert">[[inserirPacienteMensagem]]</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Paciente</div>
					<div class="panel-body">
						<div class="container-form"> <!--class="navbar-form navbar-left"-->
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" ng-model="paciente" placeholder="Paciente" />
									<input type="password" class="form-control" ng-model="pasenha" placeholder="Senha" />
									<input type="text" class="form-control" ng-model="sus" placeholder="SUS" />
								</div>
								<button type="submit" class="btn btn-default" ng-click="insertPaciente()" id="inserir">Incluir</button>
							</form>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
	@if($agente->admin === '1')
	<div id="tabs-3" ng-controller="AgentesCTRL">
		<div class="row">
			<div class="col-sm-12">
				<div id="agente_sucesso" class="alert alert-success" role="alert">[[inserirAgenteMensagem]]</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Agente</div>
					<div class="panel-body">
						<div class="container-form"> <!--class="navbar-form navbar-left"-->
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" ng-model="agente" placeholder="Agente" />
									<input type="email" class="form-control" ng-model="email" placeholder="E-mail" />
									<input type="password" class="form-control" ng-model="agsenha" size="8" placeholder="Senha" />
									<!--<input type="text" class="form-control" ng-model="admin" placeholder="Admin" />-->
									<div class="form-group" role="">
										<div class="btn-group">
											<button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												[[ehAdminLabel]]  <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li ng-click="setAdmin(0, 'Não é administrador')"><a href="#">Não é administrador</a></li>
												<li role="separator" class="divider"></li>
												<li ng-click="setAdmin(1, 'É administrador')"><a href="#">É administrador</a></li>
											</ul>
										</div><!-- /btn-group -->
									</div>
									<!--///-->
								</div>
								<button type="submit" class="btn btn-default" ng-click="insertAgente()" id="inserir">Incluir</button>
							</form>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
	@endif
	<div id="tabs-4" ng-controller="AvisosCTRL">
		<div class="row">
			<div class="col-sm-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Informativo</div>
					<div class="panel-body">
					<div id="aviso_sucesso" class="alert alert-success" role="alert">[[publicarAvisoMensagem]]</div>
						<div class="container-form"> <!--class="navbar-form navbar-left"-->
							<form class="form" role="">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" class="form-control" ng-model="ttl_informativo" size="30" placeholder="Título" />	
										</div>
									</div>
								</div>

								<div class="form-group">
									<textarea placeholder="Mensagem" maxlength="300" spellcheck="true" cols="30"  rows="10" ng-model="mensagem">
										Escreva a mensagem aqui.
									</textarea>
								</div>

								<button type="submit" class="btn btn-primary" ng-click="publicar()" id="inserir">Publicar</button>&nbsp;&nbsp;
								<button type="submit" class="btn btn-danger" ng-click="despublicar()" id="inserir">Despublicar todos</button> 
							</form>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
<div class="dados_do_agente">
	<input id="agente_ubs" type="hidden" value="{{$agente->UBSid}}" />
</div>
@endsection

@section('appjs')

<script>
//Iniciadores do jQueryUI
$(function() {

	//Abas
	$( "#tabs" ).tabs();
	//Calendário
	$( "#datepicker" ).datepicker({
		dateFormat: "yy-mm-dd",
		yearRange: "2015:2022"
	});

	$( "#anim" ).change(function() {
		$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
	});

	$("#hora").inputmask("99:99"); 

	//Paginação
	// $('#pagination').twbsPagination({
	// 	totalPages: 35,
	// 	visiblePages: 4,
	// 	first: "Primeiro",
	// 	prev: "Ante.",
	// 	next: "Próx.",
	// 	last: "Último",
	// 	onPageClick: function (event, page) {
	// 		$(".consultList").hide();
	// 		$("#" + page).show();
	// 	}
	// });


});

</script>
<script type="text/javascript" src="{{ asset('/js/app/classes/Registro.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/app/classes/Paciente.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/app/classes/Agente.js') }}"></script>

@endsection