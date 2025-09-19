document.addEventListener("DOMContentLoaded", function() {
     console.log("JS cargado");
  const botonLogin = document.getElementById("botonPerfil");

  if (botonLogin) {
    botonLogin.addEventListener("click", () => {
        console.log("click en login");
      // Redirige a la misma URL pero con page=registro
      // window.location.href = "index.php?page=registro";
       window.location.href = "index.php?page=perfil"; //cambia a otra pagina distinta y soluciona lo  de superponer todo
      // window.location.href = "../views/login.php";
    });
  }
});