<?php
header('Content-Type: application/json');
require_once "../config/conexion.php";
 if (!empty($_POST["Usuario"]) && !empty($_POST["Password"])){
    $usuario = $_POST["Usuario"];
    $password = $_POST["Password"];
    $query = "SELECT * FROM users WHERE name_user = '$usuario' AND user_Password = '$password'";
    $result = mysqli_query($conexion, $query);
    if ($fila && $usuario == $fila['name_user'], $fila && $contraseña == $fila['User_password']) {
        
    }
    $stmt->close();
    $conexion->close();
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