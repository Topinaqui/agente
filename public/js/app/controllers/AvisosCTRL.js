function AvisosCTRL($scope, PonteParaAvisos) {
	'use strict';

	var $this = this;

	$scope.ttl_informativo = "";
	$scope.mensagem = "";
	$scope.okPublicado = false;
	$scope.publicarAvisoMensagem = "";

	$("#aviso_sucesso").hide();
	$scope.lido = [];

	var ubs = parseInt($("#agente_ubs").val());
	
	$scope.publicar = function() {


		PonteParaAvisos.publicar(function(aviso) {
			
			console.log('UBS ', aviso);

			$scope.publicarAvisoMensagem = true;

			if(parseInt(aviso.publicado) == 1){
				
					$scope.publicarAvisoMensagem = "O Informativo foi publicado com sucesso.";	
			}else{
				$scope.publicarAvisoMensagem = "Sucesso. Observaçao: Pode ter havido um erro.";
			}
			
			
			$("#aviso_sucesso").show();
			window.setTimeout(function() {
				$scope.publicarAvisoMensagem = "";
				$("#aviso_sucesso").hide();
			}, 2200);

		}, $scope.ttl_informativo, $scope.mensagem, ubs);
	}

	
	$scope.despublicar = function() {
		var ubs = parseInt($("#agente_ubs").val());

		PonteParaAvisos.despublicar(function(result) {
			$scope.publicarAvisoMensagem = "Publicação encerrada com sucesso.";
			$("#aviso_sucesso").show();
			window.setTimeout(function() {
				$scope.publicarAvisoMensagem = "";
				$("#aviso_sucesso").hide();
			}, 2200);
		}, 1, ubs);
	}

	$scope.ler = function() {
		var ubs = parseInt($("#agente_ubs").val());

		PonteParaAvisos.ler(function(result) {
			$scope.lido = result;
		}, 1, ubs);
	}
}
