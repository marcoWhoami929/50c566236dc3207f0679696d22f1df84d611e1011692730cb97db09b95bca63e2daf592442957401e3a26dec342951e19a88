<?php
require_once "../controllers/functionsController.php";

class SolicitudesAcciones
{

    public $controller;
    function __construct()
    {
        $this->controller = new ControllerFunctions();
    }
    /*=============================================
	VER DATOS DEL PARTICIPANTE
	=============================================*/

    public $idParticipante;

    public function iajaxVerDatosParticipante()
    {

        $item = "id";
        $valor = $this->idParticipante;

        $respuesta = $this->controller->ctrMostrarDatosParticipante($item, $valor);

        echo json_encode($respuesta);
    }
}
/*=============================================
VER DATOS PARTICIPANTE
=============================================*/
if (isset($_POST["idParticipante"])) {

    $verDatosCliente = new SolicitudesAcciones();
    $verDatosCliente->idParticipante = $_POST["idParticipante"];
    $verDatosCliente->iajaxVerDatosParticipante();
}
