
<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/config/conexion.php';
if (!$conexion) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit;
}
$arr=[];

$idPerfil = isset($_GET['id']) && (int)$_GET['id'] > 0 ? (int)$_GET['id'] : $_SESSION['user_id'];


if (!isset($_SESSION["user_id"]))
{
echo json_encode(["msj" => "no iniciaste sesion"]);
exit;
}
else if ($_SESSION["user_id"] !== $idPerfil){
$user_id = $idPerfil;
$sql1=
"
SELECT datapokemonall.Id_Pokedex, datapokemonall.PokemonName, datapokemonall.image, CASE
WHEN COUNT(pokemoncatched.Id_pokemonCatched) > 0 THEN 1 ELSE 0 END AS tiene
FROM datapokemonall INNER JOIN pokemoncatched ON datapokemonall.Id_Pokedex = pokemoncatched.Id_Pokedex
AND pokemoncatched.Id_User = ? GROUP BY datapokemonall.Id_Pokedex ORDER BY datapokemonall.Id_Pokedex;
";

$idpokedex=0;


$stmt = mysqli_prepare($conexion, $sql1);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$resultado= mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($resultado) > 0){
while($fila=mysqli_fetch_assoc($resultado)){
    $idpokedex= $fila['Id_Pokedex'];
    $fila['Image'] = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/".$idpokedex.".png";
     $arr[]=$fila;

}

if($arr){
echo json_encode($arr);
}
else{
    echo json_encode(["msj"=>"no tenes pokemons"]);
}
    

}



}


else 


{
$user_id=$_SESSION["user_id"];
 $sql1= "
SELECT datapokemonall.Id_Pokedex,datapokemonall.PokemonName,datapokemonall.image, CASE 
WHEN COUNT(pokemoncatched.Id_PokemonCatched) > 0 THEN 1 ELSE 0 END AS tiene
FROM datapokemonall INNER JOIN pokemoncatched ON datapokemonall.Id_Pokedex = pokemoncatched.Id_Pokedex
 AND pokemoncatched.Id_User = $user_id GROUP BY datapokemonall.Id_Pokedex ORDER BY datapokemonall.Id_Pokedex;";
$result=mysqli_query($conexion, $sql1);

$arr=[];
$idpokedex=0;
if(mysqli_num_rows($result) > 0){
    while($fila=mysqli_fetch_assoc($result)){
        $idpokedex=$fila['Id_Pokedex'];
        $fila['Image']="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/".$idpokedex.".png";

        $arr[]=$fila;
    }
}
if($arr){
    echo json_encode($arr);
}
else{
    echo json_encode(["msj"=>"no tenes pokemons"]);
}
}
