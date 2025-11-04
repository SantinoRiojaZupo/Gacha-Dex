<?php
require_once "../config/conexion.php";
$idPerfil = isset($_GET['id']) && (int)$_GET['id'] > 0 ? (int)$_GET['id'] : $_SESSION['user_id'];

$idPerfilNombre = isset($_GET['nombre']) ? (string)$_GET['nombre'] : '';

$filaNombre = null; //  valor por defecto
$bios = '';
$id = $_SESSION["user_id"];

$sql = "SELECT Profile_Photo FROM users WHERE id_user = '$id'";
$resultado = mysqli_query($conexion, $sql);

if ($fila = mysqli_fetch_assoc($resultado)) {
  $foto = $fila["Profile_Photo"];
}

if (!empty($_SESSION['user_id'])) {
  if ($idPerfil) {


    if ($_SESSION['user_id'] == $idPerfil) {
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT Bio FROM users WHERE id_user = ?";
      $stmt = mysqli_prepare($conexion, $sql);
      mysqli_stmt_bind_param($stmt, "i", $user_id);
      mysqli_stmt_execute($stmt);
      $biosResult = mysqli_stmt_get_result($stmt);
      if (!$biosResult) {
        echo json_encode(["error" => "Error en la consulta"]);
        exit;
      } else {
        $bioRow = mysqli_fetch_assoc($biosResult);
        if ($bioRow) {
          $bios = $bioRow['Bio'];
        }
      }
    } else {
      $user_id = $idPerfil;
      $sql2 = "SELECT Name_User FROM users WHERE id_user = ?";
      $stmt = mysqli_prepare($conexion, $sql2);
      mysqli_stmt_bind_param($stmt, "i", $user_id);
      mysqli_stmt_execute($stmt);
      $nombreResult = mysqli_stmt_get_result($stmt);
      if (!$nombreResult) {
        echo "Error en la consulta";
        exit;
      } else {
        $filaNombre = mysqli_fetch_assoc($nombreResult);
        if (!$filaNombre) {
          echo "El usuario no existe";
          exit;
        }

        $sql = "SELECT Bio FROM users WHERE id_user = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $biosResult = mysqli_stmt_get_result($stmt);
        if (!$biosResult) {
          echo json_encode(["error" => "Error en la consulta"]);
          exit;
        } else {
          $bioRow = mysqli_fetch_assoc($biosResult);
          if ($bioRow) {
            $bios = $bioRow['Bio'];
          }
        }
      }
    }
  } else {
    $idPerfil = $_SESSION['user_id'];
    $user_id = $_SESSION['user_id'];
  }

  $conexion->close();
}

?>
<link rel="stylesheet" href="../CSS/estilosUsuarios.css">
<div class="login-container"></div>
<div id=inventario>
<a href="index.php?page=inventario&id=<?php echo $idPerfil; ?>">
  
    <img src="../imagenes/inventario.png" alt="mateo chompi">
</a>
</div>
<div class="perfil-container">
  <div class="perfil-info">
    <h2>Información del Usuario</h2>
    <h5>Foto de perfil</h5>
    <style>
      /* Fondo gris difuminado */
      #fondo {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
      }

      /* Panel emergente centrado */
      #panel {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border: 2px solid black;
        border-radius: 20px;
        padding: 15px;
        width: 450px;
        max-height: 80vh;
        /* altura máxima del 80% de la pantalla */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        overflow-y: auto;
        /* permite scroll si hay muchas imágenes */
      }

      /* Contenedor de imágenes en fila */
      #imagenes {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 10px;
      }

      #imagenes div {
        margin: 5px;
      }

      img {
        width: 100px;
        height: 100px;
      }

      #cerrarBtn {
        margin-top: 20px;
      }
    </style>
    </head>

    <body>
      <div id=imagenPerfil><img src="<?php echo $foto; ?>"></div>
                 <?php  if($idPerfil !== $_SESSION['user_id']):?> 

      <button id="iniciarChat">Mandar Mensaje</button>

<?php endif; ?>
            <?php  if($idPerfil == $_SESSION['user_id']):?> 

      <button onclick="abrirPanel()">Seleccionar imagen</button>

<?php endif; ?>
      <div id="fondo">
        <div id="panel">
          <div id="imagenes">
            <!-- Agregá o quitá imágenes libremente -->
            <div><button onclick="ponerFotoPerfil(1)"><img src=../imagenes/fotoPerfil1.jpg alt="Imagen 1" id="1"></button></div>
            <div><button onclick="ponerFotoPerfil(2)"><img src=../imagenes/fotoPerfil2.jpg alt="Imagen 2" id="2"></div>
            <div><button onclick="ponerFotoPerfil(3)"><img src=../imagenes/fotoPerfil3.jpg alt="Imagen 3" id="3"></div>
          </div>
          <button id="cerrarBtn" onclick="cerrarPanel()">Cerrar</button>
        </div>
      </div>

      <script>
        function abrirPanel() {
          document.getElementById("fondo").style.display = "block";
        }

        function cerrarPanel() {
          document.getElementById("fondo").style.display = "none";
        }
      </script>
      <h2>Username </h2>
      <p>visible para todos (obligatorio)</p>
      <input type="text" placeholder="<?php
             if ($_SESSION['user_id'] !== $idPerfil && $filaNombre) {
                echo htmlspecialchars($filaNombre['Name_User']);
              } else
              echo htmlspecialchars($_SESSION['username']); ?>"

        required name="nuevoNombre">
        <label id="errores"></label>
      <h2>Bio </h2>
      <textarea rows="4" id="bios"><?php echo htmlspecialchars($bios); ?></textarea>
      <?php if ($_SESSION['user_id'] == $idPerfil): ?>
        <button onclick="cambiarDescripcion()">Guardar cambios</button>
      <?php endif; ?>
  </div>
  <div class="pokemons">
    <div id="espacioShiny">
      <h3>Pokémon Shiny:</h3>
      <p></p>
    </div>
    <div id="espacioFavorito">
      <h3>Pokémon Favoritos:</h3>
      <p></p>
    </div>
  </div>

  <div id="sidebar" class="sidebar">
    <div class="sprite-box"><img src="" alt="img pkmn"></div>
    <div class="sprite-box"><img src="" alt="img pkmn"></div>
    <div class="sprite-box"><img src="" alt="img pkmn"></div>
    <div class="sprite-box"><img src="" alt="img pkmn"></div>
  </div>
  <script>
    const nombreUsuario = <?php echo json_encode((string)$idPerfilNombre); ?>;
    const idUsuario = <?php echo json_encode((int)$idPerfil); ?>;
    const idUsuarioLogueado = <?php echo json_encode((int)$_SESSION['user_id']); ?>;
  </script>
  <script src="../JS/perfil.js"></script>
<script>
  console.log("ID de usuario:", idUsuario);
mostrarImagenPerfil(idUsuario);
</script>  
  <?php if ($_SESSION['user_id'] == $idPerfil): ?>
<script>
mostrarImagenPerfil(idUsuario);
  
</script>
 
    
    <script src="../JS/ponerFotoPerfil.js"></script>

  <?php endif; ?>



</div>