    let Usuarios=document.getElementById('usersList')
Usuarios.innerHTML = ""
if(idUsuariologueado&&idUsuario&&nombreUsuario){
if(idUsuariologueado!==idUsuario){

let division=document.createElement('div')
division.classList.add('user-item')
division.id=idUsuario
division.innerText=nombreUsuario
Usuarios.appendChild(division)
}
}