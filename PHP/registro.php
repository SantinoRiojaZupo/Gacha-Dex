<?php
if(!empty($_POST["usuario"]) && !empty($_POST["contraseña"])){
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$constraseña')";
    if(mysqli_query($con, $sql)) {
        echo json_encode(["msj" => "Todo bien"]);
    } else {
        echo json_encode(["error" => "Fallo la consulta","msj" => "Fallo la consulta"]);
    }
} else {
    echo json_encode(["error" => "No se recibieron parametros", "msj" => "Envia el nombre de algun director"]);
}

?>