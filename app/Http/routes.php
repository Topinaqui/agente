<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Agente;
use App\Consulta;
use App\Paciente;

// Route::get('/', function () {
//     //return view('welcome');

// 	$attempt = Auth::attempt([
// 		'name' => 'Franklin',
// 		'password' => 'macarrao'
// 		]);

// 	if ($attempt) {
// 		return 'Logado';//Redirect::intended('/')->with('flash_message', 'Logado :-) ');
// } else {
// 	dd('Problema');
// }
// 	// $agente = new Agente;
// 	// $agente->name = 'Franklin';
// 	// $agente->email = 'franklin@faiton.com';
// 	// $agente->password = bcrypt('macarrao');
// 	// $agente->save();

// 	// return Agente::all();
// });

Route::get('/', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
//Route::get('consultas', 'ConsultasController@showAll');
// Route::get('consultas', function() {

// 	return Consulta::All();
// });

Route::controller('consultas', 'ConsultasController');
Route::controller('pacientes', 'PacientesController');
Route::controller('agentes', 'AgentesController');
Route::controller('avisos', 'AvisosController');
Route::resource('sessions', 'SessionsController');