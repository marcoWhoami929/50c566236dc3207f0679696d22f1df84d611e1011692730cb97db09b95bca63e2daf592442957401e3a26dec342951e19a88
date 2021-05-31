<?php

require_once "database.php";
class ModelFunctions extends database
{
    public $mysqli;

    function __construct()
    {
        $this->mysqli = $this->conectar();
    }


    /*=============================================
	MOSTRAR MUESTRAS
	=============================================*/

    public function mdlMostrarMuestras($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR MUESTRAS PDF
	=============================================*/

    public function mdlMostrarMuestrasPdf($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR DATOS PRODUCTO
	=============================================*/

    public function mdlMostrarDatosProducto($tabla, $item, $valor)
    {

        if ($item != null) {
            /*
			$stmt = $this->mysqli->prepare("SELECT descripcion FROM $tabla WHERE :$item = SUBSTRING_INDEX($item, '.', 1)");
			*/
            $stmt = $this->mysqli->prepare("SELECT descripcion FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	AGREGAR RUTA DE ARCHIVO
	=============================================*/

    public function mdlAgregarRutaSolicitud($tabla, $item, $valor)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET rutaSolicitud = 'solicitudes/SOLICITUD-$valor.pdf' WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    /*=============================================
	MOSTRAR SOLICITUD RECIBIDA
	=============================================*/
    public function mdlActualizarSolicitudRecibida($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOTO EN CAMINO
	=============================================*/
    public function mdlActualizarMotoEnCamino($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOTO EN CAMINO FECHA REALIZADO
	=============================================*/
    public function mdlActualizarMotoEnCaminoFecha($tabla, $item2, $valor2, $item3, $valor3)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item3 = :$item3 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	EN PROCESO
	=============================================*/
    public function mdlActualizarEnProceso($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOTO EN PROCESO FECHA REALIZADO
	=============================================*/
    public function mdlActualizarEnProcesoFecha($tabla, $item2, $valor2, $item3, $valor3)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item3 = :$item3 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOTO EN CAMINO REGRESO
	=============================================*/
    public function mdlActualizarMotoEnCaminoRegreso($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOTO EN CAMINO REGRESO FECHA
	=============================================*/
    public function mdlActualizarMotoEnCaminoRegresoFecha($tabla, $item2, $valor2, $item3, $valor3)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item3 = :$item3 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	CONCLUIDO
	=============================================*/
    public function mdlActualizarConcluido($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	ACTUALIZAR FECHA CONCLUIDO
	=============================================*/
    public function mdlActualizarFechaConcluido($tabla, $item3, $valor3, $item4, $valor4)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item4 = :$item4, tiempoProceso = TIMEDIFF(:$item4,horaSolicitud) WHERE $item3 = :$item3");

        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item4, $valor4, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR TOTAL SOLICITUDES
	=============================================*/
    public function mdlMostrarTotalSolicitudes($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT count(id) as totales from  $tabla ");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT count(id) as totales from  $tabla ");

            $stmt->execute();

            return $stmt->fetch();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR TOTAL EN CAMINO
	=============================================*/
    public function mdlMostrarTotalEnCamino($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT count(motoEnCamino) as totales from  $tabla where motoEnCamino = 1 and enProceso = 0 and motoEnCaminoRegreso = 0 and concluido = 0");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT count(motoEnCamino) as totales from  $tabla where motoEnCamino = 1 and enProceso = 0 and motoEnCaminoRegreso = 0 and concluido = 0");

            $stmt->execute();

            return $stmt->fetch();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR TOTAL EN PROCESO
	=============================================*/
    public function mdlMostrarTotalEnProceso($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT count(enProceso) as totales from  $tabla where motoEnCamino = 1 and enProceso = 1 and motoEnCaminoRegreso = 0 and concluido = 0");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT count(enProceso) as totales from  $tabla where motoEnCamino = 1 and enProceso = 1 and motoEnCaminoRegreso = 0 and concluido = 0");

            $stmt->execute();

            return $stmt->fetch();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR TOTAL EN ENTREGA
	=============================================*/
    public function mdlMostrarTotalEnEntrega($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT count(motoEnCaminoRegreso) as totales from  $tabla where motoEnCamino = 1 and enProceso = 1 and motoEnCaminoRegreso = 1 and concluido = 0");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT count(motoEnCaminoRegreso) as totales from  $tabla where motoEnCamino = 1 and enProceso = 1 and motoEnCaminoRegreso = 1 and concluido = 0");

            $stmt->execute();

            return $stmt->fetch();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR TOTAL CONCLUIDO
	=============================================*/
    public function mdlMostrarTotalConcluido($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT count(concluido) as totales from  $tabla where motoEnCamino = 1 and enProceso = 1 and motoEnCaminoRegreso = 1 and concluido = 1");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT count(concluido) as totales from  $tabla where motoEnCamino = 1 and enProceso = 1 and motoEnCaminoRegreso = 1 and concluido = 1");

            $stmt->execute();

            return $stmt->fetch();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR PROMOCIONES
	=============================================*/

    public function mdlMostrarPromociones($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR DATOS CLIENTES
	=============================================*/

    public function mdlMostrarDatosCliente($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	DESCARGAR SOLICITUD
	=============================================*/

    public function mdlDescargarSolicitud($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla set descargada = 1 WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SOLICITUD VISTO
	=============================================*/
    public function mdlActualizarVisto($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	SOLICITUD VISTO FECHA
	=============================================*/
    public function mdlActualizarVistoFecha($tabla, $item2, $valor2, $item3, $valor3)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item3 = :$item3 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	EDITAR PROMOCION
	=============================================*/

    public function mdlEditarPromocion($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET descripcion = :descripcion, activa = :activa, imagen = :imagen WHERE id = :id");

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":activa", $datos["activa"], PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	MOSTRAR DATOS DEL CLIENTE
	=============================================*/

    public function mdlMostrarDatosClienteMuestras($tabla, $item2, $valor2)
    {

        if ($item2 != null) {

            $stmt = $this->mysqli->prepare("SELECT  m.idCliente, s.id, s.nombreCompleto AS nombre, s.taller AS taller, s.telefono AS telefono, s.celular AS celular, s.direccion AS direccion, s.latitud AS latitud, s.longitud AS longitud FROM $tabla s INNER JOIN solicitudes m WHERE m.idCliente = s.id AND m.$item2 = :$item2");

            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT m.idCliente, s.id, s.nombreCompleto AS nombre, s.taller AS taller, s.telefono AS telefono, s.celular AS celular, s.direccion AS direccion, s.latitud AS latitud, s.longitud AS longitud FROM $tabla s INNER JOIN solicitudes m WHERE m.idCliente = s.id ORDER BY s.id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR DATOS DEL CLIENTE
	=============================================*/

    public function mdlMostrarDatosFacturacion($tabla, $item, $valor)
    {


        $stmt = $this->mysqli->prepare("SELECT df.*,ucf.codigo,ucf.descripcion FROM `user` as us INNER JOIN datosfacturacion AS df ON df.idCliente = us.id INNER JOIN usocfdi as ucf ON ucf.id = df.usocfdi WHERE df.$item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	MOSTRAR TABLA CLIENTES APP
	=============================================*/

    public function mdlMostrarCarteraClientes($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	MOSTRAR DATOS DE SUCURSALES
	=============================================*/

    public function mdlMostrarSucursales($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT  s.sucursal AS sucursal, s.direccion AS direccion, s.latitud AS latitud, s.longitud AS longitud FROM sucursales s INNER JOIN solicitudes m WHERE s.$item =  :$item limit 1");



            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT  m.sucursal, s.sucursal AS sucursal, s.direccion AS direccion, s.latitud AS latitud, s.longitud AS longitud FROM $tabla s INNER JOIN solicitudes m WHERE m.sucursal = s.sucursal ORDER BY s.id DESC");


            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	MOSTRAR CATALOGO DE PRODUCTOS
	=============================================*/

    public function mdlMostrarProductos($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT  * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY id ASC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR CATALOGO DE MARCAS (SUBCATEGORIAS)
	=============================================*/

    public function mdlMostrarCatalogo($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY idSubcategoria ASC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    public function mdlMostrarSubcategoria($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT m.*, s.nombre as nombre FROM $tabla m INNER JOIN categoriasmarca s WHERE m.idMarca = s.idMarca and $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT m.*, s.nombre as nombre FROM $tabla m INNER JOIN categoriasmarca s WHERE m.idMarca = s.idMarca");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	MOSTRAR SUBCATEGORIAS DESGLOSE(SUBCATEGORIAS)
	=============================================*/
    public function mdlMostrarSubcategoriaDesglose($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT m.*, s.nombreSubcategoria as nombreSubcategoria FROM $tabla m INNER JOIN subcategoriamarca s WHERE m.idSubcategoria = s.idSubcategoria and $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT m.*, s.nombreSubcategoria as nombreSubcategoria FROM $tabla m INNER JOIN subcategoriamarca s WHERE m.idSubcategoria = s.idSubcategoria");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	MOSTRAR SUBCATEGORIAS SUBDESGLOSE(SUBCATEGORIAS)
	=============================================*/
    public function mdlMostraraSubdesglose($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT m.*, s.descripcion as nombre FROM $tabla m INNER JOIN subcategoriadesglose s WHERE m.idDesglose = s.id and m.$item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT m.*, s.descripcion as nombre FROM $tabla m INNER JOIN subcategoriadesglose s WHERE m.idDesglose = s.id");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR CATALOGO DE MARCAS (SUBCATEGORIAS)
	=============================================*/

    public function mdlMostrarMarcas($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla ORDER BY idMarca ASC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	AGREGAR PRODUCTO
	=============================================*/
    public function mdlAgregarProducto($tabla, $datos)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO $tabla(codigo, descripcion, cubeta, galon, litro, medio, cuart, octav, unidadMedida, valorMedida, gramaje, nombre, idSubcategoriaDesglose) VALUES (:codigo, :descripcion, :cubeta, :galon, :litro, :medio, :cuart, :octav, :unidadMedida, :valorMedida, :gramaje, :nombre, :idSubcategoriaDesglose)");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":cubeta", $datos["cubeta"], PDO::PARAM_STR);
        $stmt->bindParam(":galon", $datos["galon"], PDO::PARAM_STR);
        $stmt->bindParam(":litro", $datos["litro"], PDO::PARAM_STR);
        $stmt->bindParam(":medio", $datos["medio"], PDO::PARAM_STR);
        $stmt->bindParam(":cuart", $datos["cuart"], PDO::PARAM_STR);
        $stmt->bindParam(":octav", $datos["octav"], PDO::PARAM_STR);
        $stmt->bindParam(":unidadMedida", $datos["unidadMedida"], PDO::PARAM_STR);
        $stmt->bindParam(":valorMedida", $datos["valorMedida"], PDO::PARAM_STR);
        $stmt->bindParam(":gramaje", $datos["gramaje"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":idSubcategoriaDesglose", $datos["idSubcategoriaDesglose"], PDO::PARAM_INT);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	AGREGAR MARCA
	=============================================*/
    public function mdlAgregarMarca($tabla, $datos)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO $tabla(nombre, rutaFoto) VALUES (:nombre, :rutaFoto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":rutaFoto", $datos["rutaFoto"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	AGREGAR MARCA
	=============================================*/
    public function mdlAgregarSubcategoria($tabla, $datos)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO $tabla (nombreSubcategoria, rutaFotoSubcategoria, idMarca) VALUES (:nombreSubcategoria, :rutaFotoSubcategoria, :idMarca)");

        $stmt->bindParam(":nombreSubcategoria", $datos["nombreSubcategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":rutaFotoSubcategoria", $datos["rutaFotoSubcategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $datos["idMarca"], PDO::PARAM_INT);



        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	AGREGAR SUBCATEGORIA DESGLOSE
	=============================================*/
    public function mdlAgregarSubcategoriaDesglose($tabla, $datos)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO $tabla (descripcion, idSubcategoria) VALUES (:descripcion, :idSubcategoria)");

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idSubcategoria", $datos["idSubcategoria"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	AGREGAR SUBCATEGORIA SUBDESGLOSE
	=============================================*/
    public function mdlAgregarSubcategoriaSubdesglose($tabla, $datos)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO $tabla (descripcion, idDesglose, marca) VALUES (:descripcion, :idDesglose, :marca)");

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idDesglose", $datos["idDesglose"], PDO::PARAM_INT);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    /*=============================================
	EDITAR PRODUCTO
	=============================================*/
    public function mdlEditarProducto($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET codigo = :codigo, descripcion = :descripcion, cubeta = :cubeta, galon = :galon, litro = :litro, medio = :medio, cuart = :cuart, octav = :octav, unidadMedida = :unidadMedida, valorMedida = :valorMedida, gramaje = :gramaje, nombre = :nombre, idSubcategoriaDesglose = :idSubcategoriaDesglose WHERE id = :id");

        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":cubeta", $datos["cubeta"], PDO::PARAM_STR);
        $stmt->bindParam(":galon", $datos["galon"], PDO::PARAM_STR);
        $stmt->bindParam(":litro", $datos["litro"], PDO::PARAM_STR);
        $stmt->bindParam(":medio", $datos["medio"], PDO::PARAM_STR);
        $stmt->bindParam(":cuart", $datos["cuart"], PDO::PARAM_STR);
        $stmt->bindParam(":octav", $datos["octav"], PDO::PARAM_STR);
        $stmt->bindParam(":unidadMedida", $datos["unidadMedida"], PDO::PARAM_STR);
        $stmt->bindParam(":valorMedida", $datos["valorMedida"], PDO::PARAM_STR);
        $stmt->bindParam(":gramaje", $datos["gramaje"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":idSubcategoriaDesglose", $datos["idSubcategoriaDesglose"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	EDITAR MARCA
	=============================================*/
    public function mdlEditarMarca($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET nombre = :nombre, rutaFoto = :rutaFoto WHERE idMarca = :idMarca");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":rutaFoto", $datos["rutaFoto"], PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $datos["idMarca"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/
    public function mdlEditarSubcategoria($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET nombreSubcategoria = :nombreSubcategoria, rutaFotoSubcategoria = :rutaFotoSubcategoria, idMarca = :idMarca WHERE idSubcategoria = :idSubcategoria");

        $stmt->bindParam(":nombreSubcategoria", $datos["nombreSubcategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":rutaFotoSubcategoria", $datos["rutaFotoSubcategoria"], PDO::PARAM_STR);
        $stmt->bindParam(":idMarca", $datos["idMarca"], PDO::PARAM_INT);
        $stmt->bindParam(":idSubcategoria", $datos["idSubcategoria"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/
    public function mdlEditarSubcategoriaDesglose($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET descripcion = :descripcion, idSubcategoria = :idSubcategoria WHERE id = :id");

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idSubcategoria", $datos["idSubcategoria"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	EDITAR SUBCATEGORIA SUBDESGLOSE
	=============================================*/
    public function mdlEditarSubDesglose($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET descripcion = :descripcion, idDesglose = :idDesglose, marca = :marca WHERE id = :id");

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idDesglose", $datos["idDesglose"], PDO::PARAM_INT);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    /*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

    public function mdlEliminarProducto($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	ELIMINAR MARCA
	=============================================*/

    public function mdlEliminarMarca($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("DELETE FROM $tabla WHERE idMarca = :idMarca");

        $stmt->bindParam(":idMarca", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	ELIMINAR MARCA
	=============================================*/

    public function mdlEliminarSubcategoria($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("DELETE FROM $tabla WHERE idSubcategoria = :idSubcategoria");

        $stmt->bindParam(":idSubcategoria", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	ELIMINAR SUBCATEGORIA DESGLOSE
	=============================================*/

    public function mdlEliminarSubcategoriaDesglose($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	ELIMINAR SUBCATEGORIA SUBDESGLOSE
	=============================================*/

    public function mdlEliminarSubDesglose($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
	ELIMINAR CLIENTE
	=============================================*/

    public function mdlEliminarCliente($tabla, $datos)
    {

        $stmt = $this->mysqli->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

    public function mdlMostrarNotificaciones($tabla)
    {

        $stmt = $this->mysqli->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR NOTIFICACIONES APP
	=============================================*/

    public function mdlMostrarNotificacionesApp($tabla, $item, $valor)
    {

        $stmt = $this->mysqli->prepare("SELECT $item as total,concluidas FROM $tabla");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }


    /*=============================================
	ACTUALIZAR NOTIFICACIONES
	=============================================*/

    public function mdlActualizarNotificaciones($tabla, $item, $valor)
    {

        $stmt = $this->mysqli->prepare("UPDATE $tabla SET $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    MOSTRAR OBSERVACIONES
    =============================================*/

    public function mdlMostrarObservaciones($tabla, $item, $valor)
    {

        $stmt = $this->mysqli->prepare("SELECT observaciones,observacionesProductos FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    VER DETALLE COMPRA
    =============================================*/

    public function mdlMostrarDetalleCompra($tabla, $item, $valor)
    {

        $stmt = $this->mysqli->prepare("SELECT listaProductos FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

}
