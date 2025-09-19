<!DOCTYPE html>
<html lang="en">
<head>
  <?php
   include($vistaHead);
 ?>
</head>

<body>
<header>
  <?php
 if(isset($vistaHeader)){
           include($vistaHeader);
          } 
          else {
            "<p>Página no encontrada</p>";
          }
          ?>
</header>    
    <main>
        <?php
          if(isset($vista)){
           include($vista);
          } 
          else {
            "<p>Página no encontrada</p>";
          }


        ?>
</main>
<script src="<?= $vistaJsBoton ?>"></script> 
<script src="<?= $vistaBotonRegistro

?>" > </script>
<script src="<?= $vistaBotonLogin

?>" > </script>
<script src="<?= $vistaBotonPerfil

?>" > </script>

<?php if (isset($registroFunciones)) : ?>
    <script src="<?= $registroFunciones ?>"></script>
<?php endif; ?>

</body>
<footer>
  <?php
  include($vistafooter);
  ?>
        </footer>
</html>

