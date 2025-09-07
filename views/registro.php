
  <div class="login-container">
    <img src="recursos/Master-Ball.webp" alt="Logo" class="logo" />
    <h2>Registrarse</h2>

    <!-- Formulario de registro -->
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

      <button id= "botonRegistro">Registrarse</button>
    </form>

    <div class="register-link">
      ¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a>
    </div>
  </div>
  <?php
if(!empty($_POST["Usuario"]) && !empty($_POST["contraseña"])){
    $usuario = $_POST["Usuario"];
    $contraseña = $_POST["contraseña"];
    $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')";
    if(mysqli_query($conexion, $sql)) { 
        echo json_encode(["msj" => "Todo bien"]);
   } else {
        echo json_encode(["error" => "Fallo la consulta","msj" => "Fallo la consulta"]);
    }
} else {
   echo json_encode(["error" => "No se recibieron parametros", "msj" => "faltan Usuario o Contraseña"]);
}

?>