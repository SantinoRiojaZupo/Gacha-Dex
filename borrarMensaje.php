<?php
require_once __DIR__ . '/config/conexion.php';

// Permitir GET o POST simple con ?id=...
$id = isset($_GET['id']) ? intval($_GET['id']) : (isset($_POST['id']) ? intval($_POST['id']) : null);

if (!$id) {
    http_response_code(400);
    echo json_encode([
        'error' => true,
        'mensaje' => 'Se requiere el ID del mensaje en la URL'
    ]);
    exit();
}

// Nombre de la tabla y columna que asumimos; ajusta si en tu DB se llama diferente
$tableParam = isset($_GET['table']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table']) : (isset($_POST['table']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['table']) : null);

$tableCandidates = ['messages', 'mensajes', 'chat', 'messages_table'];
$deleted = false;
$lastError = '';

// Si el cliente envía el nombre de la tabla, intentamos usarlo primero (saneado)
if ($tableParam) {
    $tableCandidates = array_merge([$tableParam], $tableCandidates);
}

foreach ($tableCandidates as $table) {
    // evitar names peligrosos
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $table)) continue;

    $sql = "DELETE FROM `$table` WHERE `id` = ?";
    $stmt = @mysqli_prepare($conexion, $sql);
    if (!$stmt) {
        // registrar error y probar siguiente tabla
        $lastError = mysqli_error($conexion);
        continue;
    }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    if (!mysqli_stmt_execute($stmt)) {
        $lastError = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        continue;
    }

    $affected = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($affected > 0) {
        $deleted = true;
        http_response_code(200);
        echo json_encode([
            'error' => false,
            'mensaje' => 'Mensaje eliminado exitosamente',
            'tabla' => $table,
            'id' => $id
        ]);
        exit();
    }
}

if (!$deleted) {
    http_response_code(404);
    echo json_encode([
        'error' => true,
        'mensaje' => 'No se pudo eliminar el mensaje. Ninguna tabla candidata contenía el id (verifica nombre de tabla o id).',
        'error_detalle' => $lastError
    ]);
    exit();
}
