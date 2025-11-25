<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
if (!empty($_POST["Usuario"]) && !empty($_POST["contraseña"])) {
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql1 = "SELECT Name_User FROM users WHERE Name_User = ?";
    $stmt = mysqli_prepare($conexion, $sql1);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $fila = mysqli_fetch_assoc($res);

    if ($fila && $usuario == $fila['Name_User']) {
        echo json_encode(["error" => "El usuario ya existe", "msj" => "El usuario ya existe"]);
    } else {
        // Hashear la contraseña antes de guardar
        $sql = "INSERT INTO users (Name_User, User_Password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(["msj" => "Todo bien"]);
            exit();
        } else {
            echo json_encode(["error" => "Fallo la consulta", "msj" => "Fallo la consulta"]);
        }
        $stmt->close();
    }
    $stmt->close();
    $conexion->close();
}
