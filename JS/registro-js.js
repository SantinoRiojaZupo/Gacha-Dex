function inSesion() {
    document.getElementByClassName("login-button").addEventListener("click", () => {
    const usDir = document.getElementByName("Usuario").value;
    const contraDir = document.getElementByName("contraseña").value;
    if (usDir && contraDir) {
        fetch("agregarDirector.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "nombre=" + encodeURIComponent(usDir) + "&pais=" + encodeURIComponent(contraDir)
        }) //GET
            .then(res => res.json())
            .then(res => {
                if (res.error) {
                    console.error(res.error + ": " + res.msj);
                } else {
                    console.log(res.msj);
                }
            });
    } else {
        console.log("Escribi algo");
    }
});
}