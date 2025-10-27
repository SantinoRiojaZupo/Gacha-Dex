
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../CSS/estilosChat.css">
<title>Chat UI</title>





</head>
<body>




  <div id="container"class="container">
    <div id= "users-list" class="users-list">
      <div id="5" class="user-item">Usuario 1</div>
      <div id="4" class="user-item">Usuario 2</div>
      <div  class="user-item">Usuario 3</div>
      <div  class="user-item">Usuario 4</div>
      <div  class="user-item">Usuario 5</div>
      <div  class="user-item">Usuario 6</div>
      <div  class="user-item">Usuario 7</div>
      <div  class="user-item">Usuario 8</div>
      <div  class="user-item">Usuario 9</div>
      <div  class="user-item">Usuario 10</div>
    </div>


    <div class="chat-area">
      <div class="messages">
        <div class="message-left">Bleh Bleh Bleh Bleh Bleh Bleh...</div>
        <div class="message-right">Blah blah blah blah blah blah blah...</div>
        <div class="message-left">Bleh Bleh Bleh Bleh Bleh Bleh...</div>
        <div class="message-right">Blah blah blah blah blah blah blah...</div>
        <div class="message-left">Bleh Bleh Bleh Bleh Bleh Bleh...</div>
        <div class="message-right">Blah blah blah blah blah blah blah...</div>
        <div class="message-left">Bleh Bleh Bleh Bleh Bleh Bleh...</div>
        <div class="message-right">Blah blah blah blah blah blah blah...</div>
        <div class="message-left">Bleh Bleh Bleh Bleh Bleh Bleh...</div>
        <div class="message-right">Blah blah blah blah blah blah blah...</div>
        <div class="message-left">Bleh Bleh Bleh Bleh Bleh Bleh...</div>
        <div class="message-right">Blah blah blah blah blah blah blah...</div>
      </div>
      <div class="input-area">
        <input type="text" placeholder="Escribí un mensaje acá..." />
        <button id="botonMandar">Enviar</button>
      </div>
    </div>
  </div>

  <script>  
  <?php ?>
const idUsuario = <?php echo isset($_GET['id']) ? json_encode($_GET['id']) : 'null'; ?>;
const nombreUsuario = <?php echo isset($_GET['usuario']) ? json_encode($_GET['usuario']) : 'null';?>;
const idUsuarioLogueado = <?php echo json_encode($_SESSION['user_id']);?>;

  const usuarioActual= <?php echo json_encode($_SESSION['user_id']); ?>;
  </script>
  
  <script src="../JS/AgregarChat.js"> 
 
  </script>
</body>
</html>
