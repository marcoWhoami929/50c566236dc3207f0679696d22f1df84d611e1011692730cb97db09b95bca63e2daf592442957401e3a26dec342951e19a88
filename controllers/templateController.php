<?php
require_once "models/templateModel.php";
class ControllerTemplate
{
    public $model;
    function  __construct()
    {
        $this->model = new ModelTemplate();
    }
    public function template()
    {
        include "views/template.php";
    }
    public function ctrAccesoUser()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])
            ) {

                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["email"];

                $response = $this->model->mdlMostrarAdministradores($tabla, $item, $valor);

                if ($response["email"] == $_POST["email"] && $response["password"] == $encriptar) {

                    $_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["id"] = $response["id"];
                    $_SESSION["nombre"] = $response["nombre"];
                    $_SESSION["email"] = $response["email"];
                    $_SESSION["perfil"] = $response["perfil"];


                    echo '<script>
                             
                             window.location = "dashboard";
 
                         </script>';
                } else {

                    echo '<script>
                     Swal.fire({
                        icon: "error",
                        title: "¡Datos de acceso incorrectos, vuelve a intentarlo...!",
						confirmButtonText: "Cerrar"
                      })
 
                 </script>';
                }
            }
        }
    }
}
