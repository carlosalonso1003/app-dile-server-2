<?php

class Conexion{
    static function ConectarDB()
    {
        try {
            require "Global.php";
            $cnx = new PDO(DSN,USERNAME,PASSWORD);
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cnx;
        } catch (PDOException $ex) {
            echo "ERROR DE CONEXION";
            die($ex->getMessage());
        }
    }
}
?>