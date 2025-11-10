<?php
require_once __DIR__ . '/../config/conexion.php';

// Solo aceptar POST con JSON
$metodo = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json; charset=utf-8');

if ($metodo !== 'POST') {
    if ($metodo === 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $res = mysqli_query($conexion, "SELECT * FROM variant_pokemon WHERE Id_Variant = $id");
        $row = mysqli_fetch_assoc($res);
        ?>
        <form method="POST">
        Id Pokedex: <input name="Id_Pokedex" value="<?= htmlspecialchars($row['Id_Pokedex'] ?? '', ENT_QUOTES) ?>"><br>
        Nombre Variante: <input name="PokemonName" value="<?= htmlspecialchars($row['PokemonName'] ?? '', ENT_QUOTES) ?>"><br>
        Tipo: <input name="Type" value="<?= htmlspecialchars($row['Type'] ?? '', ENT_QUOTES) ?>"><br>
        Segundo Tipo: <input name="Second_Type" value="<?= htmlspecialchars($row['Second_Type'] ?? '', ENT_QUOTES) ?>"><br>
        Debilidades: <input name="Weaknesses" value="<?= htmlspecialchars($row['Weaknesses'] ?? '', ENT_QUOTES) ?>"><br>
        Descripción: <textarea name="Description"><?= htmlspecialchars($row['Description'] ?? '', ENT_QUOTES) ?></textarea><br>
        Habilidad: <input name="Abilities" value="<?= htmlspecialchars($row['Abilities'] ?? '', ENT_QUOTES) ?>"><br>
        Habilidad Secundaria: <input name="Second_Abilities" value="<?= htmlspecialchars($row['Second_Abilities'] ?? '', ENT_QUOTES) ?>"><br>
        Habilidad Oculta: <input name="Abilities_Hidden" value="<?= htmlspecialchars($row['Abilities_Hidden'] ?? '', ENT_QUOTES) ?>"><br>
        Image: <input name="Image" value="<?= htmlspecialchars($row['Image'] ?? '', ENT_QUOTES) ?>"><br>
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

$id = isset($data['Id_Variant']) ? intval($data['Id_Variant']) : 0;
if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => true, 'mensaje' => 'Id de variante inválido']);
    exit();
}

// Sanitizar campos
$fieldsToSanitize = ['PokemonName','Type','Second_Type','Weaknesses','Description','Abilities','Second_Abilities','Abilities_Hidden','Image','Gender'];
foreach ($fieldsToSanitize as $f) {
    $data[$f] = isset($data[$f]) ? trim($data[$f]) : null;
}
$data['Id_Pokedex'] = isset($data['Id_Pokedex']) ? intval($data['Id_Pokedex']) : null;

// Construir actualización dinámica
$fields = [];
$params = [];
$types = '';

$fieldMappings = [
    'Id_Pokedex' => 'i',
    'PokemonName' => 's',
    'Type' => 's',
    'Second_Type' => 's',
    'Weaknesses' => 's',
    'Description' => 's',
    'Abilities' => 's',
    'Second_Abilities' => 's',
    'Abilities_Hidden' => 's',
    'Image' => 's',
    'Gender' => 's'
];

foreach ($fieldMappings as $field => $type) {
    if (array_key_exists($field, $data) && $data[$field] !== null && $data[$field] !== '') {
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

$sql = 'UPDATE variant_pokemon SET ' . implode(', ', $fields) . ' WHERE Id_Variant = ?';
$params[] = $id;
$types .= 'i';

$stmt = mysqli_prepare($conexion, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => true, 'mensaje' => 'Error en la preparación: ' . mysqli_error($conexion), 'sql' => $sql]);
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
    http_response_code(200);
    echo json_encode(['error' => false, 'mensaje' => 'Variante actualizada', 'affected' => $affected]);
} else {
    http_response_code(500);
    echo json_encode(['error' => true, 'mensaje' => 'Error al ejecutar la actualización: ' . mysqli_error($conexion), 'sql' => $sql]);
}

mysqli_stmt_close($stmt);

