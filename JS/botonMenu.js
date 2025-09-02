document.addEventListener("DOMContentLoaded", function () {
  const botonMenu = document.getElementById("menu-boton");
  const menu = document.getElementById("menu");

  botonMenu.addEventListener("click", () => {
    menu.classList.toggle("activo");
  });
});