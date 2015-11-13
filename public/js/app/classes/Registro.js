function Registro(data, hora, medico, ubs) {

	validarArgumentos(data, hora, medico, ubs);

	var dt = data;
	var hr = hora;
	var mdc = medico;
	var ub = ubs;

	this.getData = function() {
		return dt;
	};

	this.getHora = function() {
		return hr;
	}

	this.getMedico = function() {
		return mdc;
	}

	this.getUBS = function() {
		return ub;
	}

	this.toString = function() {
		return "Registro: " + dt + ' - ' + hr + ' - ' + mdc + '-' + ub;
	}

	function validarArgumentos() {
		
		for(var element in arguments ) {

			if(element === undefined || element === "") {

				throw new Error("Invalid arguments to create Registro");	
			}
		}
	}

}