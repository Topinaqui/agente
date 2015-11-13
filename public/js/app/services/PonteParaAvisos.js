function PonteParaAvisos($http) {

	this.publicar = function(handler, titulo, mensagem, ubs) {

		$http.post('avisos/publicar/' + titulo + '/' + mensagem + '/' + ubs).
		success(handler).
		error(handler);
	}

	this.despublicar = function(handler, avisoId, ubs) {

		$http.post('avisos/despublicar/' + avisoId + '/' + ubs).
		success(handler).
		error(handler);
	}

	this.ler = function(handler, avisoId, ubs) {

		$http.get('avisos/ler').
		success(handler).
		error(handler);
	}
}