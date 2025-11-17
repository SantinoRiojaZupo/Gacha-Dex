document.addEventListener("DOMContentLoaded", function () {

  const botonMenu = document.getElementById("botonMenuDP");
  const menu = document.getElementById("menuDP");

  if (botonMenu && menu) {
    botonMenu.addEventListener("click", () => {
      if (menu.style.height && menu.style.height !== "0px") {
        menu.style.height = "0";
      } else {
        menu.style.height = menu.scrollHeight + "px";
      }
    });
  }
});