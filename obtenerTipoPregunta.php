<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';

$tipoPregunta = $_GET['pregunta'];
$arr1=[];
$arr2=[];

if($tipoPregunta){

if($tipoPregunta == 1){

 $sql ="SELECT Image,Id_Pokedex,pokemonName FROM datapokemonall
 ORDER BY 
 RAND()
  LIMIT 1;";

  $resultado = mysqli_query($conexion, $sql);
  $fila=mysqli_fetch_assoc($resultado);
  $nombrePokemo = $fila['pokemonName'];
  $nombrePokemon=strtolower($nombrePokemo);
    $fila['Image'] = "https://img.pokemondb.net/sprites/home/normal/2x/${nombrePokemon}.jpg";
  $arr1[]=$fila;
$idAExcluir = $fila['Id_Pokedex'];

  $sql="SELECT pokemonName FROM datapokemonall
  WHERE Id_Pokedex != $idAExcluir
  ORDER BY 
  RAND()
  LIMIT 3;";

$resultado2= mysqli_query($conexion, $sql);
while($fila=mysqli_fetch_assoc($resultado2)){
    $arr2[]=$fila;
}

if($arr1 && $arr2){
echo json_encode(["correcto"=>$arr1,
"incorrectos"=> $arr2]);

}
else{
  echo json_encode(["msj"=> "no se pudo pa"]);
}
}
else if ($tipoPregunta == 2);
{
$sql = "SELECT Id_Pokedex, Image, PokemonName, Description 
FROM datapokemonall
ORDER BY 
RAND() LIMIT 1;";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
$nombrePokemo = $fila['pokemonName'];
$nombrePokemon= strtolower($nombrePokemo);
$fila['Image'] = "https://img.pokemondb.net/sprites/home/normal/2x/${nombrePokemon}.jpg";
$arr1[] = $fila;
$sql = "SELECT PokemonName, Image FROM
 datapokemonall 
 ORDER BY 
 RAND() LIMIT 3;";
 $resultado = mysqli_query($conexion, $sql);
 while($fila = mysqli_fetch_assoc($resultado)){
  $nombrePokemo = $fila['pokemonName'];
  $nombrePokemon = strtolower($nombrePokemo);
  $fila['Image'] = "https://img.pokemondb.net/sprites/home/normal/2x/${nombrePokemon}.jpg";
$arr2[]=$fila;
 }

 if($arr1 && $arr2){
  echo json_encode([
 "correcto" => $arr1,
 "incorrectos" => $arr2

  ]);
 }
 else {
  echo json_encode(["msj" => "no se pudo pa"]);
 }
 
}


}
else{
    echo json_encode(["msj" => "Error de informacion."]);
}


?>