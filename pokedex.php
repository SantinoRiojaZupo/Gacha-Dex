<?php
// Inicia la sesión para poder usar $_SESSION y verificar el usuario
session_start();

// Incluye la conexión a la base de datos
require_once __DIR__ . '/config/conexion.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, devuelve un JSON con mensaje y termina la ejecución
    echo json_encode(["msj"=>"No logueado"]);
    exit;
}

// Guarda el ID del usuario logueado en una variable
$idusuario = $_SESSION['user_id'];

// Obtener la gen dependiendo del id
function obtenerGeneracion($id) {
    $rangos = [
        1 => [1, 151],
        2 => [152, 251],
        3 => [252, 386],
        4 => [387, 493],
        5 => [494, 649],
        6 => [650, 721],
        7 => [722, 809],
        8 => [810, 905],
        9 => [906, 1025]
    ];
    foreach ($rangos as $gen => [$min, $max]) {
        if ($id >= $min && $id <= $max) return $gen;
    }
    return null;
}

// Consulta SQL para obtener todos los Pokémon de la Pokedex
// y marcar cuáles el usuario ya atrapó
$sql1= "
SELECT 
datapokemonall.Id_Pokedex,
    datapokemonall.PokemonName,        -- Nombre del Pokémon
        datapokemonall.Type,
    datapokemonall.image,              -- URL de la imagen del Pokémon
    CASE 
        WHEN COUNT(pokemoncatched.Id_PokemonCatched) > 0 THEN 1  -- Si el usuario atrapó al menos uno
        ELSE 0                                                    -- Si no lo atrapó
    END AS tiene
FROM datapokemonall
LEFT JOIN pokemoncatched 
    ON datapokemonall.Id_Pokedex = pokemoncatched.Id_Pokedex  -- Relaciona el Pokémon con los atrapados
    AND pokemoncatched.Id_User = $idusuario                   -- Solo para este usuario
GROUP BY datapokemonall.Id_Pokedex                            -- Agrupa por Pokémon para evitar duplicados
ORDER BY datapokemonall.Id_Pokedex;                           -- Ordena por número de la Pokedex
";

// Ejecuta la consulta en la base de datos
$result=mysqli_query($conexion, $sql1);

// Array para almacenar los resultados de la consulta
$arr=[];
$idpokedex=0;

// Si la consulta devuelve al menos una fila
if(mysqli_num_rows($result) > 0){
    // Recorre todas las filas y las agrega al array
    while($fila=mysqli_fetch_assoc($result)){
        $idpokedex=$fila['Id_Pokedex'];
        $fila['image']="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/".$idpokedex.".png";

        $arr[]=$fila;
    }
}

// Si el array tiene datos, los devuelve en formato JSON
if($arr){
    echo json_encode($arr);
}
// Si no hay datos, devuelve un mensaje de error
else{
    echo json_encode(["msj"=>"mal ahi amigo"]);
}

?>