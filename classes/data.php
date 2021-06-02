<?php
include("../models/database.php");
class data extends database
{
    public $mysqli;
    public $counter;
    function __construct()
    {
        $this->mysqli = $this->conectar();
    }

    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }

    public function getSolicitudes($tabla, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page  = $search['per_page'];


        $sWhere = " solicitudes.cliente" . " LIKE '%" . $search['query'] . "%'";

        if ($search['sucursal'] != "") {
            $sWhere .= " and $tabla.sucursal = '" . $search['sucursal'] . "'";
        }
        if ($search['estado'] != "") {
            $sWhere .= " and $tabla.estatus = '" . $search['estado'] . "'";
        }
        if ($search['tipo'] != "") {
            $sWhere .= " and $tabla.tipoSolicitud = '" . $search['tipo'] . "'";
        }
        if ($search['estatus'] != "") {
            $estatus = $search['estatus'];
            switch ($estatus) {

                case "1":
                    $sWhere .= "and $tabla.visto = 0 and $tabla.motoEnCamino = 0 and $tabla.enProceso = 0 and $tabla.motoEnCaminoRegreso = 0 and $tabla.concluido = 0 ";
                    break;
                case "2":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 0 and $tabla.motoEnCaminoRegreso = 0 and $tabla.concluido = 0  ";
                    break;
                case "3":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 1 and $tabla.motoEnCaminoRegreso = 0 and $tabla.concluido = 0  ";
                    break;
                case "4":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 1 and $tabla.motoEnCaminoRegreso = 1 and $tabla.concluido = 0  ";
                    break;
                case "5":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 1 and $tabla.motoEnCaminoRegreso = 1 and $tabla.concluido = 1 ";
                    break;
            }
        }
        $sWhere .= "ORDER BY horaSolicitud DESC";

        $sql = "SELECT $campos FROM $tabla where $sWhere LIMIT $offset,$per_page";
        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tabla where $sWhere";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    public function getCompras($tabla, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page  = $search['per_page'];


        $sWhere = " solicitudes.cliente" . " LIKE '%" . $search['query'] . "%' and solicitudes.tipoSolicitud = 2 ";

        if ($search['sucursal'] != "") {
            $sWhere .= " and $tabla.sucursal = '" . $search['sucursal'] . "'";
        }
        if ($search['estado'] != "") {
            $sWhere .= " and $tabla.estatus = '" . $search['estado'] . "'";
        }

        if ($search['estatus'] != "") {
            $estatus = $search['estatus'];
            switch ($estatus) {

                case "1":
                    $sWhere .= "and $tabla.visto = 0 and $tabla.motoEnCamino = 0 and $tabla.enProceso = 0 and $tabla.motoEnCaminoRegreso = 0 and $tabla.concluido = 0 ";
                    break;
                case "2":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 0 and $tabla.motoEnCaminoRegreso = 0 and $tabla.concluido = 0  ";
                    break;
                case "3":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 1 and $tabla.motoEnCaminoRegreso = 0 and $tabla.concluido = 0  ";
                    break;
                case "4":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 1 and $tabla.motoEnCaminoRegreso = 1 and $tabla.concluido = 0  ";
                    break;
                case "5":
                    $sWhere .= "and $tabla.visto = 1 and $tabla.motoEnCamino = 1 and $tabla.enProceso = 1 and $tabla.motoEnCaminoRegreso = 1 and $tabla.concluido = 1 ";
                    break;
            }
        }
        $sWhere .= "ORDER BY horaSolicitud DESC";

        $sql = "SELECT $campos FROM $tabla where $sWhere LIMIT $offset,$per_page";
        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tabla where $sWhere";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    public function getGanadores($tabla, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page  = $search['per_page'];


        $sWhere = " us.nombreCompleto" . " LIKE '%" . $search['query'] . "%' ";

        if ($search['sucursal'] != "") {
            $sWhere .= " and sol.sucursal = '" . $search['sucursal'] . "'";
        }

        $sWhere .= "ORDER BY gan.fecha DESC";

        $sql = "SELECT $campos FROM $tabla as gan inner join user as us ON gan.idCliente = us.id inner join solicitudes as sol ON gan.idSolicitud = sol.id where $sWhere LIMIT $offset,$per_page";
        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tabla  as gan inner join user as us ON gan.idCliente = us.id inner join solicitudes as sol ON gan.idSolicitud = sol.id where $sWhere";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    function setCounter($counter)
    {
        $this->counter = $counter;
    }
    function getCounter()
    {
        return $this->counter;
    }
    public function seg_a_dhms($seg)
    {
        $dias = floor($seg / 86400);
        $horas = floor(($seg - ($dias * 86400)) / 3600);
        $minutos = floor(($seg - ($dias * 86400) - ($horas * 3600)) / 60);
        $segundos = $seg % 60;
        return "$dias dias, $horas horas, $minutos minutos, $segundos segundos";
    }
}
