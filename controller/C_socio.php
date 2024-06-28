<?php
$baseDir = dirname(__DIR__);
$modelPath = $baseDir . '/model/M_socio.php';
if (file_exists($modelPath)) {
    require_once $modelPath;
} else {
    die("El archivo M_socio.php no se encontró en la ruta: " . $modelPath);
}

require_once $modelPath;

class SocioController {

    public function obtenerSocios() {
        $socioModel = new Socio();
        $socios = $socioModel->ObterneSocios();
        if($socios){
            for($i=0;$i<count($socios);$i++){
                $list[]=array(
                    "NRO_DI"=>$socios[$i]['NRO_DI'],
                    "CUENTA"=>$socios[$i]['CUENTA'],
                    "RAZON_SOCIAL"=>$socios[$i]['RAZON_SOCIAL'],
                    "PAGARE"=>$socios[$i]['PAGARE'],
                    "OTORGA"=>$socios[$i]['OTORGA'],
                    "CUOTA_PORPAGAR"=>$socios[$i]['CUOTA_PORPAGAR'],
                );
            }
        }
        header('Content-Type: application/json');
        echo json_encode($list);
    }
    
}

?>