document.getElementById("iniciarChat").addEventListener('click', () => {
window.location.href = `index.php?page=chat&usuario=${nombreUsuario}&id=${idUsuario}&idLogueado=${idUsuarioLogueado}`;
})