document.getElementById("boton-Login").addEventListener("click", () => {
    console.log("click en login");
    usuarioLogin = document.getElementById( "emLogin").value;
    passwordLogin = document.getElementById( "passwordLogin").value;
    if (usuarioLogin && passwordLogin) {
        fetch("/Gacha-Dex/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "UsuarioLogin=" + encodeURIComponent(usuarioLogin) + "&contraseñaLogin=" + encodeURIComponent(passwordLogin)
        }) //POST
        .then(res=>res.json())
        .then(res=>{
            if(res.error){
                console.log(res.error + ": " + res.msj);
            }
            else{
                console.log(res.msj);
                console.log(res);
                window.location.href = "index.php?page=main"; //redirige a main si todo ok 
            }
        } )
    }
    else {
        console.log("Escribi algo");
    }
 })
