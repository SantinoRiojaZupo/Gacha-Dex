botonChat = document.getElementById("iniciarChat");
if(botonChat){
botonChat.addEventListener('click', () => {
window.location.href = `index.php?page=chat&usuario=${nombreUsuario}&id=${idUsuario}&idLogueado=${idUsuarioLogueado}`;
})
}