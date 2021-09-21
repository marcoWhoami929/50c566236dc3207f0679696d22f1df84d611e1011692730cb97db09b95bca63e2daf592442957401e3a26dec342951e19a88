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
	MOSTRAR PARTICIPANTES
	=============================================*/
    public function mdlMostarTotalParticipantes()
    {
        $stmt = $this->mysqli->prepare("SELECT count(id) as participantes from  participantes where id > 9 and id < 149");

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR PARTICIPANTES NUEVO
	=============================================*/
    public function mdlMostarTotalParticipantesNuevos()
    {
        $stmt = $this->mysqli->prepare("SELECT count(id) as nuevos from  participantes where id > 9 and fecha > '2021-06-30'");

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR FACTURAS REGISTRADAS
	=============================================*/
    public function mdlMostarTotalFacturasRegistradas()
    {
        $stmt = $this->mysqli->prepare("SELECT count(id) as registradas from  facturasacumula where elegida = 1");

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR FACTURAS POR REGISTRAR
	=============================================*/
    public function mdlMostarTotalFacturasSinRegistrar()
    {
        $stmt = $this->mysqli->prepare("SELECT count(id) as sinRegistrar from  facturasacumula where elegida = 0");

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	ACUMULADO PROMOCIONES
	=============================================*/
    public function mdlMostrarAcumuladoPromociones()
    {
        $stmt = $this->mysqli->prepare("SELECT sum(premio1) as premio1,sum(premio2) as premio2,sum(premio3) as premio3,sum(premio4) as premio4 from  participantes");

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	ACUMULADO PROMOCIONES
	=============================================*/
    public function mdlMostrarAcumuladoFacturasElegidas($serie)
    {
        $stmt = $this->mysqli->prepare("SELECT IF(sum(clasificacion1) +sum(clasificacion2)+sum(clasificacion3) +sum(clasificacion4) IS NULL,0,sum(clasificacion1) +sum(clasificacion2)+sum(clasificacion3) +sum(clasificacion4)) as acumulado from  facturasacumula where elegida = 1 and serie = '$serie'");

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR  DATOS DEL PARTICIPANTE
	=============================================*/
    public function mdlMostrarDatosParticipante($tabla, $item, $valor)
    {
        $stmt = $this->mysqli->prepare("SELECT * from  $tabla where $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR PREMIOS GANADOS
	=============================================*/
    public function mdlObtenerPremiosGanados()
    {
        $stmt = $this->mysqli->prepare("SELECT id,stockPremios,ganados,ganadosSinStock from  premios");

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR TOTAL FACTURAS POR TIENDA
	=============================================*/
    public function mdlObtenerFacturasRegistradasPorTienda()
    {
        $stmt = $this->mysqli->prepare("SELECT serie,count(id) as cantidad, if(sum(clasificacion1) IS NULL,0,sum(clasificacion1)) as montoAcumulado FROM `facturasacumula` where elegida = 1 AND serie = 'FASM' UNION SELECT if(serie IS NULL,'FACP',serie),count(id) as cantidad,if(sum(clasificacion1) IS NULL,0,sum(clasificacion1)) as montoAcumulado FROM `facturasacumula` where elegida = 1 AND serie = 'FACP' UNION SELECT if(serie IS NULL,'FARF',serie),count(id) as cantidad,if(sum(clasificacion1) IS NULL,0,sum(clasificacion1)) as montoAcumulado FROM `facturasacumula` where elegida = 1 AND serie = 'FARF' UNION SELECT if(serie IS NULL,'FATR',serie),count(id) as cantidad,if(sum(clasificacion1) IS NULL,0,sum(clasificacion1)) as montoAcumulado FROM `facturasacumula` where elegida = 1 AND serie = 'FATR' UNION SELECT if(serie IS NULL,'FASG',serie),count(id) as cantidad,if(sum(clasificacion1) IS NULL,0,sum(clasificacion1)) as montoAcumulado FROM `facturasacumula` where elegida = 1 AND serie = 'FASG'");

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	MOSTRAR GANADORES PROMOCION
	=============================================*/
    public function mdlGanadoresPorTienda()
    {
        $stmt = $this->mysqli->prepare("SELECT fac.serie,count(gan.idFactura) as cantidad FROM `ganadores` as gan INNER JOIN facturasacumula as fac ON gan.idFactura = fac.id WHERE gan.ganado = 1 group by fac.serie");

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt->close();

        $stmt = null;
    }
}
