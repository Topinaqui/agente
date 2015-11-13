<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Aviso;

class AvisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
      return Aviso::All();
    }


    /**
     * Display a resource.
     *
     * @return Response
     */
    public function getLer($ubs)
    {
      return Aviso::where("UBSid", "=", $ubs)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
      return "Sem form...";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postStore($titulo, $mensagem, $ativo)
    {
      if (isset($titulo) && isset($mensagem) && isset($ativo)) {

        $aviso = new Aviso;
        $aviso->titulo = $titulo;
        $aviso->mensagem = $mensagem;
        $aviso->ativo = $ativo;
        $aviso->save();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($avisoId)
    {
        return DB::select('select * from avisos where id = 1 and ativo = 1');
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
    public function postPublicar($titulo, $mensagem)
    {
        $aviso = Aviso::find(1);
        $aviso->titulo = $titulo;
        $aviso->mensagem = $mensagem;
        $aviso->ativo = 1;
        $aviso->save();

        return $aviso;
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postDespublicar($avisoId)
    {
        $aviso = Aviso::find($avisoId);
        $aviso->titulo = "";
        $aviso->mensagem = "";
        $aviso->ativo = 0;
        $aviso->save();

        return $aviso;
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
