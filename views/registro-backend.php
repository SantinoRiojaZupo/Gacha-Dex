<?php
header('Content-Type: application/json');
require_once "../config/conexion.php";
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
if (!empty($_POST["Usuario"]) && !empty($_POST["contraseña"])) {
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql1 = "SELECT name_user FROM users WHERE name_user = ?";
    $stmt = mysqli_prepare($conexion, $sql1);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $fila = mysqli_fetch_assoc($res);

    if ($fila && $usuario == $fila['name_user']) {
        echo json_encode(["error" => "El usuario ya existe", "msj" => "El usuario ya existe"]);
    } else {
        // Hashear la contraseña antes de guardar
        $sql = $conexion->prepare("INSERT INTO users (Name_User, User_Password) VALUES (?, ?)");
        $sql->bind_param("ss", $usuario, $contraseña);
        if ($sql->execute()) {
            echo json_encode(["msj" => "Todo bien"]);
        } else {
            echo json_encode(["error" => "Fallo la consulta", "msj" => "Fallo la consulta"]);
        }
        $sql->close();
    }
    $stmt->close();
    $conexion->close();
}
?>