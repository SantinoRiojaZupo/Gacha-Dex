    console.log("agregar chat xfxdxdxd")
    let Usuarios=document.getElementById('users-list')
Usuarios.innerHTML = ""
if (!idUsuario || !nombreUsuario) {
    fetch(`../obtenerChats.php?user_id=${idUsuarioLogueado}`)
    .then(res => res.json())
    .then(data => {
        if(Array.isArray(data) && data.length > 0){
            data.forEach(element => {
                let division = document.createElement('div');
                division.classList.add('user-item');
                division.id = element.receptorId;
                division.innerText = element.nombreReceptor;
                Usuarios.appendChild(division);
                division.addEventListener('click', () => {
    receptor = division.id;
    cargarMensajes();
});
            });
        } else {
            Usuarios.innerText = "¿Con quién vas a conectar? ¡Con amigos es más divertido!";
        }
    });
} else {
     fetch(`../obtenerChats.php?user_id=${idUsuarioLogueado}`)
    .then(res => res.json())
    .then(data => {
        if(Array.isArray(data) && data.length > 0){
            data.forEach(element => {
                let division = document.createElement('div');
                division.classList.add('user-item');
                division.id = element.receptorId;
                division.innerText = element.nombreReceptor;
                Usuarios.appendChild(division);
                division.addEventListener('click', () => {
    receptor = division.id;
    cargarMensajes();
});
            });
        } else {
            Usuarios.innerText = "¿Con quién vas a conectar? ¡Con amigos es más divertido!";
        }
    });
}