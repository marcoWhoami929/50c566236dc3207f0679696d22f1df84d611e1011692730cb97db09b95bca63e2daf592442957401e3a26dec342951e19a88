<?php

require_once "../controllers/functionsController.php";
require_once "../models/functionsModel.php";

class ClientesRegistrados
{


    public function mostrarTablas()
    {


        $clientes = new ControllerFunctions();
        $clientesRegistrados = $clientes->ctrMostrarClientesRegistrados();


        $datosJson = '{
		 
	 	"data": [ ';

        for ($i = 0; $i < count($clientesRegistrados); $i++) {



            /*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

            $datosJson     .= '[
                "' . $clientesRegistrados[$i]["id"] . '",
				      "' . $clientesRegistrados[$i]["nombreCompleto"] . '",
				      "' . $clientesRegistrados[$i]["taller"] . '",
                      "' . $clientesRegistrados[$i]["telefono"] . '",
                      "' . $clientesRegistrados[$i]["celular"] . '",
                      "' . $clientesRegistrados[$i]["compras"] . '",
                      "$' . number_format($clientesRegistrados[$i]["acumulado"], 2) . '"
				    ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=  ']
			  
		}';

        echo $datosJson;
    }
}

$activar = new ClientesRegistrados();
$activar->mostrarTablas();
