<?php
require_once("../config/conexion.php");

$sql1= "SELECT * FROM datapokemonall";
$result=mysqli_query($conexion, $sql1);
$arr=[];

if(mysqli_num_rows($result) > 0){
     while($fila=mysqli_fetch_assoc($result)){
        $arr[]=$fila;
     }

}

if($arr){
    echo json_encode($arr);
}
else{
    echo json_encode(["msj"=>"mal ahi amigo"]);
}

?>