<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
if (!empty($_POST["nuevoNombre"]) && !empty($_SESSION["user_id"]) || !empty($_POST["bios"])) {
    if (empty($_POST["nuevoNombre"]) && !empty($_POST["bios"])) {
        $_POST["nuevoNombre"] = $_SESSION['username'];
    }
    $usuario = $_POST["nuevoNombre"];
    $user_id = $_SESSION["user_id"];
    $bios = $_POST["bios"];

    // Verificar si el nombre ya existe para otro usuario
    $sql1 = "SELECT name_user FROM users WHERE name_user = ? AND id_user != ?";
    $stmt = mysqli_prepare($conexion, $sql1);
    mysqli_stmt_bind_param($stmt, "si", $usuario, $user_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $fila = mysqli_fetch_assoc($res);

    if ($fila) {
        echo json_encode(["error" => "El usuario ya existe", "msj" => "El usuario ya existe"]);
    } else { //
        // Actualizar el nombre del usuario actual
        $sql = $conexion->prepare("UPDATE users SET name_user = ?, Bio= ?  WHERE id_user = ?");
        $sql->bind_param("ssi", $usuario, $bios, $user_id);
        if ($sql->execute()) {
            $_SESSION['username'] = $usuario;
            //print_r($_SESSION);
            session_write_close();
            echo json_encode(["msj" => "Cambio de nombre exitoso."]);
        } else {
            echo json_encode(["error" => "Fallo la consulta", "msj" => "Fallo la consulta"]);
        }
        $sql->close();
    }
    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(["error" => "Faltan datos", "msj" => "No se recibió el nombre o el usuario no está logueado"]);
}
$user_id = $_SESSION["user_id"];
$sql1 = "
SELECT 
datapokemonall.Id_Pokedex,
    datapokemonall.PokemonName,        
    datapokemonall.image,              
    CASE 
        WHEN COUNT(pokemoncatched.Id_PokemonCatched) > 0 THEN 1                                                  
    END AS tiene
FROM datapokemonall
inner JOIN pokemoncatched 
    ON datapokemonall.Id_Pokedex = pokemoncatched.Id_Pokedex 
    AND pokemoncatched.Id_User = $user_id                  
GROUP BY datapokemonall.Id_Pokedex                            
ORDER BY datapokemonall.Id_Pokedex;";
$result = mysqli_query($conexion, $sql1);

// Array para almacenar los resultados de la consulta
$arr = [];
$idpokedex = 0;

// Si la consulta devuelve al menos una fila
if (mysqli_num_rows($result) > 0) {
    // Recorre todas las filas y las agrega al array
    while ($fila = mysqli_fetch_assoc($result)) {
        $idpokedex = $fila['Id_Pokedex'];
        $fila['image'] = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" . $idpokedex . ".png";

        $arr[] = $fila;
    }
}
if (!empty($_POST["foto"]) && !empty($_SESSION["user_id"])) {
    $foto = $_POST["foto"];
    $sql = "UPDATE users SET Profile_Photo = ?  WHERE id_user = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "si", $foto, $user_id);
    mysqli_stmt_execute($stmt);
}

// Si el array tiene datos, los devuelve en formato JSON
if ($arr) {
    echo json_encode($arr);
}
// Si no hay datos, devuelve un mensaje de error
else {
    echo json_encode(["msj" => "mal ahi amigo"]);
}
