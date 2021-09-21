<?php

require_once  __DIR__ . "../../models/functionsModel.php";
class ControllerFunctions
{

    public $modelo;
    function  __construct()
    {
        $this->modelo = new ModelFunctions();
    }


    /*=============================================
	MOSTRAR DATOS DEL PARTICIPANTE
	=============================================*/

    public function ctrMostrarDatosParticipante($item, $valor)
    {

        $tabla = "participantes";

        $response = $this->modelo->mdlMostrarDatosParticipante($tabla, $item, $valor);

        return  $response;
    }
}
