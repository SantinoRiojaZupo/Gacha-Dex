
const users = document.querySelectorAll('.user-item');
const botonMandar = document.getElementById('botonMandar');
const inputMensaje = document.querySelector('.input-area input');

users.forEach(user => {
    user.addEventListener('click', () => {
        receptor = user.id; // actualizar receptor
        cargarMensajes();   // cargar mensajes al seleccionar usuario
    });
});

botonMandar.addEventListener('click', () => {
    if (!receptor || !inputMensaje.value) return;

    fetch("../chat-backend.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "receptor=" + encodeURIComponent(receptor) + "&mensaje=" + encodeURIComponent(inputMensaje.value)
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        inputMensaje.value = '';
        cargarMensajes(); // recargar mensajes
    });
});