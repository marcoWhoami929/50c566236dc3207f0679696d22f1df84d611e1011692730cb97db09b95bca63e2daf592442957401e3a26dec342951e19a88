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

    public function getParticipantes($tabla, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page  = $search['per_page'];


        $sWhere = " $tabla.nombre" . " LIKE '%" . $search['query'] . "%'";

        if ($search['estatus'] != "") {
            $estatus = $search['estatus'];
            switch ($estatus) {

                case "1":
                    $sWhere .= "and $tabla.facturasRegistradas  != 0 ";
                    break;
                case "0":
                    $sWhere .= "and $tabla.facturasRegistradas  = 0 ";
                    break;
            }
        }
        $sWhere .= "ORDER BY id DESC";

        $sql = "SELECT $campos FROM $tabla where $sWhere LIMIT $offset,$per_page";
        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tabla where $sWhere";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    public function getFacturasRegistradas($tabla, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page  = $search['per_page'];


        $sWhere = " fac.cliente" . " LIKE '%" . $search['query'] . "%'";

        if ($search['estatus'] != "") {
            $sWhere .= " and fac.cancelado = '" . $search['estatus'] . "' ";
        }
        if ($search['serie'] != "") {
            $sWhere .= " and fac.serie = '" . $search['serie'] . "' ";
        }
        $sWhere .= " and fac.elegida = 1 ORDER BY fac.id DESC";

        $sql = "SELECT $campos FROM $tabla as fac inner join participantes as part ON fac.usuarioAsignado = part.id  where $sWhere LIMIT $offset,$per_page";
        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tabla  as fac inner join participantes as part ON fac.usuarioAsignado = part.id where $sWhere";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    public function getGanadores($tabla, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page  = $search['per_page'];


        $sWhere = " part.nombre" . " LIKE '%" . $search['query'] . "%' ";

        if ($search['serie'] != "") {
            $sWhere .= " and fac.serie = '" . $search['serie'] . "'";
        }
        if ($search['ganadores'] != "") {
            $sWhere .= " and gan.ganado = '" . $search['ganadores'] . "'";
        }

        $sWhere .= "ORDER BY gan.fecha DESC";

        $sql = "SELECT $campos FROM $tabla as gan inner join participantes as part ON gan.idParticipante = part.id inner join facturasacumula as fac ON gan.idFactura = fac.id inner join premios as prem ON gan.idPremio = prem.id where $sWhere LIMIT $offset,$per_page";
        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tabla  as gan inner join participantes as part ON gan.idParticipante = part.id inner join facturasacumula as fac ON gan.idFactura = fac.id inner join premios as prem ON gan.idPremio = prem.id where $sWhere";

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
