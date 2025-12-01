function registrarse(){
    const Usua = document.querySelector('[name="Usuario"]').value;
    const Contra = document.querySelector('[name="contraseña"]').value;
    const Contra2 = document.querySelector('[name="contraseña-2"]').value;
    restrincion=/[^A-Za-z0-9_-]/
    
    if (Usua && Contra) {
        if((Usua.length>=6)&&(Contra.length>=6)&&(Contra2.length>=6)){
            for (let i = 0; i <  Usua.length; i++) {
             let caracter = Usua.charAt(i);
             if(restrincion.test(caracter)){
                document.getElementById("error").innerHTML="unicos carcteres especiales permitido son - _"
                return
             }
              }
              for (let i = 0; i <  Contra.length; i++) {
             let caracter = Contra.charAt(i);
             if(restrincion.test(caracter)){
                document.getElementById("error").innerHTML="unicos carcteres especiales permitido son - _"
                return
             }
              }
              for (let i = 0; i <  Contra2.length; i++) {
             let caracter = Contra2.charAt(i);
             if(restrincion.test(caracter)){
                document.getElementById("error").innerHTML="unicos carcteres especiales permitido son - _"
                return
             }
              }
                if (Contra !== Contra2) {
            document.getElementById("error").innerHTML="Las contraseñas no coinciden";
            return;
        }

        fetch("/Gacha-Dex/registro.php", {
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
                    window.location.href = "login.php";
                }
            });
            }
            else{
            document.getElementById("error").innerHTML="el nombre de usurio y contraseña debe de ser de 6 caracteres de minimo"
            }
       
    } 
    else {
        document.getElementById("error").innerHTML="Escribi algo";
    }
}
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