<?php
include 'conexion.php';

$id = isset($_GET["id"]) ? intval($_GET["id"]) : null;

if (!$id) {
    http_response_code(400);
    echo json_encode([
        "error" => true,
        "mensaje" => "Se requiere el ID del director en la URL"
    ]);
    exit();
}

$sql = "DELETE FROM users WHERE Id_User = ?";
$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "error" => true,
        "mensaje" => "Error en la preparación de la consulta: " . mysqli_error($conexion)
    ]);
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                http_response_code(200);
                echo json_encode([
                    "error" => false,
                    "mensaje" => "Usuario eliminado exitosamente",
                    "id" => $id
                ]);
            } else {
                http_response_code(404);
                echo json_encode([
                    "error" => true,
                    "mensaje" => "Usuario no encontrado"
                ]);
            }
        } else {
            http_response_code(500);
            echo json_encode([
                "error" => true,
                "mensaje" => "Error al eliminar Usuario"
            ]);
        }
        
        mysqli_stmt_close($stmt);
        