<?php

require_once "../controllers/functionsController.php";
require_once "../models/functionsModel.php";

class ProductosSolicitados
{


    public function mostrarTablas()
    {


        $solicitados = new ControllerFunctions();
        $productosSolicitados = $solicitados->ctrMostrarProductosSolicitados();


        $datosJson = '{
		 
	 	"data": [ ';

        for ($i = 0; $i < count($productosSolicitados); $i++) {


            $marca = "<label class='badge badge-success'>" . $productosSolicitados[$i]["marca"] . "</label>";
            /*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

            $datosJson     .= '[
				      "' . $productosSolicitados[$i]["codigoProducto"] . '",
				      "' . $productosSolicitados[$i]["descripcion"] . '",
                      "$' . number_format($productosSolicitados[$i]["precioVenta"], 2) . '",
				      "' . $marca . '",
				      "' . $productosSolicitados[$i]["ventas"] . '",
                      "' . $productosSolicitados[$i]["piezas"] . '"
				    ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=  ']
			  
		}';

        echo $datosJson;
    }
}

$activar = new ProductosSolicitados();
$activar->mostrarTablas();
