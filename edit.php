<?php
require_once __DIR__ . '/config/conexion.php';
if (!isset($conexion) || !$conexion) {
    http_response_code(500);
    echo json_encode(['error' => true, 'mensaje' => 'Error de conexión a la base de datos']);
    exit();
}

// Solo aceptar POST con JSON
$metodo = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json; charset=utf-8');

if ($metodo !== 'POST') {
    // Si se pide con GET y viene id, mostrar la página de edición simple
    if ($metodo === 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $res = mysqli_query($conexion, "SELECT * FROM users WHERE Id_User = $id");
        $row = mysqli_fetch_assoc($res);
        ?>
        <form method="POST">
        Nombre: <input name="Name_User" value="<?= htmlspecialchars($row['Name_User'] ?? '', ENT_QUOTES) ?>"><br>
        Contraseña: <input name="User_Password" value="<?= htmlspecialchars($row['User_Password'] ?? '', ENT_QUOTES) ?>"><br>
        Bio: <input name="Bio" value="<?= htmlspecialchars($row['Bio'] ?? '', ENT_QUOTES) ?>"><br>
        Pity: <input name="Pity" value="<?= htmlspecialchars($row['Pity'] ?? '', ENT_QUOTES) ?>"><br>
        <input type="submit" value="Guardar">
        </form>
        <?php
        exit();
    }

    http_response_code(405);
    echo json_encode(['error' => true, 'mensaje' => 'Método no permitido']);
    exit();
}

$body = file_get_contents('php://input');
$data = json_decode($body, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'JSON inválido']);
    exit();
}

$id = isset($data['Id_User']) ? intval($data['Id_User']) : 0;
if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'Id de usuario inválido']);
    exit();
}

// Construir actualización dinámica
$fields = [];
$params = [];
$types = '';

if (isset($data['Name_User']) && strlen(trim($data['Name_User'])) > 0) {
    $fields[] = 'Name_User = ?';
    $params[] = trim($data['Name_User']);
    $types .= 's';
}


if (isset($data['User_Password']) && strlen($data['User_Password']) > 0) {
    $fields[] = 'User_Password = ?';
    
    $plain = $data['User_Password'];
    $params[] = $plain;
    $types .= 's';
}

if (isset($data['Bio'])) {
    $fields[] = 'Bio = ?';
    $params[] = $data['Bio'];
    $types .= 's';
}

if (isset($data['Pity'])) {
    $fields[] = 'Pity = ?';
    $params[] = $data['Pity'];
    $types .= 's';
}

if (count($fields) === 0) {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'No hay campos para actualizar']);
    exit();
}

$sql = 'UPDATE users SET ' . implode(', ', $fields) . ' WHERE Id_User = ?';
$params[] = $id;
$types .= 'i';

$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => true, 'mensaje' => 'Error en la preparación: ' . mysqli_error($conexion)]);
    exit();
}

// Bind dinámico
$bind_names[] = $types;
for ($i = 0; $i < count($params); $i++) {
    $bind_name = 'bind' . $i;
    $$bind_name = $params[$i];
    $bind_names[] = &$$bind_name;
}
call_user_func_array('mysqli_stmt_bind_param', array_merge([$stmt], $bind_names));

if (mysqli_stmt_execute($stmt)) {
    $affected = mysqli_stmt_affected_rows($stmt);
    if ($affected > 0) {
        http_response_code(200);
        echo json_encode(['error' => false, 'mensaje' => 'Usuario actualizado', 'affected' => $affected]);
    } else {
        http_response_code(200);
        echo json_encode(['error' => false, 'mensaje' => 'Sin cambios (el usuario pudo no existir)']);
    }
} else {
    http_response_code(500);
    echo json_encode(['error' => true, 'mensaje' => 'Error al ejecutar la actualización: ' . mysqli_error($conexion)]);
}

mysqli_stmt_close($stmt);
