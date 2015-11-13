function Consulta(data, hora, medico) {

	validarArgumentos(data, hora, medico);

	var dt = data;
	var hr = hora;
	var mdc = medico;


	this.getData = function() {
		return dt;
	};

	this.getHora = function() {
		return hr;
	}

	this.getMedico = function() {
		return mdc;
	}

	this.toString = function() {
		return "Consulta: " + dt + '-' + hr + '-' + mdc;
	}

	function validarArgumentos() {

		arguments.forEach(function(element, index) {

			if(element === undefined || element === "") {
				throw new Error("Invalid arguments to create Consulta");	
			}
		});
	}

}