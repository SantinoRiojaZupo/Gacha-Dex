<!DOCTYPE html>
<html lang="es">
<head>
  
    <script src="registro-js.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrarse</title>

</head>
<body>
  <div class="login-container">
    <img src="recursos/Master-Ball.webp" alt="Logo" class="logo" />
    <h2>Registrarse</h2>

    <!-- Formulario de registro -->
    <form action="../php/registro.php" method="POST">
      <div class="form-group">
        <label for="Usuario">Nombre de Usuario</label>

        <input name="Usuario" required />
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="contraseña" required />
      </div>

      <div class="form-group">
        <label for="password2">Confirmar contraseña</label>
        <input type="password" name="contraseña-2" placeholder="Repite tu contraseña" required />
      </div>

      <button type="submit" class="login-button">Registrarse</button>
    </form>

    <div class="register-link">
      ¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a>
    </div>
  </div>
</body>
<?php
if(!empty($_POST["usuario"]) && !empty($_POST["contraseña"])){
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$constraseña')";
    if(mysqli_query($con, $sql)) {
        echo json_encode(["msj" => "Todo bien"]);
    } else {
        echo json_encode(["error" => "Fallo la consulta","msj" => "Fallo la consulta"]);
    }
} else {
    echo json_encode(["error" => "No se recibieron parametros", "msj" => "Envia el nombre de algun director"]);
}

?>