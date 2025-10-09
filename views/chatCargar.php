<?php
session_start();
require_once "../config/conexion.php";
header('Content-Type: application/json');


if (!isset($_SESSION['user_id'])) {
  header("Location: index.php?page=Login");
  
  exit;
  
}

$userid = $_SESSION['user_id'];
$receptorid = $_GET['receptor'] ?? null;
$mensajes = [];

$sql = "SELECT idEmisor, idReceptor, message, timestamp
        FROM mensajes
        WHERE (idEmisor = ? AND idReceptor = ?)
           OR (idEmisor = ? AND idReceptor = ?)
        ORDER BY timestamp ASC";

        $stmt=mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "iiii", $userid, $receptorid, $receptorid, $userid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        while ($row = mysqli_fetch_assoc($result)) {
          $mensajes[] = $row;
        }

        echo json_encode($mensajes);
        exit;
?>