document.getElementById("botonRegistro").addEventListener("click", () => {
        console.log("hola")
    const Usua = document.querySelector('[name="Usuario"]').value;
    const Contra = document.querySelector('[name="contraseña"]').value;
    const Contra2 = document.querySelector('[name="contraseña-2"]').value;
    if (Usua && Contra) {
    if (Contra !== Contra2) {
        console.log("Las contraseñas no coinciden");
        return;
    }
        fetch("../views/registro-backend.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "Usuario=" + encodeURIComponent(Usua) + "&contraseña=" + encodeURIComponent(Contra)
        }) //POST
            .then(res => res.json())
            .then(res => {
                if (res.error) {
                    console.error(res.error + ": " + res.msj);
                } else {
                    console.log(res.msj);
                    console.log(res)
                }
            });
    } else {
        console.log("Escribi algo");
    }
})
