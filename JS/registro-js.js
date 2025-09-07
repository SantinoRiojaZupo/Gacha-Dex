function inSesion() {
    document.getElementById("botonRegistro").addEventListener("click", () => {
    const Usua = document.getElementsByName("Usuario").value;
    const Contra = document.getElementsByName("contraseña").value;
    if (Usua && Contra) {
        fetch("registro.php", {
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
}