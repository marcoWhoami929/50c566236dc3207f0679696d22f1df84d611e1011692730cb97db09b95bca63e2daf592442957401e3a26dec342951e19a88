<?php

require_once "../controllers/functionsController.php";
require_once "../models/functionsModel.php";

class SolicitudesProceso
{


    /*=============================================
	MOTO EN CAMINO
	=============================================*/

    public $status3;
    public $activarId3;

    public function ajaxSolicitudMotoEnCamino()
    {

        $tabla = "solicitudes";

        $item1 = "motoEnCamino";
        $valor1 = $this->status3;

        $item2 = "id";
        $valor2 = $this->activarId3;

        $horaRealizada = date("y-m-d H:i:s");
        $item3 = "enCaminoFecha";
        $valor3 = $horaRealizada;
        $modelo = new ModelFunctions();
        $respuesta = $modelo->mdlActualizarMotoEnCamino($tabla, $item1, $valor1, $item2, $valor2);
        $respuesta2 = $modelo->mdlActualizarMotoEnCaminoFecha($tabla, $item2, $valor2, $item3, $valor3);

        echo $respuesta;
    }

    /*=============================================
	EN PROCESO
	=============================================*/

    public $status5;
    public $activarId5;

    public function ajaxSolicitudEnProceso()
    {

        $tabla = "solicitudes";

        $item1 = "enProceso";
        $valor1 = $this->status5;

        $item2 = "id";
        $valor2 = $this->activarId5;

        $horaRealizada = date("y-m-d H:i:s");
        $item3 = "enProcesoFecha";
        $valor3 = $horaRealizada;
        $modelo = new ModelFunctions();
        $respuesta = $modelo->mdlActualizarEnProceso($tabla, $item1, $valor1, $item2, $valor2);
        $respuesta = $modelo->mdlActualizarEnProcesoFecha($tabla, $item2, $valor2, $item3, $valor3);

        echo $respuesta;
    }

    /*=============================================
	MOTO EN CAMINO REGRESO
	=============================================*/

    public $status7;
    public $activarId7;

    public function ajaxSolicitudMotoEnCaminoRegreso()
    {

        $tabla = "solicitudes";

        $item1 = "motoEnCaminoRegreso";
        $valor1 = $this->status7;

        $item2 = "id";
        $valor2 = $this->activarId7;

        $horaRealizada = date("y-m-d H:i:s");
        $item3 = "regresoFecha";
        $valor3 = $horaRealizada;

        $modelo = new ModelFunctions();
        $respuesta = $modelo->mdlActualizarMotoEnCaminoRegreso($tabla, $item1, $valor1, $item2, $valor2);
        $respuesta = $modelo->mdlActualizarMotoEnCaminoRegresoFecha($tabla, $item2, $valor2, $item3, $valor3);

        echo $respuesta;
    }
    /*=============================================
	CONCLUIDO
	=============================================*/

    public $status8;
    public $activarId8;

    public function ajaxSolicitudConcluido()
    {

        $tabla = "solicitudes";

        $item1 = "concluido";
        $valor1 = $this->status8;

        $item2 = "id";
        $valor2 = $this->activarId8;
        $modelo = new ModelFunctions();
        $respuesta = $modelo->mdlActualizarConcluido($tabla, $item1, $valor1, $item2, $valor2);
        /*============================================= 
        ACTUALIZAR NOTIFICACIONES NUEVAS SOLICITUDES
        =============================================*/
        $item = 'sanmanuel';
        $valor = '';
        $controlador = new ControllerFunctions();

        $traerNotificaciones = $controlador->ctrMostrarNotificacionesApp($item, $valor);

        $concluida = $traerNotificaciones["concluidas"] + 1;

        $concluir = $modelo->mdlActualizarNotificaciones("notificacionesapp", "concluidas", $concluida);

        $item3 = "id";
        $valor3 = $this->activarId8;

        $fechaConcluido = date("y-m-d H:i:s");
        $item4 = "horaConcluido";
        $valor4 = $fechaConcluido;

        $respuesta2 = $modelo->mdlActualizarFechaConcluido($tabla, $item3, $valor3, $item4, $valor4);


        echo $respuesta;
    }
    /*=============================================
	VISTO DE SOLICITUD
	=============================================*/

    public $statusVisto;
    public $activarIdVisto;
    public $activarSucursal;

    public function ajaxVisto()
    {

        $tabla = "solicitudes";

        $item1 = "visto";
        $valor1 = $this->statusVisto;

        $item2 = "id";
        $valor2 = $this->activarIdVisto;

        $horaRealizada = date("y-m-d H:i:s");
        $item3 = "horaVisto";
        $valor3 = $horaRealizada;

        $modelo = new ModelFunctions();
        $respuesta = $modelo->mdlActualizarVisto($tabla, $item1, $valor1, $item2, $valor2);
        $respuesta = $modelo->mdlActualizarVistoFecha($tabla, $item2, $valor2, $item3, $valor3);

        /*============================================= 
        ACTUALIZAR NOTIFICACIONES QUITAR SOLICITUDES
        =============================================*/

        $suc = $this->activarSucursal;
        switch ($suc) {
            case 'San Manuel':
                $sucursal = "sanManuel";
                break;
            case 'Reforma':
                $sucursal = "reforma";
                break;
            case 'Capu':
                $sucursal = "capu";
                break;
            case 'Santiago':
                $sucursal = "santiago";
                break;
            case 'Las Torres':
                $sucursal = "lasTorres";
                break;
        }
        $item = $sucursal;
        $valor = '';
        $controlador = new ControllerFunctions();
        $traerNotificaciones = $controlador->ctrMostrarNotificacionesApp($item, $valor);

        $solicitudes = $traerNotificaciones["total"] - 1;
        $modelo = new ModelFunctions();
        $quitar = $modelo->mdlActualizarNotificaciones("notificacionesapp", $item, $solicitudes);


        echo $respuesta;
    }
    /*=============================================
	EDITAR PROMOCION
	=============================================*/

    public $idPromocion;

    public function ajaxEditarPromocion()
    {

        $item = "id";
        $valor = $this->idPromocion;
        $controlador = new ControllerFunctions();
        $respuesta = $controlador->ctrMostrarPromociones($item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	AGREGAR RUTA DE ARCHIVO
	=============================================*/

    public $folioSolicitud;

    public function ajaxAgregarRutaSolicitud()
    {

        $item = "id";
        $valor = $this->folioSolicitud;
        $controlador = new ControllerFunctions();
        $respuesta = $controlador->ctrAgregarRutaSolicitud($item, $valor);

        echo json_encode($respuesta);
    }
}

/*=============================================
MOTO EN CAMINO
=============================================*/

if (isset($_POST["status3"])) {

    $status1 = new SolicitudesProceso();
    $status1->status3 = $_POST["status3"];
    $status1->activarId3 = $_POST["activarId3"];
    $status1->ajaxSolicitudMotoEnCamino();
}

/*=============================================
EN PROCESO
=============================================*/

if (isset($_POST["status5"])) {

    $status1 = new SolicitudesProceso();
    $status1->status5 = $_POST["status5"];
    $status1->activarId5 = $_POST["activarId5"];
    $status1->ajaxSolicitudEnProceso();
}

/*=============================================
MOTO EN CAMINO DE REGRESO
=============================================*/

if (isset($_POST["status7"])) {

    $status1 = new SolicitudesProceso();
    $status1->status7 = $_POST["status7"];
    $status1->activarId7 = $_POST["activarId7"];
    $status1->ajaxSolicitudMotoEnCaminoRegreso();
}
/*=============================================
CONCLUIDO
=============================================*/

if (isset($_POST["status8"])) {

    $status1 = new SolicitudesProceso();
    $status1->status8 = $_POST["status8"];
    $status1->activarId8 = $_POST["activarId8"];
    $status1->ajaxSolicitudConcluido();
}
/*=============================================
VISTO DE SOLICITUD
=============================================*/

if (isset($_POST["statusVisto"])) {

    $status1 = new SolicitudesProceso();
    $status1->statusVisto = $_POST["statusVisto"];
    $status1->activarIdVisto = $_POST["activarIdVisto"];
    $status1->activarSucursal = $_POST["activarSucursal"];
    $status1->ajaxVisto();
}
/*=============================================
EDITAR PROMOCION
=============================================*/
if (isset($_POST["idPromocion"])) {

    $editar = new SolicitudesProceso();
    $editar->idPromocion = $_POST["idPromocion"];
    $editar->ajaxEditarPromocion();
}
/*=============================================
AGREGAR RUTA DE ARCHIVO
=============================================*/
if (isset($_POST["folioSolicitud"])) {

    $editar = new SolicitudesProceso();
    $editar->folioSolicitud = $_POST["folioSolicitud"];
    $editar->ajaxAgregarRutaSolicitud();
}
