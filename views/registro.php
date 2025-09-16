  <link rel="stylesheet" href="../CSS/Registro.css" /><!-- cambie la conexion -->
  
  <div class="login-container">
    <img src="../imagenes/Master-Ball.png" alt="Logo" class="logo" />

    <h2>Registrarse</h2>

    <!-- Formulario de registro -->
    <form id="formRegistro" autocomplete="off">
      <div class="form-group">
        <label for="Usuario">Nombre de Usuario</label>
        <input id="Usuario" name="Usuario" required />
      </div>

      <div class="form-group">
        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" required />
      </div>

      <div class="form-group">
        <label for="contraseña-2">Confirmar contraseña</label>
        <input type="password" id="contraseña-2" name="contraseña-2" placeholder="Repite tu contraseña" required />
      </div>

      <button type="button" id="botonRegistro" onclick="registrarse()">Registrarse</button>
    </form>
    <div class="register-link">
      ¿Ya tienes cuenta? <a href="/Gacha-Dex/views/index.php?page=Login">Inicia sesión</a>
    </div>
    <?php if (isset($_GET['exito'])): ?>
    <div class="success-message">
      <p>Registro exitoso. ¡Ahora puedes iniciar sesión!</p>
    </div>
    <?php endif; ?>
    <script src="../JS/registro-js.js"></script>
  </div>