function ConsultasCTRL($scope, PonteParaConsultas) {
	'use strict';

	var $this = this;

	$scope.consultas = [];
	$scope.data = "";
	$scope.hora = "";
	$scope.medico = "";

	var consultasContainerId = 'listaConsultas';
	$scope.inserirConsultaMensagem = "";
	$("#consulta_sucesso").hide();


	this.showUI = function(consultas) {
		//if(consultas.length <= 0) {return false;}
		var registro = [];
		var consultaSet = [];
		var length = consultas.length;
		
		for (var i = 0; i < length; i++) {


			registro.push(consultas[i]);

			if( (registro.length === 5) || ( i === (length - 1)) ){
				consultaSet.push(registro);
				registro = [];
			}
		}

		console.log(consultaSet);
		$scope.consultas = consultaSet[0];

		$('#pagination').twbsPagination({
			totalPages: consultaSet.length,
			visiblePages: 4,
			first: "Primeiro",
			prev: "Ante.",
			next: "Próx.",
			last: "Último",
			onPageClick: function (event, page) {
				var numberPage = parseInt(page);
				numberPage = ( numberPage > 0 && (--numberPage));
				console.log($scope.consultas);
				$scope.consultas = consultaSet[numberPage];
				$scope.$digest();
			}
		});
	};

	$scope.insertRegistro = function() {
		$scope.hora += ":00";
		var ubs = parseInt($("#agente_ubs").val());
		var oRegistro = new Registro($scope.data, $scope.hora, $scope.medico, ubs);

		PonteParaConsultas.insert(function(result) {
			

			$scope.inserirConsultaMensagem = "Consulta inserida com sucesso!";
			$("#consulta_sucesso").show();
			window.setTimeout(function() {
				$scope.inserirConsultaMensagem = "";
				$("#consulta_sucesso").hide();
			}, 2200);

			PonteParaConsultas.get($this.showUI);			
		}, oRegistro);
	}

	var ubs = parseInt($("#agente_ubs").val());
	PonteParaConsultas.getMy(this.showUI, ubs);
}
