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
    // Si se pide con GET y viene id, mostrar la página de edición simple (retrocompatibilidad)
    if ($metodo === 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $res = mysqli_query($conexion, "SELECT * FROM datapokemonall WHERE Id_Pokedex = $id");
        $row = mysqli_fetch_assoc($res);
        ?>
        <form method="POST">
        Nombre Pokemon: <input name="Nombre_Pokemon" value="<?= htmlspecialchars($row['Nombre_Pokemon'] ?? '', ENT_QUOTES) ?>"><br>
        Tipo: <input name="Type" value="<?= htmlspecialchars($row['Type'] ?? '', ENT_QUOTES) ?>"><br>
        Segundo Tipo: <input name="Second_Type" value="<?= htmlspecialchars($row['Second_Type'] ?? '', ENT_QUOTES) ?>"><br>
        Debilidades: <input name="Weaknesses" value="<?= htmlspecialchars($row['Weaknesses'] ?? '', ENT_QUOTES) ?>"><br>
        Descripción: <textarea name="Description"><?= htmlspecialchars($row['Description'] ?? '', ENT_QUOTES) ?></textarea><br>
        Habilidad: <input name="Abilities" value="<?= htmlspecialchars($row['Abilities'] ?? '', ENT_QUOTES) ?>"><br>
        Habilidad Secundaria: <input name="Second_Abilities" value="<?= htmlspecialchars($row['Second_Abilities'] ?? '', ENT_QUOTES) ?>"><br>
        Habilidad Oculta: <input name="Abilities_Hidden" value="<?= htmlspecialchars($row['Abilities_Hidden'] ?? '', ENT_QUOTES) ?>"><br>
        Género: <input name="Gender" value="<?= htmlspecialchars($row['Gender'] ?? '', ENT_QUOTES) ?>"><br>
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

$id = isset($data['Id_Pokedex']) ? intval($data['Id_Pokedex']) : 0;
if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'Id de Pokemon inválido']);
    exit();
}

// Sanitizar los campos
$data['PokemonName'] = isset($data['PokemonName']) ? trim($data['PokemonName']) : '';
$data['Type'] = isset($data['Type']) ? trim($data['Type']) : '';
$data['Second_Type'] = isset($data['Second_Type']) ? trim($data['Second_Type']) : '';
$data['Weaknesses'] = isset($data['Weaknesses']) ? trim($data['Weaknesses']) : '';
$data['Description'] = isset($data['Description']) ? trim($data['Description']) : '';
$data['Abilities'] = isset($data['Abilities']) ? trim($data['Abilities']) : '';
$data['Second_Abilities'] = isset($data['Second_Abilities']) ? trim($data['Second_Abilities']) : '';
$data['Abilities_Hidden'] = isset($data['Abilities_Hidden']) ? trim($data['Abilities_Hidden']) : '';
$data['Gender'] = isset($data['Gender']) ? trim($data['Gender']) : '';

// Construir actualización dinámica
$fields = [];
$params = [];
$types = '';

// Mapeo de campos a actualizar
$fieldMappings = [
    'PokemonName' => 's',
    'Type' => 's',
    'Second_Type' => 's',
    'Weaknesses' => 's',
    'Description' => 's',
    'Abilities' => 's',
    'Second_Abilities' => 's',
    'Abilities_Hidden' => 's',
    'Gender' => 's'
];

foreach ($fieldMappings as $field => $type) {
    if (isset($data[$field])) {
        $fields[] = "$field = ?";
        $params[] = $data[$field];
        $types .= $type;
    }
}

if (count($fields) === 0) {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'No hay campos para actualizar']);
    exit();
}

$sql = 'UPDATE datapokemonall SET ' . implode(', ', $fields) . ' WHERE Id_Pokedex = ?';
$params[] = $id;
$types .= 'i';

$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'mensaje' => 'Error en la preparación: ' . mysqli_error($conexion),
        'sql' => $sql
    ]);
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
        echo json_encode(['error' => false, 'mensaje' => 'Pokemon actualizado', 'affected' => $affected]);
    } else {
        http_response_code(200);
        echo json_encode(['error' => false, 'mensaje' => 'Sin cambios (el Pokemon pudo no existir)']);
    }
} else {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'mensaje' => 'Error al ejecutar la actualización: ' . mysqli_error($conexion),
        'sql' => $sql
    ]);
}

mysqli_stmt_close($stmt);
