<?php
session_start();
require_once "../../controllers/functionsController.php";
require_once "../../models/functionsModel.php";

?>
<div class="small-box bg-orange" style="border-radius: 200px 200px 200px 200px;-moz-border-radius: 200px 200px 200px 200px;-webkit-border-radius: 200px 200px 200px 200px;">

    <!-- inner -->

    <?php


    if ($_SESSION["perfil"] == "Administrador" || $_SESSION["nombre"] == "Ivan Herrera Perez") {


        $item = 'santiago+sanManuel+reforma+lasTorres+capu';
        $valor = '';
        $notificacion = new ControllerFunctions();
        $notificaciones = $notificacion->ctrMostrarNotificacionesApp($item, $valor);
    } else {

        $usuario = $_SESSION["nombre"];

        switch ($usuario) {
            case 'Sucursal San Manuel':
                $sucursal = "sanManuel";
                break;
            case 'Sucursal Reforma':
                $sucursal = "reforma";
                break;
            case 'Sucursal Capu':
                $sucursal = "capu";
                break;
            case 'Sucursal Santiago':
                $sucursal = "santiago";
                break;
            case 'Sucursal Las Torres':
                $sucursal = "lasTorres";
                break;
        }

        $item = $sucursal;
        $valor = $sucursal;
        $notificacion = new ControllerFunctions();
        $notificaciones = $notificacion->ctrMostrarNotificacionesApp($item, $valor);
    }




    $totalNotificaciones = $notificaciones["total"];


    if ($totalNotificaciones != 0) {

        echo ' <div class="inner animated infinite bounce" >
                        
                                            <a href="" class="actualizarNotificaciones" item="nuevasSolicitudes">
                        
                                                  <i class="fa fa-bell-o fa-2x" style="color: white"></i>

                                                  <span class="label label-danger">' . $totalNotificaciones . '</span>
                                                
                                                </a>


                                          </div>';
    } else {

        echo ' <div class="inner" >
                        
                                            <a href="">
                        
                                                  <i class="fa fa-bell-o fa-2x" style="color: white"></i>

                                                  <span class="label label-danger">' . $totalNotificaciones . '</span>
                                                
                                                </a>


                                          </div>';
    }

    ?>

    <!-- inner -->


</div>