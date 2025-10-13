<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
$user_id=$_SESSION["user_id"];
 $sql1= "
SELECT datapokemonall.Id_Pokedex,datapokemonall.PokemonName,datapokemonall.image, CASE 
WHEN COUNT(pokemoncatched.Id_PokemonCatched) > 0 THEN END AS tiene
FROM datapokemonall INNER JOIN pokemoncatched ON datapokemonall.Id_Pokedex = pokemoncatched.Id_Pokedex
 AND pokemoncatched.Id_User = $user_id GROUP BY datapokemonall.Id_Pokedex ORDER BY datapokemonall.Id_Pokedex;";
$result=mysqli_query($conexion, $sql1);

$arr=[];
$idpokedex=0;
if(mysqli_num_rows($result) > 0){
    while($fila=mysqli_fetch_assoc($result)){
        $idpokedex=$fila['Id_Pokedex'];
        $fila['image']="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/".$idpokedex.".png";

        $arr[]=$fila;
    }
}
if($arr){
    echo json_encode($arr);
}
else{
    echo json_encode(["msj"=>"no tenes pokemons"]);
}