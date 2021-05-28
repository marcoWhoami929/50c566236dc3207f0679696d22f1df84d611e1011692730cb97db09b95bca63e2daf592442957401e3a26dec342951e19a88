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
	VER DATOS DEL CLIENTE
	=============================================*/

    public $idDatosCliente;

    public function ajaxVerDatosCliente()
    {

        $item2 = "idCliente";
        $valor2 = $this->idDatosCliente;

        $respuesta = $this->controller->ctrMostrarDatosClienteMuestras($item2, $valor2);

        echo json_encode($respuesta);
    }

    public $nameSucursal;

    public function ajaxVerSucursal()
    {

        $item = "sucursal";
        $valor = $this->nameSucursal;

        $respuesta = $this->controller->ctrMostrarSucursales($item, $valor);

        echo json_encode($respuesta);
    }

    public $idClienteFacturacion;

    public function ajaxVerDatosFacturacion()
    {

        $item = "idCliente";
        $valor = $this->idClienteFacturacion;

        $respuesta = $this->controller->ctrMostrarDatosFacturacion($item, $valor);

        echo json_encode($respuesta);
    }
}
/*=============================================
VER DATOS CLIENTE
=============================================*/
if (isset($_POST["idDatosCliente"])) {

    $verDatosCliente = new SolicitudesAcciones();
    $verDatosCliente->idDatosCliente = $_POST["idDatosCliente"];
    $verDatosCliente->ajaxVerDatosCliente();
}
/*=============================================
VER DATOS FACTURACION
=============================================*/
if (isset($_POST["idClienteFacturacion"])) {

    $verDatosFacturacion = new SolicitudesAcciones();
    $verDatosFacturacion->idClienteFacturacion = $_POST["idClienteFacturacion"];
    $verDatosFacturacion->ajaxVerDatosFacturacion();
}
/*=============================================

=============================================*/
if (isset($_POST["nameSucursal"])) {

    $verDatosCliente = new SolicitudesAcciones();
    $verDatosCliente->nameSucursal = $_POST["nameSucursal"];
    $verDatosCliente->ajaxVerSucursal();
}
