function PacientesCTRL($scope, PonteParaPacientes) {
	'use strict';

	var $this = this;

	$scope.paciente = "Marcos Antonio";
	$scope.pasenha = "123456";
	$scope.sus = "123456789";

	$scope.inserirPacienteMensagem = "";
	$("#paciente_sucesso").hide();

	$scope.insertPaciente = function() {

		var ubs = parseInt($("#agente_ubs").val());
		var oPaciente = new Paciente($scope.paciente, $scope.pasenha, $scope.sus, ubs);

		PonteParaPacientes.insert(function(paciente) {
				
			if(parseInt(paciente.atualizado) == 0 || parseInt(paciente.atualizado) == 1){
				
				if(parseInt(paciente.atualizado) == 0){

					$scope.inserirPacienteMensagem = "O Paciente foi cadastrado com sucesso.";	
				} else if(parseInt(paciente.atualizado) == 1){

					$scope.inserirPacienteMensagem = "O Paciente foi atualizado com sucesso.";
				}

			}else{

				$scope.inserirPacienteMensagem = "Sucesso. Observaçao: Pode ter havido um erro. ";
			}

			
			$("#paciente_sucesso").show();
			window.setTimeout(function() {
				$scope.inserirPacienteMensagem = "";
				$("#paciente_sucesso").hide();
			}, 2200);
		}, oPaciente);
	}
}