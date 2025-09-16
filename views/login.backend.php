<?php
header('Content-Type: application/json');
require_once "../config/conexion.php";
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
else if (!empty($_POST["Usuario"]) && !empty($_POST)){
    
}



?>