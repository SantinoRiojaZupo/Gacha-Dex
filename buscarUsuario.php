<?php
require_once __DIR__ . '/config/conexion.php';
header('Content-Type: application/json');
session_start();
$usuarioBuscado= $_GET['query'] ?? '';
$usuariosEncontrados = [];
if(!isset($_SESSION['user_id'])){
    echo json_encode(["error" => "No has iniciado sesión"]);
    exit;
}
else if (empty($usuarioBuscado)) {
    echo json_encode(["error" => "no escribiste nada"]);
    exit;
}
else{
    $usuarioBuscado = "%".$usuarioBuscado."%";
$sql= 'SELECT Name_User, Id_User FROM users WHERE Name_User LIKE ? LIMIT 5';
$stmt= mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "s", $usuarioBuscado);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);

if(!$result){
    echo json_encode(["error" => "Error en la consulta"]);
    exit;
}
else {
    while($row = mysqli_fetch_assoc($result)){
        $usuariosEncontrados[] = $row;
    }
    echo json_encode($usuariosEncontrados);
    exit;
}

}
?>