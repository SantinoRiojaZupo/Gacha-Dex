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
    </ul>
    
</div>
    <div class="header-right">
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="user-profile">
            <button id="botonPerfil">Perfil</button>
            <span class="saludo">¡Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>


            <a href="logout.php">Cerrar Sesión</a>

        </div>
    <?php else: ?>
    <button id="botonRegister">Registrate!</button>
    <button id="botonLogin">Inicie sesion!</button>
    <?php endif; ?>
    <input type="search" id="buscadorPokemon" placeholder="Buscar...">
    <button id="buscarPokemon">Busca ya!</button>
</div>
</div>