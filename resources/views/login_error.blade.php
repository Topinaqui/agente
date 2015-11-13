@extends('app')

@section('content')

<div class="panel panel-danger">
<div class="panel-heading">
	ERRO
</div>
<div class="panel-body" style="color:red">
	Não foi possível acessar com os dados informados.
</div>
<div class="panel-footer">
	<button class="btn btn-info" onclick="goBack()">Voltar</button>
</div>
</div>

@endsection

@section('appjs')

<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>

<script type="text/javascript" src="{{ asset('/js/app/classes/Paciente.js') }}"></script>

@endsection