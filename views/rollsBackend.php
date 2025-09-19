<?php require_once "../config/conexion.php";
session_start();

header('Content-Type: application/json');
// Verifica si el usuario ha iniciado sesión

if (!isset($_SESSION['user_id'])) {
    $mensaje =(json_encode(['error' => 'Inicia Sesion']));
    echo $mensaje;
    exit();
}
echo json_encode(['ok' => true, 'mensaje' => 'Roll ejecutado correctamente']);;

?>