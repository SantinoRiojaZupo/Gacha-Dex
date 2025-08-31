<?php
$conexion = new mysqli("localhost", "root", "", "GachaDex");
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$sql = "INSERT INTO usuarios (usuario, clave) VALUES ('$usuario', '$constraseña')";

if($conexion->query($sql) === true){
    header("location: paginaPricipal.html")
}
?>