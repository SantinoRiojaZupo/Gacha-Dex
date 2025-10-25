    console.log("agregar chat xfxdxdxd")
    let Usuarios=document.getElementById('users-list')
Usuarios.innerHTML = ""
if(idUsuarioLogueado&&idUsuario&&nombreUsuario){
if(idUsuarioLogueado!==idUsuario){
let division=document.createElement('div')
division.classList.add('user-item')
division.id=idUsuario
division.innerText=nombreUsuario
Usuarios.appendChild(division)
}
}

fetch()