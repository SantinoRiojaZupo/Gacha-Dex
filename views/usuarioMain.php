<?php
require_once "../config/conexion.php";
$bios = "";
if (!empty($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT Bio FROM users WHERE id_user = ?";
  if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($bio_db);
    if ($stmt->fetch()) {
      $bios = $bio_db;
    }
    $stmt->close();
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
     <input type="text" placeholder=<?php echo htmlspecialchars($_SESSION['username']); ?> required name="nuevoNombre">
     <h2>Bio </h2>
  <textarea rows="4" id="bios"><?php echo htmlspecialchars($bios); ?></textarea>
     <button onclick="cambiarDescripcion()">Guardar cambios</button>
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

   <div class="sidebar">
     <div class="sprite-box">Sprite tu pkmn1</div>
     <div class="sprite-box">Sprite tu pkmn2</div>
     <div class="sprite-box">Sprite tu pkmn3</div>
     <div class="sprite-box">Sprite tu pkmn4</div>
   </div>
   <script src="../JS/perfil.js"></script>
 </div>
