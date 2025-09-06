document.addEventListener("DOMContentLoaded", function() {
     console.log("JS cargado");
  const botonRegistro = document.getElementById("botonRegister");

  if (botonRegistro) {
    botonRegistro.addEventListener("click", () => {
      // Redirige a la misma URL pero con page=registro
      window.location.href = "index.php?page=registro";
    });
  }
});