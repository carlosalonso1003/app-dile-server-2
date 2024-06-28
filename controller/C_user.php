<?php
$baseDir=dirname(__DIR__);
$modelPath=$baseDir.'/model/M_user.php';
require_once $modelPath;

class UserController{
    public function ListUserSicoop(){
        $userModel=new User();
        $user=$userModel->ListUserSicoop();
        if($user){
            for($i=0;$i<count($user);$i++){
                $list[]=array(
                    "DNI"=>$user[$i]['DNI'],
                    "NOMBRE"=>$user[$i]['NOMBRES'],
                    "APE_PAT"=>$user[$i]['APE_PAT'],
                    "APE_MAT"=>$user[$i]['APE_MAT'],
                    "RAZON"=>$user[$i]['RAZON'],
                    "CARGO"=>$user[$i]['ID_CARGO'],
                    "AREA"=>$user[$i]['ID_AREA'],
                    "USER"=>$user[$i]['ID_USER'],
                    "ESTADO"=>$user[$i]['ESTADO'],
                    "ID_AGE"=>$user[$i]['ID_AGE'],
                    "NOM_AGENCIA"=>$user[$i]['NOM_AGE'],
                    "GRUPO"=>$user[$i]['ID_GRUPO'],
                );
            }
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "data" => $list
            );
            echo json_encode($resultados);
        }
        
    }
}
?>