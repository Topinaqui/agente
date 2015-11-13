function Paciente(nome, senha, sus, ubs) {

	validarArgumentos(nome, senha, sus, ubs);

	var nm = nome;
	var sh = senha;
	var su = sus;
	var ub = ubs;

	this.getNome = function() {
		return nm;
	}

	this.getSenha = function() {
		return sh;
	}

	this.getSUS = function() {
		return su;
	}

	this.getUBS = function() {
		return ub;
	}

	this.toString = function() {
		return "Paciente: " + nm + ' - ' + ' - ' + sh + ' - ' + su + '-' + ub;
	}


	function validarArgumentos() {
		
		for(var element in arguments ) {

			if(element === undefined || element === "") {

				throw new Error("Invalid arguments to create Paciente");	
			}
		}
	}
}