<?php
session_start();
require_once __DIR__ . '/config/conexion.php';
header('Content-Type: application/json');


if (!isset($_SESSION['user_id'])) {
  header("Location: index.php?page=Login");
  
  exit;
  
}

$userid = $_SESSION['user_id'];
$receptorid = $_GET['receptor'] ?? null;
$mensajes = [];

$sql = "SELECT sender_id, receiver_id, message, timestamp
        FROM messages
        WHERE (sender_id = ? AND receiver_id = ?)
           OR (sender_id = ? AND receiver_id = ?)
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