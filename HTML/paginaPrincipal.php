<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gacha-Dex</title>
    <!-- conexiones -->
    <link rel="stylesheet" href="../CSS/estilosPaginaPrincipal.css">
    <link rel="stylesheet" href="../CSS/estilosBotonMenu.css">
    <link rel="icon" type="image/png" href="../imagenes/gachadex.png">
</head>

<body>
    <!-- todo lo de abajo es editable pa -->
    <header>
        <div id="barraInicio">
            <button id="botonRegister">
                Registrate!
            </button>
            <button id="botonLogin">
                Inicie sesion!
            </button>
            <input type="search" id="buscadorPokemon" placeholder="Buscar..."><button id="buscarPokemon">Busca
                ya!</button>
            <button id="menu-boton">
                ☰
            </button>
            <ul id="menu" style="display: none;">
                <li><a href="#">Opción 1</a></li>
                <li><a href="#">Opción 2</a></li>
                <li><a href="#">Opción 3</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div>
            <h1>Gacha-Dex</h1>
        </div>
    </main>
    <footer>
        <div id="barraFinal">
            <p><a href="../HTML/creadores.html">Sobre nosotros</p>
            <!--en sitio html deberia estar la pagina que va hacer santi sobre nosotros  -->
        </div>
    </footer>
    
        <script src="../JS/botonMenu.js"></script>
    
</body>

</html>