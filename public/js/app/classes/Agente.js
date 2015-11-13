function Agente(nome, senha, email, admin, ubs) {

	validarArgumentos(nome, senha, email, admin);

	var nm = nome;
	var sh = senha;
	var mail = email;
	var adm = parseInt(admin);
	var ub = ubs;

	this.getNome = function() {
		return nm;
	}

	this.getSenha = function() {
		return sh;
	}

	this.getEmail = function() {
		return mail;
	}

	this.getAdmin = function() {
		return adm;
	}

	this.getUBS = function() {
		return ub;
	}

	this.toString = function() {
		return "Agente: " + nm + ' - ' + ' - ' + sh + ' - ' + mail + ' - ' + adm + '-' + ub;
	}


	function validarArgumentos() {
		
		for(var element in arguments ) {

			if(element === undefined || element === "") {

				throw new Error("Invalid arguments to create Agente");	
			}
		}
	}
}