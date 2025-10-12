<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';

if (!isset($_SESSION['user_id'])) {
  echo json_encode(["error" => "No has iniciado sesión"]);
  exit;
}
if(!isset($_POST['receptor']) && !isset($_POST['mensaje'])){
    echo json_encode(["error" => "Datos incompletos"]);
  exit;
}
$emisor = $_SESSION['user_id'];
$receptor = $_POST['receptor'];
$mensaje = $_POST['mensaje'];

$sql= "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
$stmt= mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "iis", $emisor, $receptor, $mensaje);
if (mysqli_stmt_execute($stmt)) {
  echo json_encode(["success" => "Mensaje enviado"]);
} else {
  echo json_encode(["error" => "Error al enviar el mensaje"]);
}

?>