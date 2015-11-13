/**
* Inclui todos os serviços
* By Franklin O.V at Faiton team
*/
eUBS.service(PonteParaConsultas.name, ["$http", PonteParaConsultas]);
eUBS.service(PonteParaPacientes.name, ["$http", PonteParaPacientes]);
eUBS.service(PonteParaAgentes.name, ["$http", PonteParaAgentes]);
eUBS.service(PonteParaAvisos.name, ["$http", PonteParaAvisos]);
