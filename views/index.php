<?php

define('VIEWS_PATH', __DIR__ . DIRECTORY_SEPARATOR);


$page=$_GET['page'] ?? "paginaPrincipal";

switch ($page) {
  case 'paginaPrincipal':
    $vista = VIEWS_PATH . 'paginaPrincipal.php';
    break;
    default: 
    $vista = VIEWS_PATH . 'paginaPrincipal.php';
    break;
}

$pageHeader=$_GET['header'] ?? "header";

switch ($pageHeader) {
  case 'header':
    $vistaHeader = VIEWS_PATH . 'header.php';
    break;
    default: 
    $vistaHeader = VIEWS_PATH . 'header.php';
    break;
}

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