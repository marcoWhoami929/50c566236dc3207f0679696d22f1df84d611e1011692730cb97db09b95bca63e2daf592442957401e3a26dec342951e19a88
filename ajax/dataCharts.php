<?php
require_once "../models/functionsModel.php";
$acumula = new ModelFunctions();
if (isset($_GET["grafico"])) {
    if ($_GET["grafico"] == "grafico1") {
        $facturasRegistradas = $acumula->mdlObtenerFacturasRegistradasPorTienda();

        $etiquetas = array();
        $datos = array();
        foreach ($facturasRegistradas as $key => $value) {

            switch ($value["serie"]) {
                case 'FASM':
                    $tienda = "SAN MANUEL";
                    break;
                case 'FACP':
                    $tienda = "CAPU";
                    break;
                case 'FASG':
                    $tienda = "SANTIAGO";
                    break;
                case 'FARF':
                    $tienda = "REFORMA";
                    break;
                case 'FATR':
                    $tienda = "LAS TORRES";
                    break;
            }
            array_push($etiquetas, $tienda);
            array_push($datos, $value["cantidad"]);
        }

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datos,
        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico2") {
        $facturasRegistradas = $acumula->mdlObtenerFacturasRegistradasPorTienda();

        $etiquetas = array();
        $datos = array();
        foreach ($facturasRegistradas as $key => $value) {
            switch ($value["serie"]) {
                case 'FASM':
                    $tienda = "SAN MANUEL";
                    break;
                case 'FACP':
                    $tienda = "CAPU";
                    break;
                case 'FASG':
                    $tienda = "SANTIAGO";
                    break;
                case 'FARF':
                    $tienda = "REFORMA";
                    break;
                case 'FATR':
                    $tienda = "LAS TORRES";
                    break;
            }
            array_push($etiquetas, $tienda);
            array_push($datos, $value["montoAcumulado"]);
        }

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datos,
        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico3") {
        $facturasRegistradas = $acumula->mdlGanadoresPorTienda();

        $etiquetas = array();
        $datos = array();
        foreach ($facturasRegistradas as $key => $value) {
            switch ($value["serie"]) {
                case 'FASM':
                    $tienda = "SAN MANUEL";
                    break;
                case 'FACP':
                    $tienda = "CAPU";
                    break;
                case 'FASG':
                    $tienda = "SANTIAGO";
                    break;
                case 'FARF':
                    $tienda = "REFORMA";
                    break;
                case 'FATR':
                    $tienda = "LAS TORRES";
                    break;
            }
            array_push($etiquetas, $tienda);
            array_push($datos, $value["cantidad"]);
        }  
        $tiendas = array('SAN MANUEL','CAPU','REFORMA','LAS TORRES','SANTIAGO');
        for ($i=0; $i < 5 ; $i++) { 

                if (in_array($tiendas[$i], $etiquetas)) {
           
                }else{
                    array_push($etiquetas, $tiendas[$i]);
                    array_push($datos, 0);
                }
           
        }
      

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datos,
        ];
        echo json_encode($respuesta);
    }
     if ($_GET["grafico"] == "grafico4") {
        $facturasRegistradas = $acumula->mdlGanadoresPorTienda();

        $etiquetas = array();
        $datos = array();
        foreach ($facturasRegistradas as $key => $value) {
            switch ($value["serie"]) {
                case 'FASM':
                    $tienda = "SAN MANUEL";
                    break;
                case 'FACP':
                    $tienda = "CAPU";
                    break;
                case 'FASG':
                    $tienda = "SANTIAGO";
                    break;
                case 'FARF':
                    $tienda = "REFORMA";
                    break;
                case 'FATR':
                    $tienda = "LAS TORRES";
                    break;
            }
            array_push($etiquetas, $tienda);
            array_push($datos, $value["cantidad"]);
        }  
        $tiendas = array('SAN MANUEL','CAPU','REFORMA','LAS TORRES','SANTIAGO');
        for ($i=0; $i < 5 ; $i++) { 

                if (in_array($tiendas[$i], $etiquetas)) {
           
                }else{
                    array_push($etiquetas, $tiendas[$i]);
                    array_push($datos, 0);
                }
           
        }
      

        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datos,
        ];
        echo json_encode($respuesta);
    }

}
