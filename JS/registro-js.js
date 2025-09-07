  document.getElementById("botonRegistro").addEventListener("click", () => {
        console.log("hola gorda")
    const Usua = document.querySelector('[name="Usuario"]').value;
    const Contra = document.querySelector('[name="contraseña"]').value;
    if (Usua && Contra) {
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
                }
            });
    } else {
        console.log("Escribi algo");
    }
});
