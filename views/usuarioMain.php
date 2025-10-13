<?php
require_once "../config/conexion.php";
$idPerfil = isset($_GET['id']) && (int)$_GET['id'] > 0 ? (int)$_GET['id'] : $_SESSION['user_id'];

$filaNombre = null; // 🔹 valor por defecto
$bios = '';   

if (!empty($_SESSION['user_id'])) {
if($idPerfil){


if($_SESSION['user_id'] == $idPerfil){
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT Bio FROM users WHERE id_user = ?";
  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);
  $biosResult = mysqli_stmt_get_result($stmt);
   if(!$biosResult){
      echo json_encode(["error" => "Error en la consulta"]);
      exit; 
    }
    else {
      $bioRow = mysqli_fetch_assoc($biosResult);
      if ($bioRow) {
        $bios = $bioRow['Bio'];
    }

  }
}
else {
$user_id = $idPerfil;
$sql2 = "SELECT Name_User FROM users WHERE id_user = ?";
$stmt=mysqli_prepare($conexion, $sql2);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$nombreResult=mysqli_stmt_get_result($stmt);
if(!$nombreResult){
  echo "Error en la consulta";
  exit;
}
else {
  $filaNombre = mysqli_fetch_assoc($nombreResult);
  if(!$filaNombre){
    echo "El usuario no existe";
    exit;
  }

  $sql = "SELECT Bio FROM users WHERE id_user = ?";
  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "i", $user_id);
  mysqli_stmt_execute($stmt);
  $biosResult = mysqli_stmt_get_result($stmt);
    if(!$biosResult){
      echo json_encode(["error" => "Error en la consulta"]);
      exit; 
    }
    else {
      $bioRow = mysqli_fetch_assoc($biosResult);
      if ($bioRow) {
        $bios = $bioRow['Bio'];
    }
  }
}

}

}
else {
  $idPerfil = $_SESSION['user_id'];
  $user_id = $_SESSION['user_id'];

}

$conexion->close();
}

?>
<link rel="stylesheet" href="../CSS/estilosUsuarios.css">
 <div class="login-container"></div>
   <div id=inventario>
    <a href="index.php?page=inventario">
     <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQfqQz8O3t1-dAgYt3KkRNkgwTbdshrkU2BQ&s" alt="mateo chompi" >
    </a>
    </div>
 <div class="perfil-container">
   <div class="perfil-info">
     <h2>Información del Usuario</h2>
     <h5>Foto de perfil</h5>
     <br>
     <button>Seleccionar Imagen</button>
     <h2>Username </h2>
     <p>visible para todos (obligatorio)</p>
     <input type="text" placeholder="<?php 
     if($_SESSION['user_id'] !== $idPerfil && $filaNombre){
      echo htmlspecialchars($filaNombre['Name_User'] );
     } else
     echo htmlspecialchars($_SESSION['username']); ?>"
     
     required name="nuevoNombre">
     <h2>Bio </h2>
  <textarea rows="4" id="bios"><?php echo htmlspecialchars($bios); ?></textarea>
<?php if ($_SESSION['user_id'] == $idPerfil): ?>
     <button onclick="cambiarDescripcion()">Guardar cambios</button>
<?php endif; ?>
   </div>

   <div class="pokemons">
     <div>
       <h3>Tus Shiny</h3>
       <p>[Espacio vacío para futuros shiny]</p>
     </div>
     <div>
       <h3>Pokémon Favoritos</h3>
     </div>
   </div>

   <div id="sidebar" class="sidebar">
     <div class="sprite-box"><img src="https://via.placeholder.com/100" alt="img pkmn"></div>
     <div class="sprite-box"><img src="https://via.placeholder.com/100" alt="img pkmn"></div>
     <div class="sprite-box"><img src="https://via.placeholder.com/100" alt="img pkmn"></div>
     <div class="sprite-box"><img src="https://via.placeholder.com/100" alt="img pkmn"></div>
   </div>
   <?php if ($_SESSION['user_id'] == $idPerfil): ?>

   
<script src="../JS/perfil.js"></script>

   <?php endif; ?>


   
 </div>
