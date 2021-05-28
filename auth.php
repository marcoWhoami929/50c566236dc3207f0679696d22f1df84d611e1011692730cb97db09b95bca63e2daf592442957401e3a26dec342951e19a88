<?php
header("Access-Control-Allow-Origin: *");
include "encriptador.php";


//Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "") or die("could not connect server");
mysqli_set_charset($conn, 'utf8');
mysqli_select_db($conn, "sanfranc_matriz") or die("could not connect database");
//CREAR UNA NUEVA CUENTA
if (isset($_POST['signup'])) {
    $nombreCompleto = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['fullname'])));
    $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['password'])));

    $passwordEncrypt = $encriptar($password);

    $taller = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['taller'])));
    $telefono = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['telefono'])));
    $celular = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['celular'])));
    $direccion = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['direccion'])));
    $latitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['latitud'])));
    $longitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['longitud'])));
    $login = mysqli_num_rows(mysqli_query($conn, "select * from `user` where `email`='$email'"));
    if ($login != 0) {
        echo "exist";
    } else {
        $date = date("d-m-y h:i:s");
        $q = mysqli_query($conn, "insert into `user` (`fechaRegistro`,`nombreCompleto`,`email`,`password`, `taller`, `telefono`, `celular`, `direccion`, `latitud`, `longitud`) values ('$date','$nombreCompleto','$email','$passwordEncrypt','$taller','$telefono','$celular', '$direccion', '$latitud', '$longitud')");
        if ($q) {
            echo "success";
        } else {
            echo "failed";
        }
    }
    echo mysqli_error($conn);
}
//PROCESAR SOLICITUD
if (isset($_POST['solicitudProceso'])) {
    $nombreCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['nombreCliente'])));
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));
    $observacionesSolicitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['observacionesSolicitud'])));
    $observacionesProductos = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['observacionesProductos'])));
    $sucursalElegida = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['sucursalElegida'])));
    $formaPago = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST["formaPago"])));
    $lista = $_POST["listaProductos"];

    if ($lista == "[]") {

        $listaProductos = "[{}]";
    } else {

        $listaProductos = $_POST["listaProductos"];
    }

    $solicitudEnviada = 1;
    $rutaSolicitud = "";
    //$formaPago = "EFECTIVO";
    $obtenerLista = mysqli_query($conn, "Select * from solicitudes where `idCliente`='$idCliente'");


    if (mysqli_num_rows($obtenerLista) == 4) {

        $q = mysqli_query($conn, "insert into `solicitudes` (`cliente`,`idCliente`,`sucursal`,`observaciones`,`solicitudEnviada`,`listaProductos`,`observacionesProductos`,`rutaSolicitud`,`formaPago`) values ('$nombreCliente','$idCliente','$sucursalElegida','$observacionesSolicitud','$solicitudEnviada','$listaProductos','$observacionesProductos','$rutaSolicitud','$formaPago')");
        mysqli_query($conn, "update `solicitudes` set `ganadorRifa`='1' where `idCliente`='$idCliente'");

        echo "ganador";
    } else if (mysqli_num_rows($obtenerLista) < 4) {

        $q = mysqli_query($conn, "insert into `solicitudes` (`cliente`,`idCliente`,`sucursal`,`observaciones`,`solicitudEnviada`,`listaProductos`,`observacionesProductos`,`rutaSolicitud`,`formaPago`) values ('$nombreCliente','$idCliente','$sucursalElegida','$observacionesSolicitud','$solicitudEnviada','$listaProductos','$observacionesProductos','$rutaSolicitud','$formaPago')");



        if ($q) {
            //include("send_sms.php");
            echo "success";
        } else {
            echo "failed";
        }
    } else if (mysqli_num_rows($obtenerLista) >= 5) {

        $q = mysqli_query($conn, "insert into `solicitudes` (`cliente`,`idCliente`,`sucursal`,`observaciones`,`solicitudEnviada`,`listaProductos`,`observacionesProductos`,`rutaSolicitud`,`formaPago`) values ('$nombreCliente','$idCliente','$sucursalElegida','$observacionesSolicitud','$solicitudEnviada','$listaProductos','$observacionesProductos','$rutaSolicitud','$formaPago')");



        if ($q) {
            //include("send_sms.php");
            echo "success";
        } else {
            echo "failed";
        }
    }

    switch ($sucursalElegida) {
        case 'San Manuel':
            $sucursal = 'sanManuel';
            break;
        case 'Capu':
            $sucursal = 'capu';
            break;
        case 'Reforma':
            $sucursal = 'reforma';
            break;
        case 'Santiago':
            $sucursal = 'santiago';
            break;
        case 'Las Torres':
            $sucursal = 'lasTorres';
            break;
    }



    $listaNotificaciones = mysqli_query($conn, "Select max($sucursal) as total from notificacionesapp");
    while ($dato = mysqli_fetch_array($listaNotificaciones)) {
        $valor = $dato["total"];

        if ($valor == 0) {

            $nuevaNotificacion = mysqli_query($conn, "UPDATE notificacionesapp SET $sucursal = '$valor' + 1");
        } else {

            $nuevaNotificacion = mysqli_query($conn, "UPDATE notificacionesapp SET $sucursal = '$valor' + 1");
        }
    }



    echo mysqli_error($conn);
}
/**
 * ACTUALIZAR SI REQUIERE FACTURA EL CIENTE
 */
if (isset($_POST['actualizarRequiereFactura'])) {
    $idSolicitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idSolicitud'])));

    $q = mysqli_query($conn, "UPDATE `solicitudes` SET requiereFactura = 1 WHERE id = '$idSolicitud'");

    if ($q) {
        echo "success";
    } else {
        echo "failed";
    }

    echo mysqli_error($conn);
}
if (isset($_POST['actualizarRequiereFacturaRed'])) {
    $idSolicitudRed = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idSolicitudRed'])));

    $r = mysqli_query($conn, "UPDATE `solicitudes` SET requiereFactura = 0 WHERE id = '$idSolicitudRed'");

    if ($r) {

        echo "success";
    } else {

        echo "failed";
    }

    echo mysqli_error($conn);
}
/**
 * GUARDAR LOS DATOS DE FACTURACION
 */
if (isset($_POST['datosFacturacion'])) {

    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));
    $rfc = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['rfc'])));
    $razonSocial = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['razonSocial'])));
    $dirFiscal = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['dirFiscal'])));
    $cp = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['cp'])));
    $correoEnvio = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['correoEnvio'])));
    $cfdi = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['cfdi'])));

    $q = mysqli_query($conn, "insert into `datosfacturacion` (`idCliente`,`rfc`,`razonSocial`,`direccionFiscal`, `codigoPostal`, `correo`, `usoCfdi`) values ('$idCliente','$rfc','$razonSocial','$dirFiscal','$cp','$correoEnvio','$cfdi')");
    if ($q) {
        echo "success";
    } else {
        echo "failed";
    }

    echo mysqli_error($conn);
}
/**
 * EDITAR DATOS DE FACTURACION
 */
if (isset($_POST['actualizarDatosFacturacion'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));
    $editarRfc = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarRfc'])));
    $editarRazonSocial = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarRazonSocial'])));
    $editarDirFiscal = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarDirFiscal'])));
    $editarCp = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarCp'])));
    $editarCorreoEnvio = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarCorreoEnvio'])));
    $editarCfdi = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarCfdi'])));

    $q = mysqli_query($conn, "UPDATE `datosfacturacion` SET `rfc` = '$editarRfc', `razonSocial` = '$editarRazonSocial', `direccionFiscal` = '$editarDirFiscal', `codigoPostal` = '$editarCp', `correo` = '$editarCorreoEnvio', `usoCfdi` = '$editarCfdi' WHERE idCliente = '$idCliente'");

    if ($q) {
        echo "success";
    } else {
        echo "failed";
    }
}
/**
 * VALIDAR SI EXISTEN LOS DATOS DE FACTURACION DEL CLIENTE
 */
if (isset($_POST['validarExiste'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $r = mysqli_query($conn, "SELECT COUNT(id) as existe FROM datosfacturacion WHERE idCliente ='$idCliente' ");

    if (mysqli_num_rows($r) != 0) {
        $data = array();
        while ($m = $r->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }

    echo mysqli_error($conn);
}
/**
 * MOSTAR DATOS PARA FACTURACION
 */
if (isset($_POST['listarDatosFacturacion'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $listarDatosFacturacion = mysqli_query($conn, "SELECT D.*,Us.descripcion FROM datosfacturacion as D INNER JOIN usocfdi as Us ON D.usoCfdi = Us.id where idCliente = '$idCliente'");

    if (mysqli_num_rows($listarDatosFacturacion) != 0) {
        $data = array();
        while ($m = $listarDatosFacturacion->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/**
 * MOSTRAR DATOS DE USO DE CFDI
 */
if (isset($_POST['listarUsoCfdi'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $verCfdi = mysqli_query($conn, "SELECT U.* FROM usocfdi as U INNER JOIN user as Us on Us.id = '$idCliente'");

    if (mysqli_num_rows($verCfdi) != 0) {
        $data = array();
        while ($m = $verCfdi->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
//LOGIN
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['password'])));
    $passwordEncrypt = $encriptar($password);
    $datos = mysqli_query($conn, "select * from `user` where `email`='$email' and `password`='$passwordEncrypt'");
    $login = mysqli_num_rows(mysqli_query($conn, "select * from `user` where `email`='$email' and `password`='$passwordEncrypt'"));
    if ($login != 0) {

        while ($fila = mysqli_fetch_array($datos)) {

            $datosUsuario = array('idCliente' => $fila["id"], 'nombreCompleto' => $fila["nombreCompleto"], 'taller' => $fila["taller"], 'telefono' => $fila["telefono"], 'celular' => $fila["celular"], 'direccion' => $fila["direccion"]);
            echo json_encode($datosUsuario);
        }
    } else {
        echo "fail";
    }
}

//CAMBIAR CONTRASEÑA
if (isset($_POST['change_password'])) {
    $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
    $old_password = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['old_password'])));
    $oldPasswordEncrypt = $encriptar($old_password);
    $new_password = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['new_password'])));
    $passwordEncrypt = $encriptar($new_password);
    $check = mysqli_num_rows(mysqli_query($conn, "select * from `user` where `email`='$email' and `password`='$oldPasswordEncrypt'"));
    if ($check != 0) {
        mysqli_query($conn, "update `user` set `password`='$passwordEncrypt' where `email`='$email'");
        echo "success";
    } else {
        echo "incorrect";
    }
}
//LISTAR SOLICITUDES REALIZADAS
if (isset($_POST['listarSolicitudes'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));


    $listarSolicitudes = mysqli_query($conn, "select id,sucursal,horaSolicitud,motoEnCamino,enProceso,motoEnCaminoRegreso,concluido,observaciones,listaProductos,rutaSolicitud, requiereFactura from `solicitudes` where `idCliente`='$idCliente' ORDER BY horaSolicitud desc");

    if (mysqli_num_rows($listarSolicitudes) != 0) {
        $data = array();
        while ($r = $listarSolicitudes->fetch_assoc()) {
            $data[] = $r;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
//LISTAR PROMOCIONES
if (isset($_POST['listarPromociones'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));


    $listarPromociones = mysqli_query($conn, "select * from promociones where activa = 1");

    if (mysqli_num_rows($listarPromociones) != 0) {
        $data = array();
        while ($r = $listarPromociones->fetch_assoc()) {
            $data[] = $r;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
//VER STATUS
if (isset($_POST['verLista'])) {
    $idSolicitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idSolicitud'])));


    $verStatusSolicitud = mysqli_query($conn, "select horaSolicitud,motoEnCamino,IFNULL(enCaminoFecha, '0000-00-00 00:00:00') as enCaminoFecha,enProceso,IFNULL(enProcesoFecha, '0000-00-00 00:00:00') as enProcesoFecha,motoEnCaminoRegreso,IFNULL(regresoFecha, '0000-00-00 00:00:00') as regresoFecha,concluido, IFNULL(horaConcluido, '0000-00-00 00:00:00') as horaConcluido from `solicitudes` where `id`='$idSolicitud'");

    if (mysqli_num_rows($verStatusSolicitud) != 0) {

        while ($fila = mysqli_fetch_array($verStatusSolicitud)) {

            $verEstatus = array('horaSolicitud' => $fila["horaSolicitud"], 'motoEnCamino' => $fila["motoEnCamino"], 'motoEnCaminoFecha' => $fila["enCaminoFecha"], 'enProceso' => $fila["enProceso"], 'enProcesoFecha' => $fila["enProcesoFecha"], 'motoEnCaminoRegreso' => $fila["motoEnCaminoRegreso"], 'regresoFecha' => $fila["regresoFecha"], 'concluido' => $fila["concluido"], 'horaConcluido' => $fila["horaConcluido"]);
            echo json_encode($verEstatus);
        }
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
//VER RECIBO DE PRODUCTOS
if (isset($_POST['verReciboProductos'])) {
    $idSolicitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idSolicitud'])));


    $verStatusSolicitud = mysqli_query($conn, "select rutaSolicitud from `solicitudes` where `id`='$idSolicitud'");

    if (mysqli_num_rows($verStatusSolicitud) != 0) {

        while ($fila = mysqli_fetch_array($verStatusSolicitud)) {

            $data = array('rutaSolicitud' => $fila["rutaSolicitud"]);
            echo json_encode($data);
        }
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
//LISTAR MARCAS
if (isset($_POST['listarMarcas'])) {
    //$idMarca = mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idMarca'])));
    $listarMarcas = mysqli_query($conn, "select * from categoriasmarca");
    if (mysqli_num_rows($listarMarcas) != 0) {
        $data = array();
        while ($m = $listarMarcas->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*===========================
LISTAR SUBCATEGORIAS MARCAS
=============================*/
if (isset($_POST['listarSubcategoria'])) {
    $idMarcas = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idMarca'])));
    $listarSubcategoria = mysqli_query($conn, "SELECT * ,m.nombre FROM subcategoriamarca s, categoriasmarca m WHERE s.idMarca = '$idMarcas' and s.idMarca = m.idMarca");
    if (mysqli_num_rows($listarSubcategoria) != 0) {
        $data = array();
        while ($m = $listarSubcategoria->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*===========================
LISTAR PRODUCTOS
=============================*/
if (isset($_POST['listarProductos'])) {
    $idSubcategoria = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idSubcategoria'])));
    $listarProductos = mysqli_query($conn, "SELECT id, descripcion FROM  subcategoriadesglose WHERE idSubcategoria = '$idSubcategoria'");

    if (mysqli_num_rows($listarProductos) != 0) {
        $data = array();
        while ($m = $listarProductos->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*===========================
LISTAR PRODUCTOS DESGLOSE
=============================*/
if (isset($_POST['listarProductosDesglose'])) {
    $idDesglose = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idDesglose'])));
    $marca = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['marca'])));
    $listarProductosDesglose = mysqli_query($conn, "SELECT id, descripcion FROM  subcategoriasubdesglose WHERE idDesglose = '$idDesglose' and marca != '$marca'");

    if (mysqli_num_rows($listarProductosDesglose) != 0) {
        $data = array();
        while ($m = $listarProductosDesglose->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*===========================
LISTAR PRODUCTOS SUBDESGLOSE
=============================*/
if (isset($_POST['listarProductosSubDesglose'])) {
    $idSubcategoriaDesglose = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idSubcategoriaDesglose'])));
    $listarProductosSubDesglose = mysqli_query($conn, "SELECT id, descripcion,codigo FROM  productoscatalogo WHERE idSubcategoriaDesglose = '$idSubcategoriaDesglose'");

    if (mysqli_num_rows($listarProductosSubDesglose) != 0) {
        $data = array();
        while ($m = $listarProductosSubDesglose->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*
if(isset($_POST['listarProductos'])){
	$idSubcategoria = mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idSubcategoria'])));
	$listarProductos = mysqli_query($conn, "SELECT s.id, s.descripcion,ROUND(s.precio,2) as precio, s.rutaFotoProducto, s.idSubcategoria, m.nombreSubcategoria FROM productoscatalogo s, subcategoriamarca m WHERE s.idSubcategoria = '$idSubcategoria' and s.idSubcategoria = m.idSubcategoria");
	if(mysqli_num_rows($listarProductos) != 0){
		$data = array();
		while ($m = $listarProductos->fetch_assoc()) {
		    $data[] = $m;
		}
		echo json_encode($data);
	}else {
		echo 'failed';
	} 
	echo mysqli_error($conn);
}
*/
/*===========================
MOSTRAR PRODUCTO DESGLOSE
=============================*/
if (isset($_POST['mostrarProductoFinal'])) {
    $idProductoDesglose = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProductoDesglose'])));
    $mostrarProducto = mysqli_query($conn, "SELECT * FROM  productoscatalogo WHERE id = '$idProductoDesglose'");

    if (mysqli_num_rows($mostrarProducto) != 0) {
        $data = array();
        while ($m = $mostrarProducto->fetch_assoc()) {
            $data[] = $m;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*===========================
AGREGAR FAVORITOS
=============================*/
if (isset($_POST['addFavoritos'])) {
    $idProducto = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProducto'])));
    $codigoProducto = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['codigoProducto'])));
    $precioElegido = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['precioElegido'])));
    $unidadElegida = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['unidadElegida'])));
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $buscar = mysqli_query($conn, "SELECT * FROM favoritos where idProducto = '$idProducto' and idCliente = '$idCliente'");

    if (mysqli_num_rows($buscar) != 0) {

        echo 'exist';
    } else {

        $q = mysqli_query($conn, "insert into `favoritos` (`idProducto`,`idCliente`,`codigoProducto`,`precioProducto`,`unidadElegida`) values ('$idProducto','$idCliente','$codigoProducto','$precioElegido','$unidadElegida')");

        $f = mysqli_query($conn, "UPDATE `masvendido` SET favorito = 1 WHERE idMvendido = '$idProducto'");

        if ($q) {
            echo "success";
        } else {
            echo "failed";
        }
    }


    echo mysqli_error($conn);
}
//LISTAR MIS FAVORITOS
if (isset($_POST['listarFavoritos'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $listarSolicitudes = mysqli_query($conn, "SELECT p.idMvendido, f.idProducto, f.id as idFavorito,f.codigoProducto,f.precioProducto,f.unidadElegida,p.valorMedida,p.descripcion, p.foto, p.descuento FROM masvendido p, favoritos f WHERE p.codigoProducto = f.codigoProducto and f.idCliente = '$idCliente'  GROUP by f.idProducto, p.idMvendido, f.id ,f.codigoProducto,f.precioProducto,f.unidadElegida,p.descripcion");


    /**
     * $listarSolicitudes=mysqli_query($conn,"SELECT p.idMvendido, f.idProducto, f.id as idFavorito,f.codigoProducto,f.precioProducto,f.unidadElegida,p.descripcion, p.foto FROM masvendido p, favoritos f, productos pr WHERE p.codigoProducto = f.codigoProducto and f.idCliente = '$idCliente' and f.codigoProducto = SUBSTRING_INDEX(pr.codigo, '.', 1) and p.codigoProducto=SUBSTRING_INDEX(pr.codigo, '.',1) GROUP by f.idProducto, p.idMvendido, f.id ,f.codigoProducto,f.precioProducto,f.unidadElegida,p.descripcion");
     * CONSULTA ANTERIOR Y QUE TAMBIEN ESTABA FUNCIONANDO
     * $listarSolicitudes=mysqli_query($conn,"SELECT p.id, f.idProducto, f.id as idFavorito,f.codigoProducto,f.precioProducto,f.unidadElegida,pr.descripcion FROM productoscatalogo p, favoritos f, productos pr WHERE p.id = f.idProducto and `idCliente`= '$idCliente' and f.codigoProducto = SUBSTRING_INDEX(pr.codigo, '.', 1) and p.codigo=SUBSTRING_INDEX(pr.codigo, '.',1) GROUP by f.idProducto, p.id, f.id ,f.codigoProducto,f.precioProducto,f.unidadElegida,pr.descripcion");
     * 
     */


    if (mysqli_num_rows($listarSolicitudes) != 0) {
        $data = array();
        while ($r = $listarSolicitudes->fetch_assoc()) {
            $data[] = $r;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/*===========================
ELIMINAR DE MIS FAVORITOS
=============================*/
if (isset($_POST['deleteFavoritos'])) {
    $idProducto = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProducto'])));
    $idProductoF = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProductoF'])));
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $q = mysqli_query($conn, "DELETE from favoritos where id = '$idProducto' and idCliente = '$idCliente'");
    $f = mysqli_query($conn, "UPDATE `masvendido` SET favorito = 0 WHERE idMvendido = '$idProductoF'");

    if ($q) {
        echo "success";
    } else {
        echo "failed";
    }

    echo mysqli_error($conn);
}
/**
 * QUITAR FAVORITOS CON BOTON CORAZON RED
 */
if (isset($_POST['deleteFavoritosRed'])) {
    //$idProducto =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idProducto'])));
    $idProductoF = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProductoF'])));
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $q = mysqli_query($conn, "DELETE from favoritos where idProducto = '$idProductoF' and idCliente = '$idCliente'");
    $f = mysqli_query($conn, "UPDATE `masvendido` SET favorito = 0 WHERE idMvendido = '$idProductoF'");

    if ($q) {
        echo "success";
    } else {
        echo "failed";
    }

    echo mysqli_error($conn);
}
/**
 * ACTUALIZAR CAMPO BUSCADO EN LA TABLA DE LOS PRODUCTOS MAS VENDIDOS
 */
if (isset($_POST['actualizarBuscado'])) {
    //$idProducto =mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idProducto'])));
    $idProducto = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProducto'])));
    //$idCliente=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['idCliente'])));

    //$q=mysqli_query($conn,"DELETE from favoritos where idProducto = '$idProductoF' and idCliente = '$idCliente'");
    $f = mysqli_query($conn, "UPDATE `masvendido` SET buscado = buscado+1 WHERE idMvendido = '$idProducto'");

    if ($f) {
        echo "success";
    } else {
        echo "failed";
    }

    echo mysqli_error($conn);
}
/**
 * VER LO MAS VENDIDO
 */
if (isset($_POST['listarMasVendido'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $listarMasV = mysqli_query($conn, "SELECT M.*, Us.id, F.idProducto, F.idCliente FROM masvendido as M LEFT OUTER JOIN favoritos as F on M.idMvendido = F.idProducto LEFT OUTER JOIN user as Us on F.idCliente = Us.id");


    if (mysqli_num_rows($listarMasV) != 0) {
        $data = array();
        while ($r = $listarMasV->fetch_assoc()) {

            $data[] = $r;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/**
 * MOSTRAR LO MAS BUSCADO
 */
if (isset($_POST['listarMasBuscado'])) {
    $idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

    $listarMasBus = mysqli_query($conn, "SELECT M.*,F.idCliente FROM masvendido as M LEFT OUTER JOIN favoritos as F on M.idMvendido = F.idProducto LEFT OUTER JOIN user as Us on F.idCliente = Us.id WHERE M.buscado >= 5  LIMIT 10");

    if (mysqli_num_rows($listarMasBus) != 0) {
        $data = array();
        while ($r = $listarMasBus->fetch_assoc()) {
            $data[] = $r;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/**************BUSCADOR DE PRODUCTOS**************************/
if (isset($_POST['listarResultadosBusqueda'])) {
    $search = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['search'])));

    $listarResultadosBusqueda = mysqli_query($conn, "SELECT * FROM masvendido WHERE codigoProducto = '%$search%' || marca LIKE '%$search%' || descripcion LIKE '%$search%'");

    if (mysqli_num_rows($listarResultadosBusqueda) != 0) {
        $data = array();
        while ($r = $listarResultadosBusqueda->fetch_assoc()) {
            $data[] = $r;
        }
        echo json_encode($data);
    } else {
        echo 'failed';
    }
    echo mysqli_error($conn);
}
/**************BUSCADOR DE PRODUCTOS*************************/
// OLVIDO DE PASSWORD
if (isset($_POST['forget_password'])) {
    $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
    $q = mysqli_query($conn, "select * from `user` where `email`='$email'");
    $check = mysqli_num_rows($q);
    if ($check != 0) {
        echo "success";
        $data = mysqli_fetch_array($q);

        $string = "Hola su contraseña es " . "<strong>" . $desencriptar($data['password']) . "</strong>";

        // Create the email and send the message
        $to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - Aquí es donde el formulario enviará un mensaje a.
        $email_subject = "Recuperación de Contraseña: DEKKERAPP";
        $email_body = $string;
        $headers = "From:dekkerapp@sanfranciscodekkerlab.com\n";
        $headers .= "MIME-Version: 1.0r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $rcss = "extensiones/plantilla/estilo.css"; //ruta de archivo css
        $fcss = fopen($rcss, "r"); //abrir archivo css
        $scss = fread($fcss, filesize($rcss)); //leer contenido de css
        fclose($fcss); //cerrar archivo css

        //reemplazar sección de plantilla html con el css cargado y mensaje creado
        $shtml = file_get_contents('extensiones/plantilla/recuperacionContrasena.html');
        $incss  = str_replace('<style id="estilo"></style>', "<style>$scss</style>", $shtml);
        $cuerpo = str_replace('<p id="mensaje"></p>', $email_body, $incss);
        mail($to, $email_subject, $cuerpo, $headers);


        echo "success";
    } else {

        echo "invalid";
    }
}
// ENVIO DE FORMULARIO DE CONTACTO
if (isset($_POST['formContact'])) {

    if (isset($_POST['formContact'])) {

        $nombreApellidos = $_POST['nameApellidos'];
        $emailContacto = $_POST['emailContacto'];
        $comentariosContacto = $_POST['comentariosContacto'];
        $string = "<br> Usuario:" . $nombreApellidos . " <br>Correo de Contacto: " . $emailContacto . "<br>Mensaje:  " . $comentariosContacto;

        set_time_limit(0);
        ignore_user_abort(true);
        /*RECOGER VALORES ENVIADOS DESDE INDEX.PHP*/
        $email = "mm_marco_mar@hotmail.com";
        $sDestino = $email;
        // Create the email and send the message
        $to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - Aquí es donde el formulario enviará un mensaje a.
        $email_subject = "Mensaje de Contacto: DEKKERAPP";
        $email_body = $string;
        $headers = "From:dekkerapp@sanfranciscodekkerlab.com\n";
        $headers .= "MIME-Version: 1.0r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $rcss = "extensiones/plantilla/estilo.css"; //ruta de archivo css
        $fcss = fopen($rcss, "r"); //abrir archivo css
        $scss = fread($fcss, filesize($rcss)); //leer contenido de css
        fclose($fcss); //cerrar archivo css

        //reemplazar sección de plantilla html con el css cargado y mensaje creado
        $shtml = file_get_contents('extensiones/plantilla/contacto.html');
        $incss  = str_replace('<style id="estilo"></style>', "<style>$scss</style>", $shtml);
        $cuerpo = str_replace('<p id="mensaje"></p>', $email_body, $incss);
        mail($to, $email_subject, $cuerpo, $headers);


        echo "success";
    }
}

//LISTAR ESTADOS Y MUNICIPIOS
if (isset($_POST["estados"])) {
    // Capture selected country
    $country = $_POST["estados"];

    // Define country and city array     
    $countryArr = array(
        "Mexico" => array("Selecciona tu estado", "Aguascalientes", "Baja California", "Baja
California Sur", "Campeche", "Chiapas", "Chihuahua", "Coahuila", "Colima", "Distrito Federal", "Durango", "México", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San
Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas")
    );


    foreach ($countryArr[$country] as $value) {
        echo "<option>" . $value . "</option>";
    }
}

if (isset($_POST["municipios"])) {
    // Capture selected country
    $municipios = $_POST["municipios"];

    // Define country and city array
    $municipiosARR = array(
        "Aguascalientes" => array(
            "Selecciona tu municipio", "Aguascalientes", "Asientos", "Calvillo", "Cosío",
            "Jesús María", "Pabellón de Arteaga", "Rincón de Romos", "San José de Gracia", "Tepezalá", "El Llano",
            "San Francisco de los Romo"
        ),
        "Baja California" => array("Selecciona tu municipio", "Ensenada", "Mexicali", "Tecate", "Tijuana", "Playas de Rosarito"),
        "Baja California Sur" => array("Selecciona tu municipio", "Comondú", "Mulegé", "La Paz", "Los Cabos", "Loreto"),
        "Campeche" => array("Selecciona tu municipio", "Calkiní", "Campeche", "Carmen", "Champotón", "Hecelchakán", "Hopelchén", "Palizada", "Tenabo", "Escárcega", "Calakmul", "Candelaria"),
        "Chiapas" => array(
            "Selecciona tu municipio", "Acacoyagua",
            "Osumacinta",
            "Acala",
            "Oxchuc",
            "Acapetahua",
            "Palenque",
            "Altamirano",
            "Pantelhó",
            "Amatán",
            "Pantepec",
            "Amatenango de la Frontera",
            "Pichucalco",
            "Amatenango del Valle",
            "Pijijiapan",
            "Ángel Albino Corzo",
            "El Porvenir",
            "Arriaga",
            "Villa Comaltitlán",
            "Bejucal de Ocampo",
            "Pueblo Nuevo Solistahuacán",
            "Bella Vista",
            "Rayón",
            "Berriozábal",
            "Reforma",
            "Bochil",
            "Las Rosas",
            "El Bosque",
            "Sabanilla",
            "Cacahoatán",
            "Salto de Agua",
            "Catazajá",
            "San Cristóbal de las Casas",
            "Cintalapa",
            "San Fernando",
            "Coapilla",
            "Siltepec",
            "Comitán de Domínguez",
            "Simojovel",
            "La Concordia",
            "Sitalá",
            "Copainalá",
            "Socoltenango",
            "Chalchihuitán",
            "Solosuchiapa",
            "Chamula",
            "Soyaló",
            "Chanal",
            "Suchiapa",
            "Chapultenango",
            "Ciudad Hidalgo",
            "Chenalhó",
            "Sunuapa",
            "Chiapa de Corzo",
            "Tapachula",
            "Chiapilla",
            "Tapalapa",
            "Chicoasén",
            "Tapilula",
            "Chicomuselo",
            "Tecpatán",
            "Chilón",
            "Tenejapa",
            "Escuintla",
            "Teopisca",
            "Francisco León",
            "Frontera Comalapa",
            "Tila",
            "Frontera Hidalgo",
            "Tonalá",
            "La Grandeza",
            "Totolapa",
            "Huehuetán",
            "La Trinitaria",
            "Huixtán",
            "Tumbalá",
            "Huitiupán",
            "Tuxtla Gutiérrez",
            "Huixtla",
            "Tuxtla Chico",
            "La Independencia",
            "Tuzantán",
            "Ixhuatán",
            "Tzimol",
            "Ixtacomitán",
            "Unión Juárez",
            "Ixtapa",
            "Venustiano Carranza",
            "Ixtapangajoya",
            "Ciudad de Villa Corzo",
            "Jiquipilas",
            "Villaflores",
            "Jitotol",
            "Yajalón",
            "Juárez",
            "San Lucas",
            "Larráinzar",
            "Zinacantán",
            "La Libertad",
            "San Juan Cancuc",
            "Mapastepec",
            "Aldama",
            "Las Margaritas",
            "Benemérito de las Américas",
            "Mazapa de Madero",
            "Maravilla Tenejapa",
            "Mazatán",
            "Marqués de Comillas",
            "Metapa",
            "Montecristo de Guerrero",
            "Mitontic",
            "San Andrés Duraznal",
            "Motozintla",
            "Santiago el Pinar",
            "Nicolás Ruíz",
            "Belisario Domínguez",
            "Ocosingo",
            "Emiliano Zapata",
            "Ocotepec",
            "El Parral",
            "Ocozocoautla de Espinosa",
            "Mezcalapa",
            "Ostuacán"
        ),
        "Chihuahua" => array(
            "Selecciona tu municipio",
            "Ahumada",
            "Aldama",
            "Allende",
            "Aquiles Serdán",
            "Ascensión",
            "Bachíniva",
            "Balleza",
            "Batopilas",
            "Bocoyna",
            "Buenaventura",
            "Camargo",
            "Carichí",
            "Casas Grandes",
            "Coronado",
            "Coyame del Sotol",
            "La Cruz",
            "Cuauhtémoc",
            "Cusihuiriachi",
            "Chihuahua",
            "Chínipas",
            "Delicias",
            "Dr. Belisario Domínguez",
            "Galeana",
            "Santa Isabel",
            "Gómez Farías",
            "Gran Morelos",
            "Guadalupe",
            "Guadalupe y Calvo",
            "Guazapares",
            "Guerrero",
            "Hidalgo del Parral",
            "Huejotitán",
            "Ignacio Zaragoza",
            "Janos",
            "Jiménez",
            "Juárez",
            "Julimes",
            "Octaviano López",
            "Madera",
            "Maguarichi",
            "Manuel Benavides",
            "Matachí",
            "Matamoros",
            "Meoqui",
            "Morelos",
            "Moris",
            "Namiquipa",
            "Nonoava",
            "Nuevo Casas Grandes",
            "Ocampo",
            "Ojinaga",
            "Práxedis G. Guerrero",
            "San Andrés",
            "Rosales",
            "Rosario",
            "San Francisco de Borja",
            "San Francisco de Conchos",
            "San Francisco del Oro",
            "Santa Bárbara",
            "Satevó",
            "Saucillo",
            "Temósachi",
            "El Tule",
            "Urique",
            "Uruachi",
            "Valle de Zaragoza"
        ),
        "Coahuila" => array(
            "Selecciona tu municipio",
            "Abasolo",
            "Acuña",
            "Allende",
            "Arteaga",
            "Candela",
            "Castaños",
            "Cuatrociénegas",
            "Escobedo",
            "Francisco I. Madero",
            "Frontera",
            "General Cepeda",
            "Guerrero",
            "Hidalgo",
            "Jiménez",
            "Juárez",
            "Lamadrid",
            "Matamoros",
            "Monclova",
            "Morelos",
            "Múzquiz",
            "Nadadores",
            "Nava",
            "Ocampo",
            "Parras",
            "Piedras Negras",
            "Progreso",
            "Ramos Arizpe",
            "Sabinas",
            "Sacramento",
            "Saltillo",
            "San Buenaventura",
            "San Juan de Sabinas",
            "San Pedro",
            "Sierra Mojada",
            "Torreón",
            "Viesca",
            "Villa Unión",
            "Zaragoza",
            "Ignacio Zaragoza"
        ),
        "Colima" => array(
            "Selecciona tu municipio",
            "Armería",
            "Ixtlahuacán",
            "Colima",
            "Manzanillo",
            "Comala",
            "Minatitlán",
            "Coquimatlán",
            "Tecomán",
            "Cuauhtémoc",
            "Villa de Álvarez"
        ),
        "Durango" => array(
            "Selecciona tu municipio",
            "Canatlán",
            "Peñón Blanco",
            "Canelas",
            "Ciudad Villa Unión",
            "Coneto de Comonfort",
            "El Salto",
            "Cuencamé",
            "Rodeo",
            "Durango",
            "San Bernardo",
            "General Simón Bolívar",
            "San Dimas",
            "Gómez Palacio",
            "San Juan de Guadalupe",
            "Guadalupe Victoria",
            "San Juan del Río",
            "Guanaceví",
            "San Luis del Cordero",
            "Hidalgo",
            "San Pedro del Gallo",
            "Indé",
            "Santa Clara",
            "Lerdo",
            "Santiago Papasquiaro",
            "Mapimí",
            "Súchil",
            "Mezquital",
            "Tamazula",
            "Nazas",
            "Santa Catarina de Tepehuanes",
            "Nombre de Dios",
            "Tlahualilo",
            "Ocampo",
            "Topia",
            "El Oro",
            "Santa María de Otáez",
            "Nuevo Ideal",
            "Pánuco de Coronado"
        ),
        "Distrito Federal" => array(
            "Selecciona tu municipio",
            "Álvaro Obregón",
            "Azcapotzalco",
            "Benito Juárez",
            "Coyoacán",
            "Cuajimalpa de Morelos",
            "Cuauhtémoc",
            "Gustavo A. Madero",
            "Iztacalco",
            "Iztapalapa",
            "La Magdalena Contreras",
            "Miguel Hidalgo",
            "Milpa Alta",
            "Tláhuac",
            "Tlalpan",
            "Venustiano Carranza",
            "Xochimilco"
        ),
        "Guanajuato" => array(
            "Selecciona tu municipio",
            "Abasolo",
            "Acámbaro",
            "San Miguel de Allende",
            "Apaseo el Alto",
            "Apaseo el Grande",
            "Atarjea",
            "Celaya",
            "Manuel Doblado",
            "Comonfort",
            "Coroneo",
            "Cortazar",
            "Cuerámaro",
            "Cuerámaro",
            "Doctor Mora",
            "Dolores Hidalgo Cuna de la Independencia Nacional",
            "Guanajuato",
            "Huanímaro",
            "Irapuato",
            "Jaral del Progreso",
            "Jerécuaro",
            "León",
            "Moroleón",
            "Ocampo",
            "Pénjamo",
            "Pueblo Nuevo",
            "Purísima del Rincón",
            "Romita",
            "Salamanca",
            "Salvatierra",
            "San Diego de la Unión",
            "San Felipe",
            "San Francisco del Rincón",
            "San José Iturbide",
            "San Luis de la Paz",
            "Santa Catarina",
            "Santa Cruz de Juventino Rosas",
            "Santiago Maravatío",
            "Silao de la Victoria",
            "Tarandacuao",
            "Tarimoro",
            "Tierra Blanca",
            "Uriangato",
            "Valle de Santiago",
            "Victoria",
            "Villagrán",
            "Xichú",
            "Yuriria"
        ),
        "Guerrero" => array(
            "Selecciona tu municipio",
            "Acapulco de Juárez",
            "Ahuacuotzingo",
            "Ajuchitlán del Progreso",
            "Alcozauca de Guerrero",
            "Alpoyeca",
            "Ciudad Apaxtla de Castrejón",
            "Arcelia",
            "Atenango del Río",
            "Atlamajalcingo del Monte",
            "Atlixtac",
            "Atoyac de Álvarez",
            "Ayutla de los Libres",
            "Azoyú",
            "Benito Juárez",
            "Buenavista de Cuéllar",
            "Coahuayutla de José María Izazaga",
            "Cocula",
            "Copala",
            "Copalillo",
            "Copanatoyac",
            "Coyuca de Benítez",
            "Coyuca de Catalán",
            "Cuajinicuilapa",
            "Cualác",
            "Cuautepec",
            "Cuetzala del Progreso",
            "Cutzamala de Pinzón",
            "Chilapa de Álvarez",
            "Chilpancingo de los Bravo",
            "Florencio Villarreal",
            "General Canuto A. Neri",
            "General Heliodoro Castillo",
            "Huamuxtitlán",
            "Huitzuco de los Figueroa",
            "Iguala de la Independencia",
            "Igualapa",
            "Ixcateopan de Cuauhtémoc",
            "Zihuatanejo de Azueta",
            "Juan R. Escudero",
            "Leonardo Bravo",
            "Malinaltepec",
            "Mártir de Cuilapan",
            "Metlatónoc",
            "Mochitlán",
            "Olinalá",
            "Ometepec",
            "Pedro Ascencio Alquisiras",
            "Petatlán",
            "Pilcaya",
            "Pungarabato",
            "Quechultenango",
            "San Luis Acatlán",
            "San Marcos",
            "San Miguel Totolapan",
            "Taxco de Alarcón",
            "Tecoanapa",
            "Técpan de Galeana",
            "Teloloapan",
            "Tepecoacuilco de Trujano",
            "Tetipac",
            "Tixtla de Guerrero",
            "Tlacoachistlahuaca",
            "Tlacoapa",
            "Tlalchapa",
            "Tlalixtaquilla de Maldonado",
            "Tlapa de Comonfort",
            "Tlapehuala",
            "La Unión de Isidoro Montes de Oca",
            "Xalpatláhuac",
            "Xochihuehuetlán",
            "Xochistlahuaca",
            "Zapotitlán Tablas",
            "Zirándaro de los Chávez",
            "Zitlala",
            "Eduardo Neri",
            "Acatepec",
            "Marquelia",
            "Cochoapa el Grande",
            "José Joaquín de Herrera",
            "Juchitán",
            "Iliatenco"
        ),
        "Hidalgo" => array(
            "Selecciona tu municipio",
            "Acatlán",
            "Acaxochitlán",
            "Actopan",
            "Agua Blanca de Iturbide",
            "Ajacuba",
            "Alfajayucan",
            "Almoloya",
            "Apan",
            "El Arenal",
            "Atitalaquia",
            "Atlapexco",
            "Atotonilco el Grande",
            "Atotonilco de Tula",
            "Calnali",
            "Cardonal",
            "Cuautepec de Hinojosa",
            "Chapantongo",
            "Chapulhuacán",
            "Chilcuautla",
            "Eloxochitlán",
            "Emiliano Zapata",
            "Epazoyucan",
            "Franciso I. Madero",
            "Huasca de Ocampo",
            "Huautla",
            "Huazalingo",
            "Huehuetla",
            "Huejutla de Reyes",
            "Huichapan",
            "Ixmiquilpan",
            "Jacala de Ledezma",
            "Jaltocán",
            "Juárez Hidalgo",
            "Lolotla",
            "Metepec",
            "San Agustín Metzquititlán",
            "Metztitlán",
            "Mineral del Chico",
            "Mineral del Monte",
            "La Misión",
            "Mixquiahuala de Juárez",
            "Molango de Escamilla",
            "Nicolás Flores",
            "Nopala de Villagrán",
            "Omitlán de Juárez",
            "San Felipe Orizatlán",
            "Pacula",
            "Pachuca de Soto",
            "Pisaflores",
            "Progreso de Obregón",
            "Mineral de la Reforma",
            "San Agustín Tlaxiaca",
            "San Bartolo Tutotepec",
            "San Salvador",
            "Santiago de Anaya",
            "Santiago Tulantepec de Lugo Guerrero",
            "Singuilucan",
            "Tasquillo",
            "Tecozautla",
            "Tenango de Doria",
            "Tepeapulco",
            "Tepehuacán de Guerrero",
            "Tepeji del Río de Ocampo",
            "Tepetitlán",
            "Tetepango",
            "Villa de Tezontepec",
            "Tezontepec de Aldama",
            "Tianguistengo",
            "Tizayuca",
            "Tlahuelilpan",
            "Tlahuiltepa",
            "Tlanalapa",
            "Tlanchinol",
            "Tlaxcoapan",
            "Tolcayuca",
            "Tula de Allende",
            "Tulancingo de Bravo",
            "Xochiatipan",
            "Xochicoatlán",
            "Yahualica",
            "Zacualtipán de Ángeles",
            "Zapotlán de Juárez",
            "Zempoala",
            "Zimapán",
        ),
        "Jalisco" => array(
            "Selecciona tu municipio",
            "Acatic",
            "Acatlán de Juárez",
            "Ahualulco de Mercado",
            "Amacueca",
            "Amatitán",
            "Ameca",
            "San Juanito de Escobedo",
            "Arandas",
            "El Arenal",
            "Atemajac de Brizuela",
            "Atengo",
            "Atenguillo",
            "Atotonilco el Alto",
            "Atoyac",
            "Autlán de Navarro",
            "Ayotlán",
            "Ayutla",
            "La Barca",
            "Bolaños",
            "Cabo Corrientes",
            "Casimiro Castillo",
            "Cihuatlán",
            "Zapotlán el Grande",
            "Cocula",
            "Colotlán",
            "Concepción de Buenos Aires",
            "Cuautitlán de García Barragán",
            "Cuautla",
            "Cuquío",
            "Chapala",
            "Chimaltitán",
            "Chiquilistlán",
            "Degollado",
            "Ejutla",
            "Encarnación de Díaz",
            "Etzatlán",
            "El Grullo",
            "Guachinango",
            "Guadalajara",
            "Hostotipaquillo",
            "Huejúcar",
            "Huejuquilla el Alto",
            "La Huerta",
            "Ixtlahuacán de los Membrillos",
            "Ixtlahuacán del Río",
            "Jalostotitlán",
            "Jamay",
            "Jesús María",
            "Jilotlán de los Dolores",
            "Jocotepec",
            "Juanacatlán",
            "Juchitlán",
            "Lagos de Moreno",
            "El Limón",
            "Magdalena",
            "Santa María del Oro",
            "La Manzanilla de la Paz",
            "Mascota",
            "Mazamitla",
            "Mexticacán",
            "Mezquitic",
            "Mixtlán",
            "Ocotlán",
            "Ojuelos de Jalisco",
            "Pihuamo",
            "Poncitlán",
            "Puerto Vallarta",
            "Villa Purificación",
            "Quitupan",
            "El Salto",
            "San Cristóbal de la Barranca",
            "San Diego de Alejandría",
            "San Juan de los Lagos",
            "San Julián",
            "San Marcos",
            "San Martín de Bolaños",
            "San Martín Hidalgo",
            "San Miguel el Alto",
            "Gómez Farías",
            "San Sebastián del Oeste",
            "Santa María de los Ángeles",
            "Sayula",
            "Tala",
            "Talpa de Allende",
            "Tamazula de Gordiano",
            "Tapalpa",
            "Tecalitlán",
            "Tecolotlán",
            "Techaluta de Montenegro",
            "Tenamaxtlán",
            "Teocaltiche",
            "Teocuitatlán de Corona",
            "Tepatitlán de Morelos",
            "Tequila",
            "Teuchitlán",
            "Tizapán el Alto",
            "Tlajomulco de Zúñiga",
            "Tlaquepaque",
            "Tolimán",
            "Tomatlán",
            "Tonalá",
            "Tonaya",
            "Tonila",
            "Totatiche",
            "Tototlán",
            "Tuxcacuesco",
            "Tuxcueca",
            "Tuxpan",
            "Unión de San Antonio",
            "Unión de Tula",
            "Valle de Guadalupe",
            "Valle de Juárez",
            "San Gabriel",
            "Villa Corona",
            "Villa Guerrero",
            "Villa Hidalgo",
            "Cañadas de Obregón",
            "Yahualica de González Gallo",
            "Zacoalco de Torres",
            "Zapopan",
            "Zapotiltic",
            "Zapotitlán de Vadillo",
            "Zapotlán del Rey",
            "Zapotlanejo",
            "San Ignacio Cerro Gordo"
        ),
        "México" => array(
            "Selecciona tu municipio",
            "Acambay de Ruiz Castañeda",
            "Acolman",
            "Aculco",
            "Almoloya de Alquisiras",
            "Almoloya de Juárez",
            "Almoloya del Río",
            "Amanalco de Becerra",
            "Amatepec",
            "Amecameca de Juárez",
            "Apaxco de Ocampo",
            "San Salvador Atenco",
            "Atizapán",
            "Atizapán de Zaragoza",
            "Atlacomulco de Fabela",
            "Atlautla",
            "Axapusco",
            "Ayapango de Gabriel Ramos Millán",
            "Calimaya de Díaz González",
            "Capulhuac",
            "Coacalco de Berriozábal",
            "Coatepec Harinas",
            "Cocotitlán",
            "Coyotepec",
            "Cuautitlán",
            "Chalco",
            "Chapa de Mota",
            "Chapultepec",
            "Chiautla",
            "Chicoloapan",
            "Chiconcuac",
            "Chimalhuacán",
            "Donato Guerra",
            "Ecatepec de Morelos",
            "Ecatzingo de Hidalgo",
            "Huehuetoca",
            "Hueypoxtla",
            "Huixquilucan",
            "Isidro Fabela",
            "Ixtapaluca",
            "Ixtapan de la Sal",
            "Ixtapan del Oro",
            "Ixtlahuaca",
            "Xalatlaco",
            "Jaltenco",
            "Jilotepec",
            "Jilotzingo",
            "Jiquipilco",
            "Jocotitlán",
            "Joquicingo",
            "Juchitepec",
            "Lerma",
            "Malinalco",
            "Melchor Ocampo",
            "Metepec",
            "Mexicaltzingo",
            "Morelos",
            "Naucalpan de Juárez",
            "Nezahualcóyotl",
            "Nextlalpan",
            "Nicolás Romero",
            "Nopaltepec",
            "Ocoyoacac",
            "Ocuilan",
            "El Oro",
            "Otumba",
            "Otzoloapan",
            "Otzolotepec",
            "Ozumba",
            "Papalotla",
            "La Paz",
            "Polotitlán",
            "Rayón",
            "San Antonio la Isla",
            "San Felipe del Progreso",
            "San Martín de las Pirámides",
            "San Mateo Atenco",
            "San Simón de Guerrero",
            "Santo Tomás",
            "Soyaniquilpan de Juárez",
            "Sultepec",
            "Tecámac",
            "Tejupilco",
            "Temamatla",
            "Temascalapa",
            "Temascalcingo",
            "Temascaltepec",
            "Temoaya",
            "Tenancingo",
            "Tenango del Aire",
            "Tenango del Valle",
            "Teoloyucan",
            "Teotihuacán",
            "Tepetlaoxtoc",
            "Tepetlixpa",
            "Tepotzotlán",
            "Tequixquiac",
            "Texcaltitlán",
            "Texcalyacac",
            "Texcoco",
            "Tezoyuca",
            "Tianguistenco",
            "Timilpan",
            "Tlalmanalco",
            "Tlalnepantla de Baz",
            "Tlatlaya",
            "Toluca",
            "Tonatico",
            "Tultepec",
            "Tultitlán",
            "Valle de Bravo",
            "Villa de Allende",
            "Villa del Carbón",
            "Villa Guerrero",
            "Villa Victoria",
            "Xonacatlán",
            "Zacazonapan",
            "Zacualpan",
            "Zinacantepec",
            "Zumpahuacán",
            "Zumpango",
            "Cuautitlán Izcalli",
            "Valle de Chalco Solidaridad",
            "Luvianos",
            "San José del Rincón",
            "Tonanitla"
        ),
        "Michoacán" => array(
            "Selecciona tu municipio",
            "Acuitzio",
            "Aguililla",
            "Álvaro Obregón",
            "Angamacutiro",
            "Angangueo",
            "Apatzingán",
            "Aporo",
            "Aquila",
            "Ario",
            "Arteaga",
            "Briseñas",
            "Buenavista",
            "Carácuaro",
            "Coahuayana",
            "Coalcomán de Vázquez Pallares",
            "Coeneo",
            "Contepec",
            "Copándaro",
            "Cotija",
            "Cuitzeo",
            "Charapan",
            "Charo",
            "Chavinda",
            "Cherán",
            "Chilchota",
            "Chinicuila",
            "Chucándiro",
            "Churintzio",
            "Churumuco",
            "Ecuandureo",
            "Epitacio Huerta",
            "Erongarícuaro",
            "Gabriel Zamora",
            "Hidalgo",
            "La Huacana",
            "Huandacareo",
            "Huaniqueo",
            "Huetamo",
            "Huiramba",
            "Indaparapeo",
            "Irimbo",
            "Ixtlán",
            "Jacona",
            "Jiménez",
            "Jiquilpan",
            "Juárez",
            "Jungapeo",
            "Lagunillas",
            "Madero",
            "Maravatío",
            "Marcos Castellanos",
            "Lázaro Cárdenas",
            "Morelia",
            "Morelos",
            "Múgica",
            "Nahuatzen",
            "Nocupétaro",
            "Nuevo Parangaricutiro",
            "Nuevo Urecho",
            "Numarán",
            "Ocampo",
            "Pajacuarán",
            "Panindícuaro",
            "Parácuaro",
            "Paracho",
            "Pátzcuaro",
            "Penjamillo",
            "Peribán",
            "La Piedad",
            "Purépero",
            "Puruándiro",
            "Queréndaro",
            "Quiroga",
            "Cojumatlán de Régules",
            "Los Reyes",
            "Sahuayo",
            "San Lucas",
            "Santa Ana Maya",
            "Salvador Escalante",
            "Senguio",
            "Susupuato",
            "Tacámbaro",
            "Tancítaro",
            "Tangamandapio",
            "Tangancícuaro",
            "Tanhuato",
            "Taretan",
            "Tarímbaro",
            "Tepalcatepec",
            "Tingambato",
            "TingÃ¼indín",
            "Tiquicheo de Nicolás Romero",
            "Tlalpujahua",
            "Tlazazalca",
            "Tocumbo",
            "Tumbiscatío",
            "Turicato",
            "Tuxpan",
            "Tuzantla",
            "Tzintzuntzan",
            "Tzitzio",
            "Uruapan",
            "Venustiano Carranza",
            "Villamar",
            "Vista Hermosa",
            "Yurécuaro",
            "Zacapu",
            "Zamora",
            "Zináparo",
            "Zinapécuaro",
            "Ziracueretiro",
            "Zitácuaro",
            "José Sixto Verduzco",
        ),
        "Morelos" => array(
            "Selecciona tu municipio",
            "Amacuzac",
            "Atlatlahucan",
            "Axochiapan",
            "Ayala",
            "Coatlán del Río (municipio)",
            "Cuautla",
            "Cuernavaca",
            "Emiliano Zapata",
            "Huitzilac",
            "Jantetelco",
            "Jiutepec",
            "Jojutla",
            "Jonacatepec",
            "Mazatepec",
            "Miacatlán",
            "Ocuituco",
            "Puente de Ixtla",
            "Temixco",
            "Tepalcingo",
            "Tepoztlán",
            "Tetecala",
            "Tetela del Volcán",
            "Tlalnepantla",
            "Tlaltizapán",
            "Tlaquiltenango",
            "Tlayacapan",
            "Totolapan",
            "Xochitepec",
            "Yautepec",
            "Yecapixtla",
            "Zacatepec",
            "Zacualpan",
            "Temoac"
        ),
        "Nayarit" => array(
            "Selecciona tu municipio",
            "Acaponeta",
            "Ruiz",
            "Ahuacatlán",
            "San Blas",
            "Amatlán de Cañas",
            "San Pedro Lagunillas",
            "Compostela",
            "Santa María del Oro",
            "Huajicori",
            "Santiago Ixcuintla",
            "Ixtlán del Río",
            "Tecuala",
            "Jala",
            "Tepic",
            "Xalisco",
            "Tuxpan",
            "Del Nayar",
            "La Yesca",
            "Rosamorada",
            "Bahía de Banderas"
        ),
        "Nuevo León" => array(
            "Selecciona tu municipio",
            "Abasolo",
            "Agualeguas",
            "Los Aldamas",
            "Allende",
            "Anáhuac",
            "Ciudad Apodaca",
            "Aramberri",
            "Bustamante",
            "Cadereyta Jiménez",
            "Carmen",
            "Cerralvo",
            "Ciénega de Flores",
            "China",
            "Doctor Arroyo",
            "Doctor Coss",
            "Doctor González",
            "Galeana",
            "García",
            "San Pedro Garza García",
            "General Bravo",
            "General Escobedo",
            "General Terán",
            "General Treviño",
            "General Zaragoza",
            "General Zuazua",
            "Guadalupe",
            "Los Herreras",
            "Higueras",
            "Hualahuises",
            "Iturbide",
            "Juárez",
            "Lampazos de Naranjo",
            "Linares",
            "Marín",
            "Melchor Ocampo",
            "Mier y Noriega",
            "Mina",
            "Montemorelos",
            "Monterrey",
            "Parás",
            "Pesquería",
            "Los Ramones",
            "Rayones",
            "Sabinas Hidalgo",
            "Salinas Victoria",
            "San Nicolás de los Garza",
            "Hidalgo",
            "Santa Catarina",
            "Santiago",
            "Vallecillo",
            "Villaldama"
        ),
        "Oaxaca" => array(
            "Selecciona tu municipio",
            "Abejones",
            "San Miguel Tlacotepec",
            "Acatlán de Pérez Figueroa",
            "San Miguel Tulancingo",
            "Asunción Cacalotepec",
            "San Miguel Yotao",
            "Asunción Cuyotepeji",
            "San Nicolás",
            "Asunción Ixtaltepec",
            "San Nicolás Hidalgo",
            "Asunción Nochixtlán",
            "San Pablo Coatlán",
            "Asunción Ocotlán",
            "San Pablo Cuatro Venados",
            "Asunción Tlacolulita",
            "San Pablo Etla",
            "Ayotzintepec",
            "San Pablo Huitzo",
            "El Barrio de la Soledad",
            "San Pablo Huixtepec",
            "Calihualá",
            "San Pablo Macuiltianguis",
            "Candelaria Loxicha",
            "San Pablo Tijaltepec",
            "San Pablo Tijaltepec",
            "Ciénega de Zimatlán",
            "San Pablo Villa de Mitla",
            "Ciudad Ixtepec",
            "San Pablo Yaganiza",
            "Coatecas Altas",
            "San Pedro Amuzgos",
            "Coicoyán de las Flores",
            "San Pedro Apóstol",
            "La Compañía",
            "San Pedro Atoyac",
            "Concepción Buenavista",
            "San Pedro Cajonos",
            "Concepción Pápalo",
            "San Pedro Coxcaltepec Cántaros",
            "Constancia del Rosario",
            "San Pedro Comitancillo",
            "Cosolapa",
            "San Pedro el Alto",
            "Cosoltepec",
            "San Pedro Huamelula",
            "Cuilápam de Guerrero",
            "San Pedro Huilotepec",
            "Cuyamecalco Villa de Zaragoza",
            "San Pedro Ixcatlán",
            "Chahuites",
            "San Pedro Ixtlahuaca",
            "Chalcatongo de Hidalgo",
            "San Pedro Jaltepetongo",
            "Chiquihuitlán de Benito Juárez",
            "San Pedro Jicayán",
            "Heroica Ciudad de Ejutla de Crespo",
            "San Pedro Jocotipac",
            "Eloxochitlán de Flores Magón",
            "San Pedro Juchatengo",
            "El Espinal",
            "San Pedro Mártir",
            "Tamazulapam del Espíritu Santo",
            "San Pedro Mártir Quiechapa",
            "Fresnillo de Trujano",
            "San Pedro Mártir Yucuxaco",
            "Guadalupe Etla",
            "San Pedro Mixtepec - Distrito 22 ",
            "Guadalupe de Ramírez",
            "San Pedro Mixtepec - Distrito 26",
            "Guelatao de Juárez",
            "San Pedro Molinos",
            "Guevea de Humboldt",
            "San Pedro Nopala",
            "Mesones Hidalgo",
            "San Pedro Ocopetatillo",
            "Villa Hidalgo",
            "San Pedro Ocotepec",
            "Heroica Ciudad de Huajuapan de León",
            "San Pedro Pochutla",
            "Huautepec",
            "San Pedro Quiatoni",
            "Huautla de Jiménez",
            "San Pedro Sochiapam",
            "Ixtlán de Juárez",
            "San Pedro Tapanatepec",
            "Heroica Ciudad de Juchitán de Zaragoza",
            "San Pedro Taviche",
            "Loma Bonita",
            "San Pedro Teozacoalco",
            "Magdalena Apasco",
            "San Pedro Teutila",
            "Magdalena Jaltepec",
            "San Pedro Tidaá",
            "Santa Magdalena Jicotlán",
            "San Pedro Topiltepec",
            "Magdalena Mixtepec",
            "San Pedro Totolapa",
            "Magdalena Ocotlán",
            "Villa de Tututepec de Melchor Ocampo",
            "Magdalena Peñasco",
            "San Pedro Yaneri",
            "Magdalena Teitipac",
            "San Pedro Yólox",
            "Magdalena Tequisistlán",
            "San Pedro y San Pablo Ayutla",
            "Magdalena Tlacotepec",
            "Villa de Etla",
            "Magdalena Zahuatlán",
            "San Pedro y San Pablo Teposcolula",
            "Mariscala de Juárez",
            "San Pedro y San Pablo Tequixtepec",
            "Mártires de Tacubaya",
            "San Pedro Yucunama",
            "Matías Romero Avendaño",
            "San Raymundo Jalpan",
            "Mazatlán Villa de Flores",
            "San Sebastián Abasolo",
            "Miahuatlán de Porfirio Díaz",
            "San Sebastián Coatlán",
            "Mixistlán de la Reforma",
            "San Sebastián Ixcapa",
            "Monjas",
            "San Sebastián Nicananduta",
            "Natividad",
            "San Sebastián Río Hondo",
            "Nazareno Etla",
            "San Sebastián Tecomaxtlahuaca",
            "Nejapa de Madero",
            "San Sebastián Teitipac",
            "Ixpantepec Nieves",
            "San Sebastián Tutla",
            "Santiago Niltepec",
            "San Simón Almolongas",
            "Oaxaca de Juárez",
            "San Simón Zahuatlán",
            "Ocotlán de Morelos",
            "Santa Ana",
            "La Pe",
            "Santa Ana Ateixtlahuaca",
            "Pinotepa de Don Luis",
            "Santa Ana Cuauhtémoc",
            "Pluma Hidalgo",
            "Santa Ana del Valle",
            "San José del Progreso",
            "Santa Ana Tavela",
            "Putla Villa de Guerrero",
            "Santa Ana Tlapacoyan",
            "Santa Catarina Quioquitani",
            "Santa Ana Yareni",
            "Reforma de Pineda",
            "Santa Ana Zegache",
            "La Reforma",
            "Santa Catalina Quieri",
            "Reyes Etla",
            "Santa Catarina Cuixtla",
            "Rojas de Cuauhtémoc",
            "Santa Catarina Ixtepeji",
            "Salina Cruz",
            "Santa Catarina Juquila",
            "San Agustín Amatengo",
            "Santa Catarina Lachatao",
            "San Agustín Atenango",
            "Santa Catarina Loxicha",
            "San Agustín Chayuco",
            "Santa Catarina Mechoacán",
            "San Agustín de las Juntas",
            "Santa Catarina Minas",
            "San Agustín Etla",
            "Santa Catarina Quiané",
            "San Agustín Loxicha",
            "Santa Catarina Tayata",
            "San Agustín Tlacotepec",
            "Santa Catarina Ticuá",
            "San Agustín Yatareni",
            "Santa Catarina Yosonotú",
            "San Andrés Cabecera Nueva",
            "Santa Catarina Zapoquila",
            "San Andrés Dinicuiti",
            "Santa Cruz Acatepec",
            "San Andrés Huaxpaltepec",
            "Santa Cruz Amilpas",
            "San Andrés Huayapam",
            "Santa Cruz de Bravo",
            "San Andrés Ixtlahuaca",
            "Santa Cruz Itundujia",
            "San Andrés Lagunas",
            "Santa Cruz Mixtepec",
            "San Andrés Nuxiño",
            "Santa Cruz Nundaco",
            "San Andrés Paxtlán",
            "Santa Cruz Papalutla",
            "San Andrés Sinaxtla",
            "Santa Cruz Tacache de Mina",
            "San Andrés Solaga",
            "Santa Cruz Tacahua",
            "San Andrés Teotilálpam",
            "Santa Cruz Tayata",
            "San Andrés Tepetlapa",
            "Santa Cruz Xitla",
            "San Andrés Yaá",
            "Santa Cruz Xoxocotlán",
            "San Andrés Zabache",
            "Santa Cruz Zenzontepec",
            "San Andrés Zautla",
            "Santa Gertrudis",
            "San Antonino Castillo Velasco",
            "Santa Inés del Monte",
            "San Antonino el Alto",
            "Santa Inés Yatzeche",
            "San Antonino Monte Verde",
            "Santa Lucía del Camino",
            "San Antonio Acutla",
            "Santa Lucía Miahuatlán",
            "San Antonio de la Cal",
            "Santa Lucía Monteverde",
            "San Antonio Huitepec",
            "Santa Lucía Ocotlán",
            "San Antonio Nanahuatipam",
            "Santa María Alotepec",
            "San Antonio Sinicahua",
            "Santa María Apazco",
            "San Antonio Tepetlapa",
            "Santa María la Asunción",
            "San Baltazar Chichicapam",
            "Heroica Ciudad de Tlaxiaco",
            "San Baltazar Loxicha",
            "Ayoquezco de Aldama",
            "San Baltazar Yatzachi el Bajo",
            "Santa María Atzompa",
            "San Bartolo Coyotepec",
            "Santa María Camotlán",
            "San Bartolomé Ayautla",
            "Santa María Colotepec",
            "San Bartolomé Loxicha",
            "Santa María Cortijo",
            "San Bartolomé Quialana",
            "Santa María Coyotepec",
            "San Bartolomé Yucuañe",
            "Santa María Chachoapam",
            "San Bartolomé Zoogocho",
            "Villa de Chilapa de Díaz",
            "San Bartolo Soyaltepec",
            "Santa María Chilchotla",
            "San Bartolo Yautepec",
            "Santa María Chimalapa",
            "San Bernardo Mixtepec",
            "Santa María del Rosario",
            "San Blas Atempa",
            "Santa María del Tule",
            "San Carlos Yautepec",
            "Santa María Ecatepec",
            "San Cristóbal Amatlán",
            "Santa María Guelacé",
            "San Cristóbal Amoltepec",
            "Santa María Guienagati",
            "San Cristóbal Lachirioag",
            "Santa María Huatulco",
            "San Cristóbal Suchixtlahuaca",
            "Santa María Huazolotitlán",
            "San Dionisio del Mar",
            "Santa María Ipalapa",
            "San Dionisio Ocotepec",
            "Santa María Ixcatlán",
            "San Dionisio Ocotlán",
            "Santa María Jacatepec",
            "San Esteban Atatlahuca",
            "Santa María Jalapa del Marqués",
            "San Felipe Jalapa de Díaz",
            "Santa María Jaltianguis",
            "San Felipe Tejalapam",
            "Santa María Lachixío",
            "San Felipe Usila",
            "Santa María Mixtequilla",
            "San Francisco Cahuacúa",
            "Santa María Nativitas",
            "San Francisco Cajonos",
            "Santa María Nduayaco",
            "San Francisco Chapulapa",
            "Santa María Ozolotepec",
            "San Francisco Chindúa",
            "Santa María Pápalo",
            "San Francisco del Mar",
            "Santa María Peñoles",
            "San Francisco Huehuetlán",
            "Santa María Petapa",
            "San Francisco Ixhuatán",
            "Santa María Quiegolani",
            "San Francisco Jaltepetongo",
            "Santa María Sola",
            "San Francisco Lachigoló",
            "Santa María Tataltepec",
            "San Francisco Logueche",
            "Santa María Tecomavaca",
            "San Francisco Nuxaño",
            "Santa María Temaxcalapa",
            "San Francisco Ozolotepec",
            "Santa María Temaxcaltepec",
            "San Francisco Sola",
            "Santa María Teopoxco",
            "San Francisco Telixtlahuaca",
            "Santa María Tepantlali",
            "San Francisco Teopan",
            "Santa María Texcatitlán",
            "San Francisco Tlapancingo",
            "Santa María Tlahuitoltepec",
            "San Gabriel Mixtepec",
            "Santa María Tlalixtac",
            "San Ildefonso Amatlán",
            "Santa María Tonameca",
            "San Ildefonso Sola",
            "Santa María Totolapilla",
            "San Ildefonso Villa Alta",
            "Santa María Xadani",
            "San Jacinto Amilpas",
            "Santa María Yalina",
            "San Jacinto Tlacotepec",
            "Santa María Yavesía",
            "San Jerónimo Coatlán",
            "Santa María Yolotepec",
            "San Jerónimo Silacayoapilla",
            "Santa María Yosoyúa",
            "San Jerónimo Sosola",
            "Santa María Yucuhiti",
            "San Jerónimo Taviche",
            "Santa María Zacatepec",
            "San Jerónimo Tecoatl",
            "Santa María Zaniza",
            "San Jorge Nuchita",
            "Santa María Zoquitlán",
            "San José Ayuquila",
            "Santiago Amoltepec",
            "San José Chiltepec",
            "Santiago Apoala",
            "San José del Peñasco",
            "Santiago Apóstol",
            "San José Estancia Grande",
            "Santiago Astata",
            "San José Independencia",
            "Santiago Atitlán",
            "San José Lachiguirí",
            "Santiago Ayuquililla",
            "San José Tenango",
            "Santiago Cacaloxtepec",
            "San Juan Achiutla",
            "Santiago Camotlán",
            "San Juan Atepec",
            "Santiago Comaltepec",
            "Ánimas Trujano",
            "Santiago Chazumba",
            "San Juan Bautista Atatlahuca",
            "Santiago Choapam",
            "San Juan Bautista Coixtlahuaca",
            "Santiago del Río",
            "San Juan Bautista Cuicatlán",
            "Santiago Huajolotitlán",
            "San Juan Bautista Guelache",
            "Santiago Huauclilla",
            "San Juan Bautista Jayacatlán",
            "Santiago Ihuitlán Plumas",
            "San Juan Bautista Lo de Soto",
            "Santiago Ixcuintepec",
            "San Juan Bautista Suchitepec",
            "Santiago Ixtayutla",
            "San Juan Bautista Tlacoatzintepec",
            "Santiago Jamiltepec",
            "San Juan Bautista Tlachichilco",
            "Santiago Jocotepec",
            "San Juan Bautista Tuxtepec",
            "Santiago Juxtlahuaca",
            "San Juan Cacahuatepec",
            "Santiago Lachiguiri",
            "San Juan Cieneguilla",
            "Santiago Lalopa",
            "San Juan Coatzospam",
            "Santiago Laollaga",
            "San Juan Colorado",
            "Santiago Laxopa",
            "San Juan Comaltepec",
            "Santiago Llano Grande",
            "San Juan Cotzocón",
            "Santiago Matatlán",
            "San Juan Chicomezúchil",
            "Santiago Miltepec",
            "San Juan Chilateca",
            "Santiago Minas",
            "San Juan del Estado",
            "Santiago Nacaltepec",
            "San Juan del Río",
            "Santiago Nejapilla",
            "San Juan Diuxi",
            "Santiago Nundiche",
            "San Juan Evangelista Analco",
            "Santiago Nuyoó",
            "San Juan Guelavía",
            "Santiago Pinotepa Nacional",
            "San Juan Guichicovi",
            "Santiago Suchilquitongo",
            "San Juan Ihualtepec",
            "Santiago Tamazola",
            "San Juan Juquila Mixes",
            "Santiago Tapextla",
            "San Juan Juquila Vijanos",
            "Villa Tejúpam de la Unión",
            "San Juan Lachao",
            "Santiago Tenango",
            "San Juan Lachigalla",
            "Santiago Tepetlapa",
            "San Juan Lajarcia",
            "Santiago Tetepec",
            "San Juan Lalana",
            "Santiago Texcalcingo",
            "San Juan de los Cues",
            "Santiago Textitlán",
            "San Juan Mazatlán",
            "Santiago Tilantongo",
            "San Juan Mixtepec -Distrito 08",
            "Santiago Tillo",
            "San Juan Mixtepec -Distrito 26",
            "Santiago Tlazoyaltepec",
            "San Juan Ã‘umí",
            "Santiago Xanica",
            "San Juan Ozolotepec",
            "Santiago Xiacuí",
            "San Juan Petlapa",
            "Santiago Yaitepec",
            "San Juan Quiahije",
            "Santiago Yaveo",
            "San Juan Quiotepec",
            "Santiago Yolomécatl",
            "San Juan Sayultepec",
            "Santiago Yosondúa",
            "San Juan Tabaá",
            "Santiago Yucuyachi",
            "San Juan Tamazola",
            "Santiago Zacatepec",
            "San Juan Teita",
            "Santiago Zoochila",
            "San Juan Teitipac",
            "Nuevo Zoquiapam",
            "San Juan Tepeuxila",
            "Santo Domingo Ingenio",
            "San Juan Teposcolula",
            "Santo Domingo Albarradas",
            "San Juan Yaeé",
            "Santo Domingo Armenta",
            "San Juan Yatzona",
            "Santo Domingo Chihuitán",
            "San Juan Yucuita",
            "Santo Domingo de Morelos",
            "San Lorenzo",
            "Santo Domingo Ixcatlán",
            "San Lorenzo Albarradas",
            "Santo Domingo Nuxaá",
            "San Lorenzo Cacaotepec",
            "Santo Domingo Ozolotepec",
            "San Lorenzo Cuaunecuiltitla",
            "Santo Domingo Petapa",
            "San Lorenzo Texmelucan",
            "Santo Domingo Roayaga",
            "San Lorenzo Victoria",
            "Santo Domingo Tehuantepec",
            "San Lucas Camotlán",
            "Santo Domingo Teojomulco",
            "San Lucas Ojitlán",
            "Santo Domingo Tepuxtepec",
            "San Lucas Quiaviní",
            "Santo Domingo Tlatayapam",
            "San Lucas Zoquiapam",
            "Santo Domingo Tomaltepec",
            "San Luis Amatlán",
            "Santo Domingo Tonalá",
            "San Marcial Ozolotepec",
            "Santo Domingo Tonaltepec",
            "San Marcos Arteaga",
            "Santo Domingo Xagacía",
            "San Martín de los Cansecos",
            "Santo Domingo Yanhuitlán",
            "San Martín Huamelulpam",
            "Santo Domingo Yodohino",
            "San Martín Itunyoso",
            "Santo Domingo Zanatepec",
            "San Martín Lachilá",
            "Santos Reyes Nopala",
            "San Martín Peras",
            "Santos Reyes Pápalo",
            "San Martín Tilcajete",
            "Santos Reyes Tepejillo",
            "San Martín Toxpalan",
            "Santos Reyes Yucuná",
            "San Martín Zacatepec",
            "Santo Tomás Jalieza",
            "San Mateo Cajonos",
            "Santo Tomás Mazaltepec",
            "Capulálpam de Méndez",
            "Santo Tomás Ocotepec",
            "San Mateo del Mar",
            "Santo Tomás Tamazulapan",
            "San Mateo Yoloxochitlán",
            "San Vicente Coatlán",
            "San Mateo Etlatongo",
            "San Vicente Lachixío",
            "San Mateo Nejapam",
            "San Vicente Nuñú",
            "San Mateo Peñasco",
            "Silacayoapam",
            "San Mateo Piñas",
            "Sitio de Xitlapehua",
            "San Mateo Río Hondo",
            "Soledad Etla",
            "San Mateo Sindihui",
            "Villa de Tamazulapam del Progreso",
            "San Mateo Tlapiltepec",
            "Tanetze de Zaragoza",
            "San Melchor Betaza",
            "Taniche",
            "San Miguel Achiutla",
            "Tataltepec de Valdés",
            "San Miguel Ahuehuetitlán",
            "Teococuilco de Marcos Pérez",
            "San Miguel Aloápam",
            "Teotitlán de Flores Magón",
            "San Miguel Amatitlán",
            "Teotitlán del Valle",
            "San Miguel Amatlán",
            "Teotongo",
            "San Miguel Coatlán",
            "Tepelmeme Villa de Morelos",
            "San Miguel Chicahua",
            "Tezoatlán de Segura y Luna",
            "San Miguel Chimalapa",
            "San Jerónimo Tlacochahuaya",
            "San Miguel del Puerto",
            "Tlacolula de Matamoros",
            "San Miguel del Río",
            "Tlacotepec Plumas",
            "San Miguel Ejutla",
            "Tlalixtac de Cabrera",
            "San Miguel el Grande",
            "Totontepec Villa de Morelos",
            "San Miguel Huautla",
            "Trinidad Zaachila",
            "San Miguel Mixtepec",
            "La Trinidad Vista Hermosa",
            "San Miguel Panixtlahuaca",
            "Unión Hidalgo",
            "San Miguel Peras",
            "Valerio Trujano",
            "San Miguel Piedras",
            "San Juan Bautista Valle Nacional",
            "San Miguel Quetzaltepec",
            "Villa Díaz Ordaz",
            "San Miguel Santa Flor",
            "Yaxe",
            "Villa Sola de Vega",
            "Magdalena Yodocono de Porfirio Díaz",
            "San Miguel Soyaltepec",
            "Yogana",
            "San Miguel Suchixtepec",
            "Yutanduchi de Guerrero",
            "Villa Talea de Castro",
            "Villa de Zaachila",
            "San Miguel Tecomatlán",
            "Zapotitlán del Río",
            "San Miguel Tenango",
            "Zapotitlán Lagunas",
            "San Miguel Tequixtepec",
            "Zapotitlán Palmas",
            "San Miguel Tilquiapam",
            "Santa Inés de Zaragoza",
            "San Miguel Tlacamama",
            "Zimatlán de Álvarez"
        ),
        "Puebla" => array(
            "Selecciona tu municipio",
            "Acajete",
            "Acateno",
            "Acatlán de Osorio",
            "Acatzingo",
            "Acteopan",
            "Ahuacatlán",
            "Ahuatlán",
            "Ahuazotepec",
            "Ahuehuetitla",
            "Ajalpan",
            "Acaxtlahuacán de Albino Zertuche",
            "Aljojuca",
            "Altepexi",
            "Amixtlán",
            "Amozoc",
            "Aquixtla",
            "Atempan",
            "Atexcal",
            "Atlixco",
            "Atoyatempan",
            "Atzala",
            "Atzitzihuacán",
            "Atzitzintla",
            "Axutla",
            "Ayotoxco de Guerrero",
            "Calpan",
            "Caltepec",
            "Camocuautla",
            "Caxhuacán",
            "Coatepec",
            "Coatzingo",
            "Cohetzala",
            "Cohuecán",
            "Coronango",
            "Coxcatlán",
            "Coyomeapan",
            "Coyotepec",
            "Cuapiaxtla de Madero",
            "Cuautempan",
            "Cuautinchán",
            "Cuautlancingo",
            "Cuayuca de Andrade",
            "Cuetzalan del Progreso",
            "Cuyoaco",
            "Chalchicomula de Sesma",
            "Chapulco",
            "Chiautla",
            "Chiautzingo",
            "Chiconcuautla",
            "Chichiquila",
            "Chietla",
            "Chigmecatitlán",
            "Chignahuapan",
            "Chignautla",
            "Chila de las Flores",
            "Chila de la Sal",
            "Honey",
            "Chilchotla",
            "Chinantla",
            "Domingo Arenas",
            "Eloxochitlán",
            "Epatlán",
            "Esperanza",
            "Francisco Z. Mena",
            "General Felipe Ángeles",
            "Guadalupe",
            "Guadalupe Victoria",
            "Hermenegildo Galeana",
            "Huaquechula",
            "Huatlatlauca",
            "Huauchinango",
            "Huehuetla",
            "Huehuetlán el Chico",
            "Huejotzingo",
            "Hueyapan",
            "Hueytamalco",
            "Hueytlalpan",
            "Huitzilan de Serdán",
            "Huitziltepec",
            "Atlequizayan",
            "Ixcamilpa de Guerrero",
            "Ixcaquixtla",
            "Ixtacamaxtitlán",
            "Ixtepec",
            "Izúcar de Matamoros",
            "Jalpan",
            "Jolalpan",
            "Jonotla",
            "Jopala",
            "Juan C. Bonilla",
            "Juan Galindo",
            "Juan N. Méndez",
            "Lafragua",
            "Libres",
            "La Magdalena Tlatlauquitepec",
            "Mazapiltepec de Juárez",
            "Mixtla",
            "Molcaxac",
            "Cañada Morelos",
            "Naupan",
            "Nauzontla",
            "Nealtican",
            "Nicolás Bravo",
            "Nopalucan",
            "Ocotepec",
            "Ocoyucan",
            "Olintla",
            "Oriental",
            "Pahuatlán",
            "Palmar de Bravo",
            "Pantepec",
            "Petlalcingo",
            "Piaxtla",
            "Puebla",
            "Quecholac",
            "Quimixtlán",
            "Rafael Lara Grajales",
            "Los Reyes de Juárez",
            "San Andrés Cholula",
            "San Antonio Cañada",
            "San Diego La Mesa Tochimiltzingo",
            "San Felipe Teotlalcingo",
            "San Felipe Tepatlán",
            "San Gabriel Chilac",
            "San Gregorio Atzompa",
            "San Jerónimo Tecuanipan",
            "San Jerónimo Xayacatlán",
            "San José Chiapa",
            "San José Miahuatlán",
            "San Juan Atenco",
            "San Juan Atzompa",
            "San Martín Texmelucan",
            "San Martín Totoltepec",
            "San Matías Tlalancaleca",
            "San Miguel Ixitlán",
            "San Miguel Xoxtla",
            "San Nicolás Buenos Aires",
            "San Nicolás de los Ranchos",
            "San Pablo Anicano",
            "San Pedro Cholula",
            "San Pedro Yeloixtlahuaca",
            "San Salvador el Seco",
            "San Salvador el Verde",
            "San Salvador Huixcolotla",
            "San Sebastián Tlacotepec",
            "Santa Catarina Tlaltempan",
            "Santa Inés Ahuatempan",
            "Santa Isabel Cholula",
            "Santiago Miahuatlán",
            "Huehuetlán el Grande",
            "Santo Tomás Hueyotlipan",
            "Soltepec",
            "Tecali de Herrera",
            "Tecamachalco",
            "Tecomatlán",
            "Tehuacán",
            "Tehuitzingo",
            "Tenampulco",
            "Teopantlán",
            "Teotlalco",
            "Tepanco de López",
            "Tepango de Rodríguez",
            "Tepatlaxco de Hidalgo",
            "Tepeaca",
            "Tepemaxalco",
            "Tepeojuma",
            "Tepetzintla",
            "Tepexco",
            "Tepexi de Rodríguez",
            "Tepeyahualco",
            "Tepeyahualco de Cuauhtémoc",
            "Tetela de Ocampo",
            "Teteles de Ávila Castillo",
            "Teziutlán",
            "Tianguismanalco",
            "Tilapa",
            "Tlachichuca",
            "Tlacotepec de Benito Juárez",
            "Tlacuilotepec",
            "Tlahuapan",
            "Tlaltenango",
            "Tlanepantla",
            "Tlaola",
            "Tlapacoya",
            "Tlapanalá",
            "Tlatlauquitepec",
            "Tlaxco",
            "Tochimilco",
            "Tochtepec",
            "Totoltepec de Guerrero",
            "Tulcingo",
            "Tuzamapan de Galeana",
            "Tzicatlacoyan",
            "Venustiano Carranza",
            "Vicente Guerrero",
            "Xayacatlán de Bravo",
            "Xicotepec",
            "Xicotlán",
            "Xiutetelco",
            "Xochiapulco",
            "Xochiltepec",
            "Xochitlán de Vicente Suárez",
            "Xochitlán Todos Santos",
            "Yaonáhuac",
            "Yehualtepec",
            "Zacapala",
            "Zacapoaxtla",
            "Zacatlán",
            "Zapotitlán",
            "Zapotitlán de Méndez",
            "Zaragoza",
            "Zautla",
            "Zihuateutla",
            "Zinacatepec",
            "Zongozotla",
            "Zoquiapan",
            "Zoquitlán"
        ),
        "Querétaro" => array(
            "Selecciona tu municipio",
            "Amealco de Bonfil",
            "Pinal de Amoles",
            "Arroyo Seco",
            "Cadereyta de Montes",
            "Colón",
            "Corregidora",
            "Ezequiel Montes",
            "Huimilpan",
            "Jalpan de Serra",
            "Landa de Matamoros",
            "El Marqués",
            "Pedro Escobedo",
            "Peñamiller",
            "Querétaro",
            "San Joaquín",
            "San Juan del Río",
            "Tequisquiapan",
            "Tolimán"
        ),
        "Quintana Roo" => array(
            "Selecciona tu municipio",
            "Cozumel",
            "José María Morelos",
            "Felipe Carrillo Puerto",
            "Lázaro Cárdenas",
            "Isla Mujeres",
            "Solidaridad",
            "Othón P. Blanco",
            "Tulum",
            "Benito Juárez",
            "Bacalar"
        ),
        "San Luis Potosí" => array(
            "Selecciona tu municipio",
            "Ahualulco",
            "Alaquines",
            "Aquismón",
            "Armadillo de los Infante",
            "Cárdenas",
            "Catorce",
            "Cedral",
            "Cerritos",
            "Cerro de San Pedro",
            "Ciudad del Maíz",
            "Ciudad Fernández",
            "Tancanhuitz",
            "Ciudad Valles",
            "Coxcatlán",
            "Charcas",
            "Ã‰bano",
            "Guadalcázar",
            "Huehuetlán",
            "Lagunillas",
            "Matehuala",
            "Mexquitic de Carmona",
            "Moctezuma",
            "Rayón",
            "Rioverde",
            "Salinas",
            "San Antonio",
            "San Ciro de Acosta",
            "San Luis Potosí",
            "San Martín Chalchicuautla",
            "San Nicolás Tolentino",
            "Santa Catarina",
            "Santa María del Río",
            "Santo Domingo",
            "San Vicente Tancuayalab",
            "Soledad de Graciano Sánchez",
            "Tamasopo",
            "Tamazunchale",
            "Tampacán",
            "Tampamolón Corona",
            "Tamuín",
            "Tanlajás",
            "Tanquián de Escobedo",
            "Tierra Nueva",
            "Vanegas",
            "Venado",
            "Villa de Arriaga",
            "Villa de Guadalupe",
            "Villa de la Paz",
            "Villa de Ramos",
            "Villa de Reyes",
            "Villa Hidalgo",
            "Villa Juárez",
            "Axtla de Terrazas",
            "Xilitla",
            "Zaragoza",
            "Villa de Arista",
            "Matlapa",
            "El Naranjo"
        ),
        "Sinaloa" => array(
            "Selecciona tu municipio",
            "Ahome",
            "El Fuerte",
            "Angostura",
            "Guasave",
            "Badiraguato",
            "Mazatlán",
            "Concordia",
            "Mocorito",
            "Cosalá",
            "Rosario",
            "Culiacán",
            "Salvador Alvarado",
            "Choix",
            "San Ignacio",
            "Elota",
            "Sinaloa",
            "Escuinapa",
            "Navolato"
        ),
        "Sonora" => array(
            "Selecciona tu municipio",
            "Aconchi",
            "Agua Prieta",
            "Álamos",
            "Altar",
            "Arivechi",
            "Arizpe",
            "Atil",
            "Bacadéhuachi",
            "Bacanora",
            "Bacerac",
            "Bacoachi",
            "Bácum",
            "Banámichi",
            "Baviácora",
            "Bavispe",
            "Benjamín Hill",
            "Caborca",
            "Cajeme",
            "Cananea",
            "Carbó",
            "La Colorada",
            "Cucurpe",
            "Cumpas",
            "Divisaderos",
            "Empalme",
            "Etchojoa",
            "Fronteras",
            "Granados",
            "Guaymas",
            "Hermosillo",
            "Huachinera",
            "Huásabas",
            "Huatabampo",
            "Huépac",
            "Imuris",
            "Magdalena",
            "Mazatán",
            "Moctezuma",
            "Naco",
            "Nácori Chico",
            "Nacozari de García",
            "Navojoa",
            "Nogales",
            "Onavas",
            "Opodepe",
            "Oquitoa",
            "Pitiquito",
            "Puerto Peñasco",
            "Quiriego",
            "Rayón",
            "Rosario",
            "Sahuaripa",
            "San Felipe de Jesús",
            "San Javier",
            "San Luis Río Colorado",
            "San Miguel de Horcasitas",
            "San Pedro de la Cueva",
            "Santa Ana",
            "Santa Cruz",
            "Sáric",
            "Soyopa",
            "Suaqui Grande",
            "Tepache",
            "Trincheras",
            "Tubutama",
            "Ures",
            "Villa Hidalgo",
            "Villa Pesqueira",
            "Yécora",
            "General Plutarco Elías Calles",
            "Benito Juárez",
            "San Ignacio Río Muerto"
        ),
        "Tabasco" => array(
            "Selecciona tu municipio",
            "Balancán",
            "Cárdenas",
            "Jalpa de Méndez",
            "Jonuta",
            "Centla",
            "Macuspana",
            "Centro",
            "Nacajuca",
            "Comalcalco",
            "Paraíso",
            "Cunduacán",
            "Tacotalpa",
            "Emiliano Zapata",
            "Teapa",
            "Huimanguillo",
            "Tenosique",
            "Jalapa"
        ),
        "Tamaulipas" => array(
            "Selecciona tu municipio",
            "Abasolo",
            "Aldama",
            "Altamira",
            "Antiguo Morelos",
            "Burgos",
            "Bustamante",
            "Camargo",
            "Casas",
            "Ciudad Madero",
            "Cruillas",
            "Gomez Farías",
            "González",
            "GÃ¼émez",
            "Guerrero",
            "Gustavo Díaz Ordaz",
            "Hidalgo",
            "Jaumave",
            "Jiménez",
            "Llera",
            "Mainero",
            "El Mante",
            "Matamoros",
            "Méndez",
            "Mier",
            "Miguel Alemán",
            "Miquihuana",
            "Nuevo Laredo",
            "Nuevo Morelos",
            "Ocampo",
            "Padilla",
            "Palmillas",
            "Reynosa",
            "Río Bravo",
            "San Carlos",
            "San Fernando",
            "San Nicolás",
            "Soto la Marina",
            "Tampico",
            "Tula",
            "Valle Hermoso",
            "Victoria",
            "Villagrán",
            "Xicoténcatl"
        ),
        "Tlaxcala" => array(
            "Selecciona tu municipio",
            "Amaxac de Guerrero",
            "Tetla de la Solidaridad",
            "Apetatitlán de Antonio Carvajal",
            "Tetlatlahuca",
            "Atlangatepec",
            "Tlaxcala",
            "Altzayanca",
            "Tlaxco",
            "Apizaco",
            "Tocatlán",
            "Calpulalpan",
            "Totolac",
            "El Carmen Tequexquitla",
            "Zitlaltepec de Trinidad Sánchez Santos",
            "Cuapiaxtla",
            "Tzompantepec",
            "Cuaxomulco",
            "Xalostoc",
            "Chiautempan",
            "Xaltocan",
            "Muñoz de Domingo Arenas",
            "Papalotla de Xicohténcatl",
            "Españita",
            "Xicohtzinco",
            "Huamantla",
            "Yauhquemecan",
            "Hueyotlipan",
            "Zacatelco",
            "Ixtacuixtla de Mariano Matamoros",
            "Benito Juárez",
            "Ixtenco",
            "Emiliano Zapata",
            "Mazatecochco de José María Morelos",
            "Lázaro Cárdenas",
            "Contla de Juan Cuamatzi",
            "La Magdalena Tlaltelulco",
            "Tepetitla de Lardizábal",
            "San Damián Texoloc",
            "Sanctórum de Lázaro Cárdenas",
            "San Francisco Tetlanohcan",
            "Nanacamilpa de Mariano Arista",
            "San Jerónimo Zacualpan",
            "Acuamanala de Miguel Hidalgo",
            "San José Teacalco",
            "Natívitas",
            "San Juan Huactzingo",
            "Panotla",
            "San Lorenzo Axocomanitla",
            "San Pablo del Monte",
            "San Lucas Tecopilco",
            "Santa Cruz Tlaxcala",
            "Santa Ana Nopalucan",
            "Tenancingo",
            "Santa Apolonia Teacalco",
            "Teolocholco",
            "Santa Catarina Ayometla",
            "Tepeyanco",
            "Santa Cruz Quilehtla",
            "Terrenate",
            "Santa Isabel Xiloxoxtla",
        ),
        "Veracruz" => array(
            "Selecciona tu municipio",
            "Acajete",
            "Las Minas",
            "Acatlán",
            "Minatitlán",
            "Acayucan",
            "Misantla",
            "Actopan",
            "Mixtla de Altamirano",
            "Acula",
            "Moloacán",
            "Acultzingo",
            "Naolinco",
            "Camarón de Tejeda",
            "Naranjal",
            "Alpatláhuac",
            "Nautla",
            "Alto Lucero de Gutiérrez Barrios",
            "Nogales",
            "Altotonga",
            "Oluta",
            "Alvarado",
            "Omealca",
            "Amatitlán",
            "Orizaba",
            "Naranjos Amatlán",
            "Otatitlán",
            "Amatlán de los Reyes",
            "Oteapan",
            "Ángel R. Cabada",
            "Ozuluama de Mascareñas",
            "La Antigua",
            "Pajapan",
            "Apazapan",
            "Pánuco",
            "Aquila",
            "Papantla",
            "Astacinga",
            "Paso del Macho",
            "Atlahuilco",
            "Paso de Ovejas",
            "Atoyac",
            "La Perla",
            "Atzacan",
            "Perote",
            "Atzalan",
            "Platón Sánchez",
            "Tlaltetela",
            "Playa Vicente",
            "Ayahualulco",
            "Poza Rica de Hidalgo",
            "Banderilla",
            "Las Vigas de Ramírez",
            "Benito Juárez",
            "Pueblo Viejo",
            "Boca del Río",
            "Puente Nacional",
            "Calcahualco",
            "Rafael Delgado",
            "Camerino Z. Mendoza",
            "Rafael Lucio",
            "Carrillo Puerto",
            "Los Reyes",
            "Catemaco",
            "Río Blanco",
            "Cazones de Herrera",
            "Saltabarranca",
            "Cerro Azul",
            "San Andrés Tenejapan",
            "Citlaltépetl",
            "San Andrés Tuxtla",
            "Coacoatzintla",
            "San Juan Evangelista",
            "Coahuitlán",
            "Santiago Tuxtla",
            "Coatepec",
            "Sayula de Alemán",
            "Coatzacoalcos",
            "Soconusco",
            "Coatzintla",
            "Sochiapa",
            "Coetzala",
            "Soledad Atzompa",
            "Colipa",
            "Soledad de Doblado",
            "Comapa",
            "Soteapan",
            "Córdoba",
            "Tamalín",
            "Cosamaloapan de Carpio",
            "Tamiahua",
            "Cosautlán de Carvajal",
            "Tampico Alto",
            "Coscomatepec",
            "Tancoco",
            "Cosoleacaque",
            "Tantima",
            "Cotaxtla",
            "Tantoyuca",
            "Coxquihui",
            "Tatatila",
            "Coyutla",
            "Castillo de Teayo",
            "Cuichapa",
            "Tecolutla",
            "Cuitláhuac",
            "Tehuipango",
            "Chacaltianguis",
            "Temapache",
            "Chalma",
            "Tempoal",
            "Chiconamel",
            "Tenampa",
            "Chiconquiaco",
            "Tenochtitlán",
            "Chicontepec",
            "Teocelo",
            "Chinameca",
            "Tepatlaxco",
            "Chinampa de Gorostiza",
            "Tepetlán",
            "Las Choapas",
            "Tepetzintla",
            "Chocamán",
            "Tequila",
            "Chontla",
            "José Azueta",
            "Chumatlán",
            "Texcatepec",
            "Emiliano Zapata",
            "Texhuacán",
            "Espinal",
            "Texistepec",
            "Filomeno Mata",
            "Tezonapa",
            "Fortín",
            "Tierra Blanca",
            "Gutiérrez Zamora",
            "Tihuatlán",
            "Hidalgotitlán",
            "Tlacojalpan",
            "Huatusco",
            "Tlacolulan",
            "Huayacocotla",
            "Tlacotalpan",
            "Hueyapan de Ocampo",
            "Tlacotepec de Mejía",
            "Huiloapan de Cuauhtémoc",
            "Tlachichilco",
            "Ignacio de la Llave",
            "Tlalixcoyan",
            "Ilamatlán",
            "Tlalnelhuayocan",
            "Isla",
            "Tlapacoyan",
            "Ixcatepec",
            "Tlaquilpa",
            "Ixhuacán de los Reyes",
            "Tlilapan",
            "Ixhuatlán del Café",
            "Tomatlán",
            "Ixhuatlancillo",
            "Tonayán",
            "Ixhuatlán del Sureste",
            "Totutla",
            "Ixhuatlán de Madero",
            "Túxpam",
            "Ixmatlahuacan",
            "Tuxtilla",
            "Ixtaczoquitlán",
            "Ãšrsulo Galván",
            "Jalacingo",
            "Vega de Alatorre",
            "Xalapa",
            "Veracruz",
            "Jalcomulco",
            "Villa Aldama",
            "Jáltipan",
            "Xoxocotla",
            "Jamapa",
            "Yanga",
            "Jesús Carranza",
            "Yecuatla",
            "Xico",
            "Zacualpan",
            "Jilotepec",
            "Zaragoza",
            "Juan Rodríguez Clara",
            "Zentla",
            "Juchique de Ferrer",
            "Zongolica",
            "Landero y Coss",
            "Zontecomatlán de López y Fuentes",
            "Lerdo de Tejada",
            "Zozocolco de Hidalgo",
            "Magdalena",
            "Agua Dulce",
            "Maltrata",
            "El Higo",
            "Manlio Fabio Altamirano",
            "Nanchital de Lázaro Cárdenas del Río",
            "Mariano Escobedo",
            "Tres Valles",
            "Martínez de la Torre",
            "Carlos A. Carrillo",
            "Mecatlán",
            "Tatahuicapan de Juárez",
            "Mecayapan",
            "Uxpanapa",
            "Medellín",
            "San Rafael",
            "Miahuatlán",
            "Santiago Sochiapan"
        ),
        "Yucatán" => array(
            "Selecciona tu municipio",
            "Abalá",
            "Muxupip",
            "Acanceh",
            "Opichén",
            "Akil",
            "Oxkutzcab",
            "Baca",
            "Panabá",
            "Bokobá",
            "Peto",
            "Buctzotz",
            "Progreso",
            "Cacalchén",
            "Quintana Roo",
            "Calotmul",
            "Río Lagartos",
            "Cansahcab",
            "Sacalum",
            "Cantamayec",
            "Samahil",
            "Celestún",
            "Sanahcat",
            "Cenotillo",
            "San Felipe",
            "Conkal",
            "Santa Elena",
            "Cuncunul",
            "Seyé",
            "Cuzamá",
            "Sinanché",
            "Chacsinkín",
            "Sotuta",
            "Chankom",
            "Sucilá",
            "Chapab",
            "Sudzal",
            "Chemax",
            "Suma",
            "Chicxulub Pueblo",
            "Tahdziú",
            "Chichimilá",
            "Tahmek",
            "Chikindzonot",
            "Teabo",
            "Chocholá",
            "Tecoh",
            "Chumayel",
            "Tekal de Venegas",
            "Dzan",
            "Tekantó",
            "Dzemul",
            "Tekax",
            "Dzidzantún",
            "Tekit",
            "Dzilam de Bravo",
            "Tekom",
            "Dzilam González",
            "Telchac Pueblo",
            "Dzitás",
            "Telchac Puerto",
            "Dzoncauich",
            "Temax",
            "Espita",
            "Temozón",
            "Halachó",
            "Tepakán",
            "Hocabá",
            "Tetiz",
            "Hoctún",
            "Teya",
            "Homún",
            "Ticul",
            "Huhí",
            "Timucuy",
            "Hunucmá",
            "Tinum",
            "Ixil",
            "Tixcacalcupul",
            "Izamal",
            "Tixkokob",
            "Kanasín",
            "Tixméhuac",
            "Kantunil",
            "Tixpéhual",
            "Kaua",
            "Tizimín",
            "Kinchil",
            "Tunkás",
            "Kopomá",
            "Tzucacab",
            "Mama",
            "Uayma",
            "Maní",
            "Ucú",
            "Maxcanú",
            "Umán",
            "Mayapán",
            "Valladolid",
            "Mérida",
            "Xocchel",
            "Mocochá",
            "Yaxcabá",
            "Motul",
            "Yaxkukul",
            "Muna",
            "Yobaín"
        ),
        "Zacatecas" => array(
            "Selecciona tu municipio",
            "Apozol",
            "Apulco",
            "Atolinga",
            "Benito Juárez",
            "Calera",
            "Cañitas de Felipe Pescador",
            "Concepción del Oro",
            "Cuauhtémoc",
            "Chalchihuites",
            "Fresnillo",
            "Trinidad García de la Cadena",
            "Genaro Codina",
            "General Enrique Estrada",
            "General Francisco R. Murguía",
            "El Plateado de Joaquín Amaro",
            "General Pánfilo Natera",
            "Guadalupe",
            "Huanusco",
            "Jalpa",
            "Jerez",
            "Jiménez del Teul",
            "Juan Aldama",
            "Juchipila",
            "Loreto",
            "Luis Moya",
            "Mazapil",
            "Melchor Ocampo",
            "Mezquital del Oro",
            "Miguel Auza",
            "Momax",
            "Monte Escobedo",
            "Morelos",
            "Moyahua de Estrada",
            "Nochistlán de Mejía",
            "Noria de Ángeles",
            "Ojocaliente",
            "Pánuco",
            "Pinos",
            "Río Grande",
            "Saín Alto",
            "El Salvador",
            "Sombrerete",
            "Susticacán",
            "Tabasco",
            "Tepechitlán",
            "Tepetongo",
            "Teul de González Ortega",
            "Tlaltenango de Sánchez Román",
            "Valparaíso",
            "Vetagrande",
            "Villa de Cos",
            "Villa García",
            "Villa González Ortega",
            "Villa Hidalgo",
            "Villanueva",
            "Zacatecas",
            "Trancoso",
            "Santa María de la Paz"
        )
    );


    foreach ($municipiosARR[$municipios] as $value) {
        echo "<option>" . $value . "</option>";
    }
}
//LISTAR ESTADOS Y MUNICIPIOS
