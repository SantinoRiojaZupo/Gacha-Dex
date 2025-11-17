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
        <li id="li1" >Pagina Principal</li>
        <?php if(!isset($_SESSION['user_id'])): ?>
        <li id="li4">Registro</li>
        <li id="li5">INICIO DE SESION</li>
        <?php endif; ?>
        <li id="li2">Pokedex</a></li>
        <li id="li3">Chat</a></li>
        <?php if($_SESSION['Rol'] == 1):?>
        <li id="li6">CRUD</a></li>
        <?php endif; ?>
    </ul>
   
</div>
    <div class="header-right">
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="user-profile">
            <button id="botonPerfil">Perfil</button>
            <span class="saludo">¡Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>


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
    <?php endif; ?>


</div>
</div>
