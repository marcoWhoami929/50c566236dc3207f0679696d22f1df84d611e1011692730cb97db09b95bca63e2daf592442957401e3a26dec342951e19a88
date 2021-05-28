<?php
require_once "database.php";
class  ModelTemplate extends database
{
    public $mysqli;

    function __construct()
    {
        $this->mysqli = $this->conectar();
    }
    public function mdlMostrarAdministradores($tabla, $item, $valor)
    {
        if ($item != null) {

            $stmt = $this->mysqli->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt =  $this->mysqli->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
}
