<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';
$userid=$_GET['user_id'];
$stmt=mysqli_prepare($conexion,"SELECT CASE 
        WHEN sender_id = ? THEN receiver_id 
        ELSE sender_id 
    END AS receptorId, users.Name_User AS nombreReceptor, COUNT(messages.id) AS totalMensajes FROM messages INNER JOIN users 
ON users.Id_User = CASE 
        WHEN sender_id = ? THEN receiver_id 
        ELSE sender_id 
    END
WHERE sender_id = ? OR receiver_id = ?
GROUP BY receptorId, users.Name_User;");
 $arr=[];

mysqli_stmt_bind_param($stmt, "iiii", $userid, $userid, $userid, $userid);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
while($fila=mysqli_fetch_assoc($resultado)){
$arr[]=$fila;
}

if($arr){
    echo json_encode($arr);
}
else{
    echo json_encode(["msj" => "no hay mensajes"]);
}



?>