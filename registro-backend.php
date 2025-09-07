<?php
//include '../config/conexion.php';//con los dos puntos subis una carpeta, luego entras a config, y luego haces referencia a conexion
require_once "../config/conexion.php";
if(!empty($_POST["Usuario"]) && !empty($_POST["contraseña"])){
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql = $conexion->prepare ("INSERT INTO users (Name_User, User_Password) VALUES (?,?)");
    $stmt->bind_param("ss", $usuario, $contraseña);
    if($stmt->execute()) { 
        echo json_encode(["msj" => "Todo bien"]);
   } else {
        echo json_encode(["error" => "Fallo la consulta","msj" => "Fallo la consulta"]);
    }
}
?>