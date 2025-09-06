document.addEventListener("DOMContentLoaded", function () {
  const botonMenu = document.getElementById("botonMenu");
  const menu = document.getElementById("menu");

  if (botonMenu && menu) {
    botonMenu.addEventListener("click", () => {
      if (menu.style.height && menu.style.height !== "0px") {
        menu.style.height = "0"; // cerrar menú
      } else {
        menu.style.height = menu.scrollHeight + "px"; // abrir menú según contenido
      }
    });
  }
});