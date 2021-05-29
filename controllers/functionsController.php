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
	MOSTRAR MUESTRAS
	=============================================*/

    public function ctrMostrarMuestras($item, $valor)
    {

        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarMuestras($tabla, $item, $valor);

        return  $response;
    }
    /*=============================================
	MOSTRAR MUESTRAS PDF
	=============================================*/

    public function ctrMostrarMuestrasPdf($item, $valor)
    {

        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarMuestrasPdf($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	MOSTRAR DATOS DEL PRODUCTO
	=============================================*/

    public function ctrMostrarDatosProducto($item, $valor)
    {

        $tabla = "masvendido";

        $response = $this->modelo->mdlMostrarDatosProducto($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	AGREGAR RUTA DE ARCHIVO
	=============================================*/

    public function ctrAgregarRutaSolicitud($item, $valor)
    {

        $tabla = "solicitudes";

        $response = $this->modelo->mdlAgregarRutaSolicitud($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR SOLCITUDES TOTALES
	=============================================*/

    public function ctrMostrarTotalSolicitudes($item, $valor)
    {
        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarTotalSolicitudes($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR SOLCITUDES EN CAMINO
	=============================================*/

    public function ctrMostrarTotalEnCamino($item, $valor)
    {
        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarTotalEnCamino($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR SOLCITUDES EN PROCESO
	=============================================*/

    public function ctrMostrarTotalEnProceso($item, $valor)
    {
        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarTotalEnProceso($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR SOLCITUDES EN ENTREGA
	=============================================*/

    public function ctrMostrarTotalEnEntrega($item, $valor)
    {
        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarTotalEnEntrega($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR SOLCITUDES CONCLUIDO
	=============================================*/

    public function ctrMostrarTotalConcluido($item, $valor)
    {
        $tabla = "solicitudes";

        $response = $this->modelo->mdlMostrarTotalConcluido($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR PROMOCIONES
	=============================================*/

    public function ctrMostrarPromociones($item, $valor)
    {

        $tabla = "promociones";

        $response = $this->modelo->mdlMostrarPromociones($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR DATOS CLIENTE
	=============================================*/

    public function ctrMostrarDatosCliente($item, $valor)
    {

        $tabla = "user";

        $response = $this->modelo->mdlMostrarDatosCliente($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	DESCARGAR SOLICITUD
	=============================================*/

    public function ctrDescargarSolicitud()
    {

        if (isset($_GET["idSolicitud"]) && $_GET["opcion"] == 1) {

            $tabla = "solicitudes";
            $datos = array("id" => $_GET["idSolicitud"]);


            $response = $this->modelo->mdlDescargarSolicitud($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "La solicitud ha sido descargada",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "controlMuestras";

								}
							})

				</script>';
            }
        }
    }
    /*=============================================
	EDITAR PROMOCIÓN
	=============================================*/

    public function ctrEditarPromocion()
    {

        if (isset($_POST["idPromocion"])) {


            /*=============================================
				VALIDAR IMAGEN
				=============================================*/

            $ruta = $_POST["fotoActual"];

            if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                /*
					// Open image as a string 
					$data = file_get_contents($_FILES["editarFoto"]["tmp_name"]); 
					  
					// getimagesizefromstring function accepts image data as string 
					list($width, $height) = getimagesizefromstring($data); 

					$nuevoAncho = $width;
					$nuevoAlto = $height;
					*/
                list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                $nuevoAncho = $ancho;
                $nuevoAlto = $alto;


                /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

                if (!empty($_POST["fotoActual"])) {

                    unlink($_POST["fotoActual"]);
                } else {

                    mkdir(isset($directorio), 0755);
                }

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/promocionesApp/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["editarFoto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/promocionesApp/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            $tabla = "promociones";

            $datos = array(
                "id" => $_POST["idPromocion"],
                "descripcion" => $_POST["editarDescripcion"],
                "activa" => $_POST["editarEstado"],
                "imagen" => $ruta
            );

            $response = $this->modelo->mdlEditarPromocion($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "La promoción ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "controlMuestras";

									}
								})

					</script>';
            }
        }
    }
    /*=============================================
	MOSTRAR DATOS DEL CLIENTE
	=============================================*/

    public function ctrMostrarDatosClienteMuestras($item2, $valor2)
    {

        $tabla = "user";

        $response = $this->modelo->mdlMostrarDatosClienteMuestras($tabla, $item2, $valor2);

        return $response;
    }
    /*=============================================
	MOSTRAR DATOS FACTURACION
	=============================================*/

    public function ctrMostrarDatosFacturacion($item, $valor)
    {

        $tabla = "user";

        $response = $this->modelo->mdlMostrarDatosFacturacion($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR CRTERA DE CLIENTES
	=============================================*/

    public function ctrMostrarCarteraClientes($item, $valor)
    {

        $tabla = "user";

        $response = $this->modelo->mdlMostrarCarteraClientes($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	MOSTRAR DATOS DE SUCURSALES
	=============================================*/

    public function ctrMostrarSucursales($item, $valor)
    {

        $tabla = "sucursales";

        $response = $this->modelo->mdlMostrarSucursales($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	MOSTRAR CATALOGO DE PRODUCTOS
	=============================================*/

    public function ctrMostrarProductos($item, $valor)
    {

        $tabla = "productoscatalogo";

        $response = $this->modelo->mdlMostrarProductos($tabla, $item, $valor);

        return $response;
    }
    /*=============================================
	MOSTRAR SUBCATEGORIAS
	=============================================*/

    public function ctrMostrarCatalogo($item, $valor)
    {

        $tabla = "subcategoriamarca";

        $response = $this->modelo->mdlMostrarCatalogo($tabla, $item, $valor);

        return $response;
    }
    public function ctrMostrarSubcategoria($item, $valor)
    {

        $tabla = "subcategoriamarca";

        $response = $this->modelo->mdlMostrarSubcategoria($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	MOSTRAR SUBCATEGORIA DESGLOSE
	=============================================*/
    public function ctrMostrarSubcategoriaDesglose($item, $valor)
    {

        $tabla = "subcategoriadesglose";

        $response = $this->modelo->mdlMostrarSubcategoriaDesglose($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	MOSTRAR SUBCATEGORIA SUBDESGLOSE
	=============================================*/
    public function ctrMostrarSubdesglose($item, $valor)
    {

        $tabla = "subcategoriasubdesglose";

        $response = $this->modelo->mdlMostraraSubdesglose($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	MOSTRAR CATALOGO DE PRODUCTOS
	=============================================*/

    public function ctrMostrarMarcas($item, $valor)
    {

        $tabla = "categoriasmarca";

        $response = $this->modelo->mdlMostrarMarcas($tabla, $item, $valor);

        return $response;
    }

    /*=============================================
	AGREGAR NUEVO PRODUCTO
	=============================================*/
    public function ctrAgregarProducto()
    {

        if (isset($_POST["addDescripcion"])) {

            $tabla = "productoscatalogo";

            $datos = array(
                "codigo" => $_POST["addCodigo"],
                "descripcion" => $_POST["addDescripcion"],
                "cubeta" => $_POST["addPrecioCubeta"],
                "galon" => $_POST["addPrecioGalon"],
                "litro" => $_POST["addPrecioLitro"],
                "medio" => $_POST["addPrecioMedio"],
                "cuart" => $_POST["addPrecioCuarto"],
                "octav" => $_POST["addPrecioOctavo"],
                "unidadMedida" => $_POST["addUnidadMedida"],
                "valorMedida" => $_POST["addValorMedida"],
                "gramaje" => $_POST["addGramaje"],
                "nombre" => $_POST["addNombreUnidad"],
                "idSubcategoriaDesglose" => $_POST["addCatalogo"]
            );

            $response = $this->modelo->mdlAgregarProducto($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "catalogoProductos";

						}

					});
				

					</script>';
            }
        }
    }

    /*=============================================
	AGREGAR NUEVA MARCA
	=============================================*/
    public function ctrAgregarMarca()
    {

        if (isset($_POST["addNombre"])) {

            $ruta = "";

            if (isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;


                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            $tabla = "categoriasmarca";

            $datos = array(
                "nombre" => $_POST["addNombre"],
                "rutaFoto" => $ruta
            );

            $response = $this->modelo->mdlAgregarMarca($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
            }
        }
    }

    /*=============================================
	AGREGAR NUEVA SUBCATEGORIA MARCA
	=============================================*/
    public function ctrAgregarSubcategoria()
    {

        if (isset($_POST["addNombreSub"])) {

            $ruta = "";

            if (isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;


                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            $tabla = "subcategoriamarca";

            $datos = array(
                "nombreSubcategoria" => $_POST["addNombreSub"],
                "rutaFotoSubcategoria" => $ruta,
                "idMarca" => $_POST["addMarcaSub"]
            );

            $response = $this->modelo->mdlAgregarSubcategoria($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
            }
        }
    }

    /*=============================================
	AGREGAR NUEVA SUBCATEGORIA DESGLOSE
	=============================================*/
    public function ctrAgregarSubcategoriaDesglose()
    {

        if (isset($_POST["addDescripcion"])) {


            $tabla = "subcategoriadesglose";

            $datos = array(
                "descripcion" => $_POST["addDescripcion"],
                "idSubcategoria" => $_POST["addCategoria"]
            );

            $response = $this->modelo->mdlAgregarSubcategoriaDesglose($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡Ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
            }
        }
    }

    /*=============================================
	AGREGAR NUEVA SUBCATEGORIA SUBDESGLOSE
	=============================================*/
    public function ctrAgregarSubcategoriaSubdesglose()
    {

        if (isset($_POST["addDescripcionSub"])) {


            $tabla = "subcategoriasubdesglose";

            $datos = array(
                "descripcion" => $_POST["addDescripcionSub"],
                "idDesglose" => $_POST["addSubdesglose"],
                "marca" => $_POST["addMarca"]
            );

            $response = $this->modelo->mdlAgregarSubcategoriaSubdesglose($tabla, $datos);

            if ($response == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡Ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
            }
        }
    }

    /*=============================================
	EDITAR PRODUCTO
	=============================================*/

    public function ctrEditarProducto()
    {
        if (isset($_POST["idProducto"])) {

            $tabla = "productoscatalogo";
            $datos = array(
                "id" => $_POST["idProducto"],
                "codigo" => $_POST["editarCodigo"],
                "descripcion" => $_POST["editarDescripcion"],
                "cubeta" => $_POST["editarPrecioCubeta"],
                "galon" => $_POST["editarPrecioGalon"],
                "litro" => $_POST["editarPrecioLitro"],
                "medio" => $_POST["editarPrecioMedio"],
                "cuart" => $_POST["editarPrecioCuarto"],
                "octav" => $_POST["editarPrecioOctavo"],
                "unidadMedida" => $_POST["editarUnidadMedida"],
                "valorMedida" => $_POST["editarValorMedida"],
                "gramaje" => $_POST["editarGramaje"],
                "nombre" => $_POST["editarNombreUnidad"],
                "idSubcategoriaDesglose" => $_POST["editarCatalogoDesglose"]
            );
            $response = $this->modelo->mdlEditarProducto($tabla, $datos);
            if ($response == "ok") {
                echo '<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "catalogoProductos";
									}
								})
					</script>';
            }
        }
    }

    /*=============================================
	EDITAR MARCA
	=============================================*/

    public function ctrEditarMarca()
    {
        if (isset($_POST["idMarcas"])) {
            /*=============================================
				VALIDAR IMAGEN
				=============================================*/
            $ruta = $_POST["fotoActual"];

            if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/
                if (!empty($_POST["fotoActual"])) {
                    unlink($_POST["fotoActual"]);
                } else {
                    mkdir(isset($directorio), 0755);
                }

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["editarFoto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            $tabla = "categoriasmarca";

            $datos = array(
                "idMarca" => $_POST["idMarcas"],
                "nombre" => $_POST["editarNombre"],
                "rutaFoto" => $ruta
            );
            $response = $this->modelo->mdlEditarMarca($tabla, $datos);
            if ($response == "ok") {
                echo '<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';
            }
        }
    }

    /*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/

    public function ctrEditarSubcategoria()
    {
        if (isset($_POST["idSubMarca"])) {
            /*=============================================
				VALIDAR IMAGEN
				=============================================*/
            $ruta = $_POST["fotoActual"];

            if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/
                if (!empty($_POST["fotoActual"])) {
                    unlink($_POST["fotoActual"]);
                } else {
                    mkdir(isset($directorio), 0755);
                }

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["editarFoto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            $tabla = "subcategoriamarca";

            $datos = array(
                "idSubcategoria" => $_POST["idSubMarca"],
                "nombreSubcategoria" => $_POST["editarSubcategoria"],
                "rutaFotoSubcategoria" => $ruta,
                "idMarca" => $_POST["editarMarcaSub"]
            );

            $response = $this->modelo->mdlEditarSubcategoria($tabla, $datos);
            if ($response == "ok") {
                echo '<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';
            }
        }
    }

    /*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/

    public function ctrEditarSubcategoriaDesglose()
    {
        if (isset($_POST["idDesglose"])) {

            $tabla = "subcategoriadesglose";

            $datos = array(
                "id" => $_POST["idDesglose"],
                "descripcion" => $_POST["editarDescripcion"],
                "idSubcategoria" => $_POST["editarSubcategoriaD"]
            );

            $response = $this->modelo->mdlEditarSubcategoriaDesglose($tabla, $datos);
            if ($response == "ok") {
                echo '<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';
            }
        }
    }
    /*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/

    public function ctrEditarSubDesglose()
    {
        if (isset($_POST["idSub"])) {

            $tabla = "subcategoriasubdesglose";

            $datos = array(
                "id" => $_POST["idSub"],
                "descripcion" => $_POST["editarDescripcionSub"],
                "idDesglose" => $_POST["editarSubDesglose"],
                "marca" => $_POST["editarMarca"]
            );

            $response = $this->modelo->mdlEditarSubDesglose($tabla, $datos);
            if ($response == "ok") {
                echo '<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';
            }
        }
    }

    /*==============================================
			ELIMINAR PRODUCTO
	==============================================*/

    public function ctrEliminarProducto()
    {

        if (isset($_GET["idProducto"])) {

            $tabla = "productoscatalogo";

            $datos = $_GET["idProducto"];

            $response = $this->modelo->mdlEliminarProducto($tabla, $datos);


            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "catalogoProductos";

								}
							})

				</script>';
            }
        }
    }

    /*==============================================
			ELIMINAR MARCA
	==============================================*/

    public function ctrEliminarMarca()
    {

        if (isset($_GET["idMarca"])) {

            $tabla = "categoriasmarca";

            $datos = $_GET["idMarca"];

            $response = $this->modelo->mdlEliminarMarca($tabla, $datos);


            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';
            }
        }
    }

    /*==============================================
			ELIMINAR SUBCATEGORIA
	==============================================*/

    public function ctrEliminarSubcategoria()
    {

        if (isset($_GET["idSubMarca"])) {

            $tabla = "subcategoriamarca";

            $datos = $_GET["idSubMarca"];

            $response = $this->modelo->mdlEliminarSubcategoria($tabla, $datos);


            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';
            }
        }
    }

    /*==============================================
			ELIMINAR SUBCATEGORIA
	==============================================*/

    public function ctrEliminarSubcategoriaDesglose()
    {

        if (isset($_GET["idDesglose"])) {

            $tabla = "subcategoriadesglose";

            $datos = $_GET["idDesglose"];

            $response = $this->modelo->mdlEliminarSubcategoriaDesglose($tabla, $datos);


            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';
            }
        }
    }

    /*==============================================
			ELIMINAR SUBCATEGORIA SUBDESGLOSE
	==============================================*/

    public function ctrEliminarSubDesglose()
    {

        if (isset($_GET["idSub"])) {

            $tabla = "subcategoriasubdesglose";

            $datos = $_GET["idSub"];

            $response = $this->modelo->mdlEliminarSubDesglose($tabla, $datos);


            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';
            }
        }
    }

    /*==============================================
			ELIMINAR CLIENTE
	==============================================*/

    public function ctrEliminarCliente()
    {

        if (isset($_GET["idCliente"])) {

            $tabla = "user";

            $datos = $_GET["idCliente"];

            $response = $this->modelo->mdlEliminarCliente($tabla, $datos);


            if ($response == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "carteraClientes";

								}
							})

				</script>';
            }
        }
    }
    /*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

    public function ctrMostrarNotificaciones()
    {

        $tabla = "notificaciones";

        $respuesta = $this->modelo->mdlMostrarNotificaciones($tabla);

        return $respuesta;
    }
    /*=============================================
	MOSTRAR NOTIFICACIONES APP
	=============================================*/

    public function ctrMostrarNotificacionesApp($item, $valor)
    {

        $tabla = "notificacionesapp";

        $respuesta = $this->modelo->mdlMostrarNotificacionesApp($tabla, $item, $valor);

        return $respuesta;
    }
}
