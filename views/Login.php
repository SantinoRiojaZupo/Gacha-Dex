<link rel="stylesheet" href="../CSS/estiloLogin.css" />
  <div class="login-container">
    <img src="../imagenes/Master-Ball.png" alt="Logo" class="logo" />
    <h2>Iniciar Sesión</h2>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="Usuario">Nombre De Usuario</label>
        <input type="USUARIO" id="emLogin" name="USER"  required />
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="passwordLogin" name="password" required />
      </div>
      <button type="button" id="boton-Login">Entrar</button>
    </form>
    <div class="register-link">
      ¿No tienes cuenta? <a href="http://localhost/Gacha-Dex/views/index.php?page=registro">Regístrate</a>
    </div>
  </div>