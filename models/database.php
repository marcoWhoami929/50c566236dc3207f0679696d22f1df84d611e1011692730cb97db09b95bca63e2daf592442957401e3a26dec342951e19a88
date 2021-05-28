<?php
class database
{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "sanfranc_matriz";
    public $counter;

    public function conectar()
    {
        $conexion = new PDO(
            "mysql:host=$this->host;dbname=$this->db",
            "root",
            "",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            )
        );

        return $conexion;
    }
}
