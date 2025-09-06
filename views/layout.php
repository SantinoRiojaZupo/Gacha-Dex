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
    <script src="../JS/botonMenu.js"></script>    
</body>
<footer>
  <?php
  include($vistafooter);
  ?>
        </footer>
</html>

