<?php
header("Access-Control-Allow-Origin: *");

//Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "") or die("could not connect server");
mysqli_set_charset($conn, 'utf8');
mysqli_select_db($conn, "sanfranc_encuesta") or die("could not connect database");


//LOGIN
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
	$password = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['password'])));
	//$passwordEncrypt = $encriptar($password);
	$datos = mysqli_query($conn, "select * from `encuestadores` where `correo`='$email' and `password`='$password'");
	$login = mysqli_num_rows(mysqli_query($conn, "select * from `encuestadores` where `correo`='$email' and `password`='$password'"));
	if ($login != 0) {

		while ($fila = mysqli_fetch_array($datos)) {

			$datosUsuario = array('idCliente' => $fila["id"]);
			echo json_encode($datosUsuario);
		}
	} else {
		echo "failed";
	}
}
/**
 * CONSULTAR ULTIMO ID DEL CLIENTE EN LA TABLA DE LATITUDES
 */
if (isset($_POST['consultarId'])) {
	$idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));

	$obtenerID = mysqli_query($conn, "SELECT C.latitud AS latitudBd, C.longitud AS longitudBd, IF(C.idEncuesta IS NULL,1,C.idEncuesta + 1) As idEncuesta,IF(C.idEncuesta IS NULL,1,C.idEncuesta + 1) as folioEncuesta FROM coordenadas AS C INNER JOIN encuestadores AS E WHERE E.id = '$idCliente' ORDER by C.idEncuesta DESC LIMIT 1");

	if (mysqli_num_rows($obtenerID) != 0) {

		$data = array();
		while ($r = $obtenerID->fetch_assoc()) {
			$data[] = $r;
		}
		echo json_encode($data);
	} else {

		echo 'failed';
	}

	echo mysqli_error($conn);
}
/**
 * GUARDAR DATOS DE ENCUESTA
 */
if (isset($_POST['guardarCoordenadas'])) {

	$idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));
	$idEncuesta = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['siguienteId'])));
	$latitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['latitud'])));
	$longitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['longitud'])));

	$q = mysqli_query($conn, "INSERT INTO `coordenadas` (`idEncuesta`,`latitud`,`longitud`) values ('$idEncuesta','$latitud','$longitud')");
	$r = mysqli_query($conn, "INSERT INTO  `encuesta`(`id`,`encuestador`) values ('$idEncuesta','$idCliente')");

	if ($q && $r) {

		echo "success";
	} else {

		echo "failed";
	}

	echo mysqli_error($conn);
}

if (isset($_POST['consultarIdEncuesta'])) {
	$idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));
	$latitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['latitud'])));
	$longitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['longitud'])));

	$validar = mysqli_query($conn, "SELECT En.id FROM encuesta AS En INNER JOIN coordenadas AS E ON En.id = E.idEncuesta WHERE E.latitud = '$latitud' AND E.longitud = '$longitud' AND En.encuestador = '$idCliente'");

	if (mysqli_num_rows($validar) != 0) {

		$data = array();
		while ($r = $validar->fetch_assoc()) {
			$data[] = $r;
		}
		echo json_encode($data);
	} else {

		echo 'failed';
	}

	echo mysqli_error($conn);
}

/**
 * GUARDAR DATOS DE ENCUESTA
 */
if (isset($_POST['guardarDatosEncuesta'])) {
	$idCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idCliente'])));
	$idEncuestaConsultado = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idEncuestaConsultado'])));

	$nameTaller = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['nameTaller']))));
	$nameCliente = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['nameCliente']))));
	$direccion = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['direccion']))));
	$estado = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['estado']))));
	$telefono = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['telefono'])));
	$celular = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['celular'])));
	$email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
	$facebook = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['facebook'])));
	$reparacionesMensuales = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['reparacionesMensuales'])));
	$igualadosSemanales = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['igualadosSemanales'])));
	$calidadIgualado = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['calidadIgualado'])));
	$m2Area = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['m2Area'])));
	$noTrabajadores = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['noTrabajadores'])));
	$horarioLV = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['horarioLV'])));
	$horarioSab = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['horarioSab'])));
	$satisfecho = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['satisfecho'])));
	$porQue = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['porQue']))));

	$proveedor = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['proveedor']))));
	$domicilioReferencia = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['domicilioReferencia'])));
	$proveedor2 = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['proveedor2']))));
	$domicilioReferencia2 = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['domicilioReferencia2'])));
	$formaPago = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['formaPago'])));
	//$marcaPinturas=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['marcaPinturas'])));
	$lineaBaseColor = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['lineaBaseColor']))));
	$esmaltes = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['esmaltes']))));
	$transparentes = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['transparentes']))));
	$pistolas = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['pistolas']))));
	$lijas = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['lijas']))));
	$maskings = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['maskings']))));
	$inversionSemanal = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['inversionSemanal'])));
	$productosAddProveedor = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['productosAddProveedor']))));
	$comentariosMejora = mysqli_real_escape_string($conn, htmlspecialchars(trim(strtoupper($_POST['comentariosMejora']))));
	$fecha = date('Y-m-d');

	/* NUEVOS CAMPOS ENCUESTA */
	$lineaCredito = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['lineaCredito'])));
	$tiempoCredito = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['tiempoCredito'])));
	$antiguedadTaller = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['antiguedadTaller'])));
	$tipoEncuesta = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['tipoEncuesta'])));



	//$latitud=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['latitud'])));
	//$longitud=mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['longitud'])));
	if ($estado == 'PUEBLA') {
		$fecha = date("Y-m-d H:i:s");
		$notificacion =  mysqli_query($conn, "UPDATE `notificaciones` SET `puebla` = `puebla`+1,`fechaPuebla` = '$fecha' where `id` = 1");
	} else if ($estado == 'TLAXCALA') {
		$fecha = date("Y-m-d H:i:s");
		$notificacion =  mysqli_query($conn, "UPDATE `notificaciones` SET `tlaxcala` = `tlaxcala`+1,`fechaTlaxcala` = '$fecha'  where `id` = 1");
	}
	$q = mysqli_query($conn, "UPDATE `encuesta` SET `taller` = '$nameTaller', `cliente` = '$nameCliente', `domicilio` = '$direccion', `estado` = '$estado', `telefono` = '$telefono', `movil` = '$celular', `correoElectronico` = '$email', `facebook` = '$facebook', `reparacionesMes` = '$reparacionesMensuales', `areaHyp` = '$m2Area', `trabajadores` = '$noTrabajadores', `horarioSemana` = '$horarioLV', `horarioSabado` = '$horarioSab', `satisfaccionProveedor` = '$satisfecho', `motivo` = '$porQue', `igualadosPorSemana` = '$igualadosSemanales', `calidadDeIgualado` = '$calidadIgualado', `proveedorPinturas` = '$proveedor', `domicilioReferencia` = '$domicilioReferencia', `proveedorPinturas2` = '$proveedor2', `domicilioReferencia2` = '$domicilioReferencia2', `formaPago` = '$formaPago', `marcaBaseColor` = '$lineaBaseColor', `marcaEsmalte` = '$esmaltes', `marcaTransparente` = '$transparentes', `marcaPistolas` = '$pistolas', `marcaLijas` = '$lijas', `marcaMasking` = '$maskings', `inversion` = '$inversionSemanal', `productosFaltantes` = '$productosAddProveedor', `faltaMejorar` = '$comentariosMejora',`fecha` = '$fecha',`lineaCredito` = '$lineaCredito',`tiempoCredito` = '$tiempoCredito',`antiguedadTaller` = '$antiguedadTaller',`tipoEncuesta` = '$tipoEncuesta'   WHERE `id` = '$idEncuestaConsultado' AND `encuestador` = '$idCliente'");


	if ($q) {

		echo "success";
	} else {

		echo "failed";
	}

	echo mysqli_error($conn);
}
/* FINALIZAR ENCUESTA */
if (isset($_POST['finalizacionEncuesta'])) {
	$motivoFinalizacion = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['motivoFinalizacion'])));
	$folioEncuesta = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['folioEncuesta'])));


	$validar = mysqli_query($conn, "UPDATE `encuesta` SET `finalizada` = 1,`motivoFinalizacion` = '$motivoFinalizacion' where `id` = '$folioEncuesta'");

	if ($validar) {

		echo "success";
	} else {
		echo "failed";
	}
}
/*****LISTAR LOS PROVEEDORES ********/
if (isset($_POST['listarProveedores'])) {
	$identificador = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['identificador'])));
	$listarProveedores = mysqli_query($conn, "SELECT proveedorPinturas FROM encuesta WHERE proveedorPinturas IS NOT NULL and proveedorPinturas != '' GROUP by proveedorPinturas");

	if (mysqli_num_rows($listarProveedores) != 0) {
		$data = array();
		while ($m = $listarProveedores->fetch_assoc()) {
			$data[] = $m;
		}
		echo json_encode($data);
	} else {
		echo 'failed';
	}
}
/*****LISTAR LAS TIENDAS CERCANAS ********/
if (isset($_POST['localizacionProveedores'])) {
	function getBoundaries($lat, $lng, $distance)
	{
		$return = array();

		// Los angulos para cada dirección
		$cardinalCoords = array(
			'north' => '0',
			'south' => '180',
			'east' => '90',
			'west' => '270'
		);

		$rLat = deg2rad($lat);
		$rLng = deg2rad($lng);
		$rAngDist = $distance / 6371;

		foreach ($cardinalCoords as $name => $angle) {
			$rAngle = deg2rad($angle);
			$rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
			$rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));

			$return[$name] = array(
				'lat' => (float) rad2deg($rLatB),
				'lng' => (float) rad2deg($rLonB)
			);
		}

		return array(
			'min_lat'  => $return['south']['lat'],
			'max_lat' => $return['north']['lat'],
			'min_lng' => $return['west']['lng'],
			'max_lng' => $return['east']['lng']
		);
	}

	$latitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['latitud'])));
	$longitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['longitud'])));

	$lat =  $latitud;
	$lng = $longitud;
	$distance = 1; // Sitios que se encuentren en un radio de 1KM
	$box = getBoundaries($lat, $lng, $distance);

	$localizarProveedores = mysqli_query($conn, 'SELECT *, ( 6371 * ACOS( 
		COS( RADIANS(' . $lat . ') ) 
		* COS(RADIANS( latitud ) ) 
		* COS(RADIANS( longitud ) 
		- RADIANS(' . $lng . ') ) 
		+ SIN( RADIANS(' . $lat . ') ) 
		* SIN(RADIANS( latitud ) ) 
	   )
) AS distance 
FROM proveedores 
WHERE (latitud BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ')
AND (longitud BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ')
HAVING distance < ' . $distance . '
ORDER BY distance ASC');

	if (mysqli_num_rows($localizarProveedores) != 0) {
		$data = array();
		while ($m = $localizarProveedores->fetch_assoc()) {
			$data[] = $m;
		}
		echo json_encode($data);
	} else {
		echo 'failed';
	}
}
/*****DATOS PROVEEDOR ********/
if (isset($_POST['datosProveedor'])) {
	$idProveedor = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['idProveedor'])));
	$datos = mysqli_query($conn, "SELECT * FROM proveedores WHERE id = '$idProveedor'  ");

	if (mysqli_num_rows($datos) != 0) {
		$data = array();
		while ($m = $datos->fetch_assoc()) {
			$data[] = $m;
		}
		echo json_encode($data);
	} else {
		echo 'failed';
	}
}
/*****ACTUALIZAR DATOS PROVEEDOR ********/
if (isset($_POST['actualizarDatosProveedor'])) {
	$id = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarId'])));
	$tienda = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarTienda'])));
	$direccion = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarDireccion'])));
	$latitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarLatitud'])));
	$longitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['editarLongitud'])));

	$actualizarProveedor = mysqli_query($conn, "SELECT * FROM proveedores WHERE id = '$idProveedor'  ");

	$actualizarProveedor = mysqli_query($conn, "UPDATE `proveedores` SET `proveedor` = '$tienda', `direccion` = '$direccion', `latitud` = '$latitud', `longitud` = '$longitud'   WHERE `id` = '$id'");


	if ($actualizarProveedor) {

		echo "success";
	} else {

		echo "failed";
	}
}
/*****NUEVO PROVEEDOR ********/
if (isset($_POST['nuevoProveedor'])) {

	$tienda = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['tienda'])));
	$direccion = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['direccion'])));
	$latitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['latitud'])));
	$longitud = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['longitud'])));


	$nuevo = mysqli_query($conn, "INSERT INTO  `proveedores`(`proveedor`,`direccion`,`latitud`,`longitud`) values ('$tienda','$direccion','$latitud','$longitud')");

	if ($nuevo) {

		echo "success";
	} else {

		echo "failed";
	}

	echo mysqli_error($conn);
}
