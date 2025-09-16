<?php
header('Content-Type: application/json');
require_once "../config/conexion.php";

if (!empty($_POST["UsuarioLogin"]) && !empty($_POST["contraseñaLogin"])) {
    $usuario = $_POST["UsuarioLogin"];
    $password = $_POST["contraseñaLogin"];
    $query = "SELECT * FROM users WHERE Name_User = ? AND User_Password = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($res) > 0) {
        $user = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $user['Id_User'];
        $_SESSION['username'] = $user['Name_User'];
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