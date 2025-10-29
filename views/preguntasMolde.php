
 
<div id= "pregunta">¿Quien es este Pkemon?</div>
<div id= "imagen"></div>
<div id="opciones">

</div>
<div id="acertasteONo"><p></p></div>

<script>
let imagen = <?php echo isset($_GET['imagen']) ? json_encode($_GET['imagen']) : 'null';  ?>;
let nombre = <?php echo isset($_GET['nombre']) ? json_encode($_GET['nombre']) : 'null';  ?>;
let incorrecto1 = <?php echo isset($_GET['incorrecto1']) ? json_encode($_GET['incorrecto1']) : 'null';  ?>;
let incorrecto2 =<?php echo isset($_GET['incorrecto2']) ? json_encode($_GET['incorrecto2']) : 'null';  ?>;
let incorrecto3 =<?php echo isset($_GET['incorrecto3']) ? json_encode($_GET['incorrecto3']) : 'null';  ?>;
let opciones = document.getElementById("opciones")
if(imagen,nombre,incorrecto1,incorrecto2,incorrecto3,opciones){
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
        if(div.dataset.correcta === "true"){
            document.getElementById("acertasteONo").innerHTML = "acertaste"

        }
        else{
            document.getElementById("acertasteONo").innerHTML = "fraca"
        }
        
    
    })
    opciones.appendChild(div)


})
}




</script>