<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eUBSCard</title>
	<link href="{{ asset('/css/bootstrap/bootstrap.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/bootstrap/bootstrap-theme.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/bootstrap/bootstrap-theme.css.map') }}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ asset('/js/jquery-ui-1.11.4/jquery-ui.css') }}" >
	<link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />

</head>
<body ng-app="eUBS">
	@yield('content')

	<script type="text/javascript" src="{{ asset('/js/jquery/jquery-2.1.4.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap/bootstrap.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('/js/angular-1.3.16/angular.js') }}" ></script>
	<script type="text/javascript" src="{{ asset('/js/jquery-ui-1.11.4/jquery-ui.js')}}" ></script>
	<script type="text/javascript" src="{{ asset('/js/inputmask/inputmask.js')}}" ></script>
	<script type="text/javascript" src="{{ asset('/js/inputmask/jquery.inputmask.js')}}" ></script>
	<script type="text/javascript" src="{{ asset('/js/pagination/jquery.twbsPagination.js')}}" ></script>

	<script type="text/javascript" src="{{ asset('/js/app/main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/controllers/ConsultasCTRL.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/controllers/PacientesCTRL.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/controllers/AgentesCTRL.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/controllers/AvisosCTRL.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/controllers/controllers.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/services/PonteParaConsultas.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/services/PonteParaPacientes.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/services/PonteParaAgentes.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/services/PonteParaAvisos.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/services/services.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/app/filters/filters.js') }}"></script>

	@yield('appjs')

</body>
</html>