<?php
//include '../config/conexion.php';//con los dos puntos subis una carpeta, luego entras a config, y luego haces referencia a conexion
header('Content-Type: application/json');
require_once "../config/conexion.php";
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
if(!empty($_POST["Usuario"]) && !empty($_POST["contraseña"])){
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql = $conexion->prepare ("INSERT INTO users (Name_User, User_Password) VALUES (?,?)");
    $sql->bind_param("ss", $usuario, $contraseña);
    if($sql->execute()) { 
        echo json_encode(["msj" => "Todo bien"]);
   } else {
        echo json_encode(["error" => "Fallo la consulta","msj" => "Fallo la consulta"]);
    }
}
?>