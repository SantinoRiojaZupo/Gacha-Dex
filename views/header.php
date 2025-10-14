<?php


require_once "../config/conexion.php";
?>
<div id="barraInicio">
    <a href="index.php?page=main" class="logo">
        <img src="../imagenes/gachadex.png" alt="Pokeball" class="logo-img">
</a>
       
    <div class="header-left">
        <button id="botonMenu">Menú</button>
    <ul id="menu">
        <li>Pagina Principal</li>
        <li>Registro</li>
        <li>INICIO DE SESION</li>
        <li><a href="index.php?page=pokedex">pokedex</a></li>
        <li><a href="index.php?page=chat">Chat</a></li>
    </ul>
   
</div>
    <div class="header-right">
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="user-profile">
            <button id="botonPerfil">Perfil</button>
            <span class="saludo">¡Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>




            <a href="../logout.php">Cerrar Sesión</a>


        </div>
    <?php else: ?>
    <button id="botonRegister">Registrate!</button>
    <button id="botonLogin">Inicie sesion!</button>
    <?php endif; ?>


    <?php if (isset($_SESSION['user_id'])): ?>
    <div class="busqueda">
    <input type="search" id="buscadorUsuario" placeholder="Buscar...">
    <ul id="resultadosBusqueda">


    </ul>
    </div>


    <button id="buscarUsuario">Busca ya!</button>
    <?php endif; ?>


</div>
</div>
