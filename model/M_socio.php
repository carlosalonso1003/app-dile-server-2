<?php
$baseDir = dirname(__DIR__);
$modelPathC= $baseDir . '/config/Conexion.php';
require_once $modelPathC;

class Socio{

    public $cnx;

    function __construct(){
        $this->cnx=Conexion::ConectarDB();
    }

    function ObterneSocios(){
        $query="SELECT LTRIM(RTRIM(S.NRO_DI))AS NRO_DI,S.CUENTA,S.RAZON_SOCIAL,P.PAGARE,P.OTORGA,P.NDIAS_ATRASADOS,
        (SELECT NOM_RIESGO FROM TIPORIESGO WHERE COD_RIESGO=P.RIESGO_INDIVIDUAL) AS RIESGO_INDIVIDUAL, 
        (SELECT COUNT(*) FROM PRECUO WHERE PAGARE=P.PAGARE AND OTORGA=P.OTORGA AND CUENTA=P.CUENTA AND ESTADO='1') AS CUO_FALTANTES_VIGENTES,
        P.SALDO_MOROSO,P.MORA_XCOBRAR,P.INTERES_CARTA,P.SEGURO,P.DESGRAV,(P.MORA_XCOBRAR+P.SALDO_MOROSO+P.INTERES_CARTA+P.SEGURO+P.DESGRAV) AS CUOTA_PORPAGAR 
        FROM PREEC P INNER JOIN SOCIOS S ON P.CUENTA=S.CUENTA 
        WHERE PERIODO='202305' AND (P.MORA_XCOBRAR+P.SALDO_MOROSO+P.INTERES_CARTA+P.SEGURO+P.DESGRAV)>0";
        $result=$this->cnx->prepare($query);
        if($result->execute()){
            $rows=$result->fetchAll();
            if(count($rows)){
                return $rows;
            }else{return "NO SE ENCUENTRA REGISTROS";}
        }else{
            return false;
        }
    }
}
?>