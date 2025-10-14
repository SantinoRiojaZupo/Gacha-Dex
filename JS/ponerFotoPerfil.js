function ponerFotoPerfil(a){
    const foto = document.getElementById(a)
    const imagen = foto.src
    fetch("/Gacha-Dex/usuario.php",{
        method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "foto=" + encodeURIComponent(imagen)

})
document.getElementById("imagenPerfil").innerHTML= `<img src="${imagen}" alt="imagen1"></img>`
}