<?php
header('Content-Type: application/json');
require_once "../config/conexion.php";
 if (!empty($_POST["Usuario"]) && !empty($_POST)){
    $usuario = $_POST["Usuario"];
    $password = $_POST["Password"];
    $query = "SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Password = '$password'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode(["success" => true, "user" => $user]);
    } else {
        echo json_encode(["error" => "Usuario o contraseña incorrectos"]);
    }
    mysqli_close($conexion);
}
else {
    echo json_encode(["error" => "Faltan datos requeridos"]);
}
?>