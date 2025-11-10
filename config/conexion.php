<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "gachadex";
$conexion = mysqli_connect($server, $user, $pass, $bd, 3306);
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
?>