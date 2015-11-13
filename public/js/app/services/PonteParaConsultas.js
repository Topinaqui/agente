function PonteParaConsultas($http) {

	this.get = function(handler) {

		$http.get('consultas').
		success(handler).
		error(handler);
	}

	this.getMy = function(handler, ubs) {

		$http.get('consultas/my/' + ubs).
		success(handler).
		error(handler);
	}

	this.insert = function(handler, consulta) {

		var args = [];
		var dt = consulta.getData().split('-');
		var hr = consulta.getHora().split(':');

		args.push(dt.join(''));
		args.push(hr.join(''));
		args.push(consulta.getMedico());
		args.push(consulta.getUBS());

		$http.post('consultas/store/' + args.join('/')).
		success(handler).
		error(handler);
	}
}