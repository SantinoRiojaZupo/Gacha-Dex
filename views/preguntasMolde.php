
 
<div id= "pregunta">hola</div>
<div id="respuestas">

</div>

<script>
let imagen = <?php echo isset($_GET['imagen']) ? json_encode($_GET['imagen']) : 'null';  ?>;
let nombre = <?php echo isset($_GET['nombre']) ? json_encode($_GET['nombre']) : 'null';  ?>;
let incorrecto1 = <?php echo isset($_GET['incorrecto1']) ? json_encode($_GET['incorrecto1']) : 'null';  ?>;
let incorrecto2 =<?php echo isset($_GET['ioncorrecto2']) ? json_encode($_GET['incorrecto2']) : 'null';  ?>;
let incorrecto3 =<?php echo isset($_GET['incorrecto3']) ? json_encode($_GET['incorrecto3']) : 'null';  ?>;
let respuestas = document.getElementById("respuestas")




</script>