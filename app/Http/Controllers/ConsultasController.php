<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Consulta;
use DB;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {   
        return DB::select('select * from consultas where data >= ? and paciente = 0', [date('Y-m-d')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getMy($ubs)
    {
        return DB::select('select * from consultas where data > ? and UBSid = ? and paciente = 0', [date('Y-m-d'), $ubs]);
    }

    /**
     * Display a listing of the specific resource.
     *
     * @return Response
     */
    public function getData($medico, $ubs) 
    {  // return DB::select('select * from consultas where data = ? and medico = ? and paciente = 0', [$data, $medico]);
       return DB::select('select * from consultas where data >= ? and medico = ? and UBSid = ? and paciente = 0', [date('Y-m-d'), $medico, $ubs]);       
    }


    /**
     * Display a listing of the specific resource.
     *
     * @return Response
     */
    public function getHora($medico, $data, $ubs) 
    {  // return DB::select('select * from consultas where data = ? and medico = ? and paciente = 0', [$data, $medico]);
       return DB::select('select * from consultas where data >= ? and data >= ? and medico = ? and UBSid = ? and paciente = 0', [date('Y-m-d'), $data, $medico, $ubs]);       
    }

     /**
     * Display a listing of the specific resource.
     *
     * @return Response
     */
    public function getUnique($medico, $data, $hora, $ubs) 
    { 
       return DB::select('select * from consultas where data >= ? and data >= ? and medico = ? and hora = ? and UBSid = ? and paciente = 0', [date('Y-m-d'), $data, $medico, $hora, $ubs]);       
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
    public function postStore($data, $hora, $medico)
    {
        //Validar
        if (isset($data) && isset($hora) && isset($medico)) {

            $consulta = new Consulta;
            $consulta->data = $data;
            $consulta->hora = $hora;
            $consulta->medico = $medico;
            $consulta->paciente = "";
            $consulta->save();

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
        return DB::select('select * from consultas where data >= ? and paciente = ?', [date('Y-m-d'), $id]);
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
    public function postUpdate($consultaId, $pacienteId)
    {
        $consulta = Consulta::find($consultaId);
        $consulta->paciente = $pacienteId;
        $consulta->save();

        return $consulta;
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
