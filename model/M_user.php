<?php
$baseDir=dirname(__DIR__);
$modelPathU=$baseDir.'/config/Conexion.php';

require_once $modelPathU;

class User{
    public $cnx;

    function __construct(){
        $this->cnx=Conexion::ConectarDB();
    }

    function ListUserSicoop(){
        $query="SELECT P.DNI,P.NOMBRES,P.APE_PAT,P.APE_MAT,P.RAZON,P.ID_CARGO,P.ID_AREA,U.ID_USER,U.ESTADO,U.ID_AGE,A.NOM_AGE,U.ID_GRUPO 
        FROM SEGURIDAD.DBO.PERSONAL P INNER JOIN SEGURIDAD.DBO.USUARIOS U ON P.DNI=U.DNI
        INNER JOIN SEGURIDAD.DBO.AGENCIA A ON U.ID_AGE=A.ID_AGE
        WHERE U.ESTADO='1' AND U.ID_GRUPO='04' AND P.ID_AREA='06' AND P.ID_CARGO='19'";
        $result=$this->cnx->prepare($query);
        if($result->execute()){
            $rows=$result->fetchAll();
            if(count($rows)){
                return $rows;
            }else{
                return false;
            }
        }
    }
}
?>