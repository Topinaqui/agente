function AgentesCTRL($scope, PonteParaAgentes) {
	'use strict';

	var $this = this;

	$scope.agente = "MarcosVeiga";
	$scope.agsenha = "123456";
	$scope.email = "marcos@marcos.com.br";
	$scope.ehAdminLabel = "Não é administrador";
	$scope.admin = "0";

	$scope.inserirAgenteMensagem = "";
	$("#agente_sucesso").hide();

	$scope.insertAgente = function() {
		var ubs = parseInt($("#agente_ubs").val());
		var oAgente = new Agente($scope.agente, $scope.agsenha, $scope.email, $scope.admin, ubs);

		PonteParaAgentes.insert(function(agente) {


			if(parseInt(agente.atualizado) == 0 || parseInt(agente.atualizado) == 1){
				
				if(parseInt(agente.atualizado) == 0){
					$scope.inserirAgenteMensagem = "O Agente foi inserido com sucesso.";	
				} else if(parseInt(agente.atualizado) == 1){
					$scope.inserirAgenteMensagem = "O Agente foi atualizado com sucesso.";
				}

			}else{
				$scope.inserirAgenteMensagem = "Sucesso. Observaçao: Pode ter havido um erro.";
			}
			
			
			$("#agente_sucesso").show();
			window.setTimeout(function() {
				$scope.inserirAgenteMensagem = "";
				$("#agente_sucesso").hide();
			}, 2200);

		}, oAgente);
	}

	$scope.setAdmin = function(admin, adminLabel) {
		$scope.admin = admin;
		$scope.ehAdminLabel = adminLabel;
	}
}