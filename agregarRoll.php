<?php
require_once __DIR__ . '/config/conexion.php';
header('Content-Type: application/json');
session_start();

$user_id = $_SESSION['user_id'];

$sql = "UPDATE users
SET Rolls = Rolls + 1
WHERE Id_User = ?;";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if($result){

  echo json_encode(["msj" => "bien pa"]);  
exit;
}
else{
    echo json_encode(["msj" => "mal pa"]);
    exit;
}

?>