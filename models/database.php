<?php
class database
{

    private $host = "localhost";
    private $user = "sanfranc_matriz";
    private $pass = "rootWhoami929";
    private $db = "sanfranc_rifa";
    public $counter;

    public function conectar()
    {
        $conexion = new PDO(
            "mysql:host=$this->host;dbname=$this->db",
            "sanfranc_matriz",
            "rootWhoami929",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            )
        );

        return $conexion;
    }
}
