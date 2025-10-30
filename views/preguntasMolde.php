<style>
#pregunta {
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    margin: 20px 0;
    color: #ffde00; /* Amarillo Pokémon */
    text-shadow: 0 0 5px #ffde00, 0 0 10px #ffde00, 0 0 20px #ffde00;
}

#imagen img {
    display: block;
    margin: 0 auto;
    max-width: 200px;
    border: 3px solid #ffde00;
    border-radius: 12px;
    box-shadow: 0 0 15px #ffde00, 0 0 30px #000;
}

#Descripcion {
    font-size: 1.2rem;
    text-align: center;
    color: #fff;
    text-shadow: 0 0 5px #000;
    margin-bottom: 20px;
}

#opciones {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

.opcion {
    background-color: #000;
    color: #ffde00;
    font-weight: bold;
    padding: 15px 25px;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px #ffde00;
    text-align: center;
    min-width: 140px;
}

.opcion:hover {
    transform: scale(1.1);
    box-shadow: 0 0 20px #ffde00, 0 0 40px #fff200;
}

#acertasteONo {
    font-size: 2rem;
    text-align: center;
    margin-top: 20px;
    font-weight: bold;
}

.correcto {
    color: #39ff14; /* verde neón */
    text-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14, 0 0 30px #39ff14;
    animation: glow 1s ease-in-out infinite alternate;
}

.incorrecto {
    color: #ff073a; /* rojo neón */
    text-shadow: 0 0 10px #ff073a, 0 0 20px #ff073a, 0 0 30px #ff073a;
    animation: glow 1s ease-in-out infinite alternate;
}

@keyframes glow {
    from { text-shadow: 0 0 5px, 0 0 10px, 0 0 15px; }
    to { text-shadow: 0 0 20px, 0 0 40px, 0 0 60px; }
}
</style>
</style>
<div id= "pregunta">¿Quien es este Pkemon?</div>
<div id= "imagen"></div>
<div id= "Descripcion"></div>
<div id="opciones">

</div>
<div id="acertasteONo"><p></p></div>

<script>
    <?php 
    $arrIncorrectos = [];
    if (isset($_GET['arrincorrectos'])) {
    $json = urldecode($_GET['arrincorrectos']);
    $arrIncorrectos = json_decode($json, true);

}
    ?>
let imagen = <?php echo isset($_GET['imagen']) ? json_encode($_GET['imagen']) : 'null';  ?>;
let nombre = <?php echo isset($_GET['nombre']) ? json_encode($_GET['nombre']) : 'null';  ?>;
let descripcion = <?php echo isset($_GET['descripcion']) ? json_encode($_GET['descripcion']) : 'null';  ?>;
console.log(nombre)
let arrIncorrectos = <?php echo json_encode($arrIncorrectos);?>;
console.log(arrIncorrectos)
let incorrecto1 = <?php echo isset($_GET['incorrecto1']) ? json_encode($_GET['incorrecto1']) : 'null';  ?>;
let incorrecto2 =<?php echo isset($_GET['incorrecto2']) ? json_encode($_GET['incorrecto2']) : 'null';  ?>;
let incorrecto3 =<?php echo isset($_GET['incorrecto3']) ? json_encode($_GET['incorrecto3']) : 'null';  ?>;

let opciones = document.getElementById("opciones")
console.log({imagen, nombre, incorrecto1, incorrecto2, incorrecto3, arrIncorrectos, descripcion});
if(imagen && nombre && incorrecto1 && incorrecto2 && incorrecto3 && opciones){
let foto = document.getElementById("imagen")
let foto2 = document.createElement('img')
foto2.src = imagen
foto.appendChild(foto2)

let respuestas =[
{texto: nombre, esCorrecta:true},
{texto: incorrecto1, esCorrecta:false},
{texto: incorrecto2, esCorrecta:false},
{texto: incorrecto3, esCorrecta:false}
]

for(let i = respuestas.length -1; i >0; i--){
    const j = Math.floor(Math.random()* (i+1));
[respuestas[i], respuestas[j]] = [respuestas[j], respuestas[i]];
}

opciones.innerHTML=""
respuestas.forEach(r =>{
const div = document.createElement('div')
div.classList.add("opcion")
    div.textContent = r.texto;
    div.dataset.correcta = r.esCorrecta
    div.addEventListener('click', ()=>{
    let mensaje = document.getElementById("acertasteONo");
    if(div.dataset.correcta === "true"){
        mensaje.textContent = "¡ACERTASTE!";
        mensaje.className = "correcto";
    } else {
        mensaje.textContent = "FRACA :(";
        mensaje.className = "incorrecto";
    }
})
    opciones.appendChild(div)


})
}

else if(imagen && nombre && arrIncorrectos && descripcion){
   let divDescripcion = document.getElementById("Descripcion")
    divDescripcion.innerHTML = descripcion

    let respuestas =[
{texto: nombre, imagenPokemon:imagen, esCorrecta:true},
{texto: arrIncorrectos[0].nombre,imagenPokemon:arrIncorrectos[0].imagen, esCorrecta:false},
{texto: arrIncorrectos[1].nombre,imagenPokemon:arrIncorrectos[1].imagen, esCorrecta:false},
{texto: arrIncorrectos[2].nombre,imagenPokemon:arrIncorrectos[2].imagen, esCorrecta:false}
]

for(let i = respuestas.length -1; i >0; i--){
    const j = Math.floor(Math.random()* (i+1));
[respuestas[i], respuestas[j]] = [respuestas[j], respuestas[i]];
}
opciones.innerHTML=""
respuestas.forEach(r => {
let divRespuesta = document.createElement('div')
let divRespuestaImagen = document.createElement('div')
let foto = document.createElement('img')
foto.src = r.imagenPokemon
divRespuestaImagen.appendChild(foto)
divRespuesta.appendChild(divRespuestaImagen)
let divRespuestaNombre = document.createElement('div')
divRespuestaNombre.textContent = r.texto
divRespuesta.appendChild(divRespuestaNombre)
divRespuesta.classList.add("opcion")
divRespuesta.dataset.correcta = r.esCorrecta
divRespuesta.addEventListener('click', ()=>{
    let mensaje = document.getElementById("acertasteONo");
    if(divRespuesta.dataset.correcta === "true"){
        mensaje.textContent = "¡ACERTASTE!";
        mensaje.className = "correcto";
    } else {
        mensaje.textContent = "FRACA :(";
        mensaje.className = "incorrecto";
    }
})
    opciones.appendChild(divRespuesta)




})

}




</script>