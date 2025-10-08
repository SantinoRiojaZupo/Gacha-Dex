<?php
session_start();
define('VIEWS_PATH', __DIR__ . DIRECTORY_SEPARATOR);


$page=$_GET['page'] ?? "main";

switch ($page) {

  case 'pokedex':
    $vista=VIEWS_PATH . 'pokedex.php';
    $vistaHeader = VIEWS_PATH . 'header.php';
    $vistaJsBoton="/Gacha-Dex/JS/botonMenu.js";
    $vistaBotonRegistro="/Gacha-Dex/JS/botonRegistro.js";
    $registroFunciones="../JS/registro-js.js";
    $vistaBotonLogin="../JS/botonLogin.js";
    $vistaBotonPerfil="../JS/botonPerfil.js";
    $vistaPokedexFunciones="../JS/pokedex.js";
    break;
  case 'main':
    $vistaHeader = VIEWS_PATH . 'header.php';
    $vista = VIEWS_PATH . 'main.php';
    $vistaJsBoton="/Gacha-Dex/JS/botonMenu.js";
    $vistaBotonRegistro="/Gacha-Dex/JS/botonRegistro.js";
    $registroFunciones="../JS/registro-js.js";
    $vistaBotonLogin="../JS/botonLogin.js";
    $vistaBotonPerfil="../JS/botonPerfil.js";
    break; 

    case 'registro':
    $vista=VIEWS_PATH . 'registro.php';
    $vistaJsBoton="../JS/botonMenu.js";
    $vistaBotonRegistro="/Gacha-Dex/JS/botonRegistro.js";
    $registroFunciones="../JS/registro-js.js";
    $vistaBotonLogin="../JS/botonLogin.js";
    break;

    default: 
    $vista = VIEWS_PATH . 'main.php';
    $vistaJsBoton="/Gacha-Dex/JS/botonMenu.js";
    $vistaBotonRegistro="/Gacha-Dex/JS/botonRegistro.js";
    $registroFunciones="../JS/registro-js.js";
    $vistaBotonLogin="../JS/botonLogin.js";
    break;

    case 'Login':
    $vista=VIEWS_PATH . 'Login.php';
    $vistaJsBoton="../JS/botonMenu.js";
    $vistaBotonRegistro="/Gacha-Dex/JS/botonRegistro.js";
    $registroFunciones="../JS/registro-js.js";
    $vistaBotonLogin="../JS/botonLogin.js"; 
    break;

    case 'perfil':
    $vista=VIEWS_PATH . 'usuarioMain.php';
    $vistaHeader = VIEWS_PATH . 'usuarioHeader.php';

    break;
      case 'inventario':
    $vista=VIEWS_PATH . 'inventario.php';
    $vistaHeader = VIEWS_PATH . 'inventarioHeader.php';

    break;


    case 'creadores':
    $vista='creadores.php';
    break;

    case 'benja': 
      $vista='benja.php';
      break;
    case 'santi':
      $vista='santi.php';
      break;
    case 'emiliano':
      $vista='emiliano.php';
      break;
    case 'agus':
      $vista='agus.php';
      break;
    case 'thiago':
      $vista='thiago.php';
      break;
    case 'samuel':
      $vista='samuel.php'; 
      break;
    case 'gael':
      $vista='gael.php'; 
      break;
    case 'ignacio':
      $vista='ignacio.php';
      break;
    
}

$pageHeader=$_GET['header'] ?? "header";

// switch ($pageHeader) {
//   case 'header':
//     $vistaHeader = VIEWS_PATH . 'header.php';
//     break;
//     default: 
//     $vistaHeader = VIEWS_PATH . 'header.php';
//     break;
// }

$pageHead=$_GET['head'] ?? "head";

switch ($pageHead) {
  case 'head':
    $vistaHead = VIEWS_PATH . 'head.php';
    break;
    default: 
    $vistaHead = VIEWS_PATH . 'head.php';
    break;
}

$pagefooter=$_GET['footer'] ?? "footer";

switch ($pagefooter) {
  case 'footer':
    $vistafooter = VIEWS_PATH . 'footer.php';
    break;
    default: 
    $vistafooter = VIEWS_PATH . 'footer.php';
    break;
}
  

include(VIEWS_PATH . 'layout.php');
?>