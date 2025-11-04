document.addEventListener("DOMContentLoaded", function () {
  console.log("JS cargado"); //  probar si el archivo se ejecuta
  const botonMenu = document.getElementById("botonMenu");
  const menu = document.getElementById("menu");

  console.log("botonMenu:", botonMenu);
  console.log("menu:", menu);

  if (botonMenu && menu) {
    botonMenu.addEventListener("click", () => {
      console.log("Click detectado");
      if (menu.style.height && menu.style.height !== "0px") {
        menu.style.height = "0"; // cerrar menú
      } else {
        menu.style.height = menu.scrollHeight + "px"; // abrir menú según contenido
      }
    });
  }
});