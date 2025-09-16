document.addEventListener("DOMContentLoaded", function() {
     console.log("JS cargado");
  const botonLogin = document.getElementById("botonLogin");

  if (botonLogin) {
    botonLogin.addEventListener("click", () => {
        console.log("click en login");
      // Redirige a la misma URL pero con page=registro
      // window.location.href = "index.php?page=registro";
      window.location.href = "index.php?page=Login"; //cambia a otra pagina distinta y soluciona lo  de superponer todo
    });
  }
});