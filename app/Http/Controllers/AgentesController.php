<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agente;

class AgentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return Agente::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        return "Viver eh bom";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore($nome, $senha, $email, $admin)
    {
        //Validar
        if (isset($nome) && isset($senha) && isset($email) && isset($admin)) {

            $agente = new Agente;
            $agente->name = $nome;
            $agente->password = bcrypt($senha);
            $agente->email = $email;
            $agente->admin = $admin;
            $agente->save();

            return "true";
        } 
        else {
            return "false";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postDestroy($id)
    {
        //
    }
}
