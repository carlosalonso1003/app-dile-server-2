<?php

// Habilitar CORS para cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization");

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Manejar la solicitud preflight
    http_response_code(200);
    exit();
}

if ($method == 'GET' && $request == '/api-json-socio-prueba/api/socios') {
    require_once 'controller/C_socio.php';
    $controller = new SocioController();
    $controller->obtenerSocios();
}else if($method=='GET' && $request=='/api-json-socio-prueba/api/user'){
    require_once 'controller/C_user.php';
    $controller = new UserController();
    $data=$controller->ListUserSicoop();
    if($data){
        http_response_code(200);
        echo json_encode($data);
    }
} 
else {
    http_response_code(404);
    echo json_encode(array("mensaje" => "Ruta no encontrada"));
}

?>