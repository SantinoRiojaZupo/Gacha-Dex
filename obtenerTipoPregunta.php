<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';

$tipoPregunta = $_GET['pregunta']

if($tipoPregunta){


    
}
else{
    echo json_encode(["msj" => "Error de informacion."])
}


?>