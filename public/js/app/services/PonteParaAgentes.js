function PonteParaAgentes($http) {

	this.get = function(handler) {

		$http.get('agentes').
		success(handler).
		error(handler);
	}

	this.insert = function(handler, agente) {

		var args = [];

		args.push(agente.getNome());
		args.push(agente.getSenha());
		args.push(agente.getEmail());
		args.push(agente.getAdmin());
		args.push(agente.getUBS());


		$http.post('agentes/store/' + args.join('/')).
		success(handler).
		error(handler);
	}
}
