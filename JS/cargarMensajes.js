let receptor = null;
function cargarMensajes() {
if (!receptor) return;

fetch('chatCargar.php?receptor=' + receptor)
.then(response => response.json())
.then (data => {
    
    const contenedorMensaje = document.querySelector('.messages');
    contenedorMensaje.innerHTML = ''; // Limpia mensajes previos
    const mensajes= document.getElementsByClassName("messages")
    data.forEach(mensaje => {
        
            const mensajeDiv = document.createElement("div");
            if(mensaje.idEmisor === usuarioActual){
                
                mensajeDiv.classList.add('message-right')
            }
            else {
                mensajeDiv.classList.add('message-left')
            }
             mensajeDiv.textContent = mensaje.message;
             contenedorMensaje.appendChild(mensajeDiv);
            
        
       
    })
})
}