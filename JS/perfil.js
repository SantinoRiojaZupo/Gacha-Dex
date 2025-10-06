function cambiarDescripcion() {
    console.log("click en perfil");
    nuevoNombre = document.querySelector('[name="nuevoNombre"]');
    bios = document.querySelector('[name="bios"]');
    
    if(nuevoNombre!=="" & bios!==""){
    fetch("../views/usuario-backend.php", {
        method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "nuevoNombre=" + encodeURIComponent(nuevoNombre.value) + "&bios=" + encodeURIComponent(bios.value)
        }) //POST
            .then(res => res.json())
            .then(res => {
                if (res.error) {
                    // Muestra el error en la página
                    mostrarMensaje(res.msj, false);
                } else {
                    console.log("puto")
                    mostrarMensaje("Cambio de nombre exitoso.", true);
                }
            });
    } else {
        console.log("Escribi algo");
    }
};
function mostrarMensaje(mensaje, exito) {
    const container = document.querySelector(".login-container");
    if (!container) return;
    // Elimina mensajes anteriores
    const oldMsg = container.querySelector(".success-message, .error-message");
    if (oldMsg) oldMsg.remove();
    // Crea y agrega el nuevo mensaje
    const div = document.createElement("div");
    div.className = exito ? "success-message" : "error-message";
    div.innerHTML = `<p>${mensaje}</p>`;
    container.appendChild(div);
}