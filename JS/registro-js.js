<<<<<<< HEAD
<<<<<<< HEAD
function inSesion() {
    document.getElementByClassName("login-button").addEventListener("click", () => {
    const usDir = document.getElementByName("Usuario").value;
    const contraDir = document.getElementByName("contraseña").value;
    if (usDir && contraDir) {
        fetch("../PHP/registro.php", {
=======
  document.getElementById("botonRegistro").addEventListener("click", () => {
        console.log("hola gorda")
=======
document.getElementById("botonRegistro").addEventListener("click", () => {
        console.log("hola")
>>>>>>> 54758956fdc09973fe630ac6254efe3c1464de02
    const Usua = document.querySelector('[name="Usuario"]').value;
    const Contra = document.querySelector('[name="contraseña"]').value;
    const Contra2 = document.querySelector('[name="contraseña-2"]').value;
    if (Usua && Contra) {
    if (Contra !== Contra2) {
        console.log("Las contraseñas no coinciden");
        return;
    }
<<<<<<< HEAD
        fetch("registro-backend.php", {
>>>>>>> b66de62b8fd7ef29e0ea0a8f215098959892b61d
=======
        fetch("../views/registro-backend.php", {
>>>>>>> 54758956fdc09973fe630ac6254efe3c1464de02
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
<<<<<<< HEAD
            body: "usuario=" + encodeURIComponent(usDir) + "&contraseña=" + encodeURIComponent(contraDir)
        }) //GET
=======
            body: "Usuario=" + encodeURIComponent(Usua) + "&contraseña=" + encodeURIComponent(Contra)
        }) //POST
>>>>>>> b66de62b8fd7ef29e0ea0a8f215098959892b61d
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
