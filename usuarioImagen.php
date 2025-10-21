<?php 
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/config/conexion.php';
if(!isset($conexion)){
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
$idPerfil = isset($_GET['id']) && (int)$_GET['id'] > 0 ? (int)$_GET['id'] : $_SESSION['user_id'];
if($idPerfil<=0 || !is_int($idPerfil)){
    echo json_encode(["error" => "ID de usuario no válido"]);
    exit;
}
$user_id = $_SESSION["user_id"];

if($idPerfil !== $user_id){
$user_id = $idPerfil;
}
$arr1=[];
$sql = "SELECT Profile_Photo FROM users WHERE id_user = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
if ($fila = mysqli_fetch_assoc($resultado)) {
  $foto = $fila["Profile_Photo"];
  
}

if($foto){
    echo json_encode(["foto" => $foto]);
}
else{
    echo json_encode(["msj"=>"no tiene foto"]);
}


?>