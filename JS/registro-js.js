<<<<<<< HEAD
document.getElementById("botonRegister").addEventListener("click", () => {
        console.log("hola")
=======
document.getElementById("botonRegistro").addEventListener("click", () => {
    console.log("hola")
>>>>>>> 5d239f981a45ed7328f8a20d3eb2d344cbd5af67
    const Usua = document.querySelector('[name="Usuario"]').value;
    const Contra = document.querySelector('[name="contraseña"]').value;
    const Contra2 = document.querySelector('[name="contraseña-2"]').value;
    if (Usua && Contra) {
        if (Contra !== Contra2) {
            console.log("Las contraseñas no coinciden");
            return;
        }
        fetch("../views/registro-backend.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "Usuario=" + encodeURIComponent(Usua) + "&contraseña=" + encodeURIComponent(Contra)
        }) //POST
            .then(res => res.json())
            .then(res => {
                if (res.error) {
                    // Muestra el error en la página
                    mostrarMensaje(res.msj, false);
                } else {
                    mostrarMensaje("Registro exitoso. ¡Ahora puedes iniciar sesión!", true);
                }
            });
    } else {
        console.log("Escribi algo");
    }
})
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