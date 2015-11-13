function PonteParaPacientes($http) {

	this.get = function(handler) {

		$http.get('pacientes').
		success(handler).
		error(handler);
	}

	this.insert = function(handler, paciente) {

		var args = [];

		args.push(paciente.getNome());
		args.push(paciente.getSenha());
		args.push(paciente.getSUS());
		args.push(paciente.getUBS());

		$http.post('pacientes/store/' + args.join('/')).
		success(handler).
		error(handler);
	}
}
