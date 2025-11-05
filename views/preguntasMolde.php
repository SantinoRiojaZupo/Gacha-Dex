<link rel="stylesheet" href="../CSS/estilosCuestionario.css">
<div id= "pregunta">¿Quien es este Pokemon?</div>
<div id= "imagen"></div>
<div id= "Descripcion"></div>
<div id="opciones">
</div>
<div id="acertasteONo"><p></p></div>
<script>
    <?php
$tipo = $_SESSION['preguntaActual']['tipo']; //saco de session el tipo de pregunta
if($tipo == 1){
$correcto = $_SESSION['preguntaActual']['correcto'][0]; //saco de session la respuesta correcta
$incorrectos = $_SESSION['preguntaActual']['incorrectos']; //saco de session las respuestas incorrectas
}
else if($tipo == 2){
    $correcto = $_SESSION['preguntaActual']['correcto'][0]; //saco de session la respuesta correcta
    $incorrectos = $_SESSION['preguntaActual']['incorrectos']; //saco de session las respuestas incorrectas
}
    ?>
    const tipo = <?= json_encode($tipo) ?>; //aca declario las variables js con los valores de php
    const correcto = <?= json_encode($correcto) ?>;
    const incorrectos = <?= json_encode($incorrectos) ?>;
    let opciones = document.getElementById("opciones")
//llega hasta aca (hago esto para q sea mas comodo trabajar xdxdxd)
//funcion nueva pregunta sobre imagen
document.addEventListener("DOMContentLoaded", () => { //aca espero a que cargue el dom
    if (tipo == 1) { //pregunta sobre el tipo de pregunta
        funcionNuevaPregunta(correcto, incorrectos); //llamo a la funcion correspondiente
    }
    else if (tipo == 2) {    
        funcionNuevaPreguntaDescripcion(correcto, incorrectos);
    }
})
function funcionNuevaPregunta(correcto, incorrectos){
        setRandomNeon();
    document.getElementById("imagen").innerHTML = ""
document.getElementById("acertasteONo").innerHTML = ""
opciones.innerHTML = "";
       nombre = correcto.PokemonName;
       imagen = correcto.Image;
       let foto = document.getElementById("imagen");
let img = document.createElement("img");
img.src = imagen;
foto.appendChild(img);
         incorrecto1 = incorrectos[0].PokemonName;
            incorrecto2 = incorrectos[1].PokemonName;
               incorrecto3 = incorrectos[2].PokemonName;
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
respuestas.forEach(r => {
const div = document.createElement('div')
div.classList.add("opcion")
div.textContent = r.texto
div.dataset.correcta = r.esCorrecta
div.addEventListener('click', () => {
      document.querySelectorAll('.opcion').forEach(btn => btn.style.pointerEvents = 'none');
    if(div.dataset.correcta === "true"){
        div.classList.add('correcta'); 
        
        document.getElementById("acertasteONo").innerHTML = "acertaste"
        fetch("../obtenerTipoPregunta.php?pregunta=1")
setTimeout(() => {
 location.reload();
}, 1500);      
    }
    else {
        div.classList.add('incorrecta'); 
   
         document.getElementById("acertasteONo").innerHTML = "fraca"
             document.querySelectorAll('.opcion').forEach(btn => {
            if(btn.dataset.correcta === "true") {
                btn.classList.add('correcta');
             }})
             fetch("../obtenerTipoPregunta.php?pregunta=1")
        setTimeout(() => {
     location.reload();
}, 1500);
    }
})
opciones.appendChild(div)
})
}
//funcion nuevas preguntas sobre imagen
//funcion nuevas preguntas sobre descripcion
function funcionNuevaPreguntaDescripcion(correcto, incorrectos) {
    setRandomNeon();
    document.getElementById("acertasteONo").innerHTML = ""
        imagen = correcto.Image;
        nombre = correcto.PokemonName;
        descripcion = correcto.Description;  
        arrIncorrectos = incorrectos.map(r => ({
            nombre: r.PokemonName,
            imagen: r.Image
        }));
        let divDescripcion = document.getElementById("Descripcion");
        divDescripcion.innerHTML = descripcion;
        let respuestas = [
            {texto: nombre, imagenPokemon: imagen, esCorrecta: true},
            {texto: arrIncorrectos[0].nombre, imagenPokemon: arrIncorrectos[0].imagen, esCorrecta: false},
            {texto: arrIncorrectos[1].nombre, imagenPokemon: arrIncorrectos[1].imagen, esCorrecta: false},
            {texto: arrIncorrectos[2].nombre, imagenPokemon: arrIncorrectos[2].imagen, esCorrecta: false}
        ];    
        for (let i = respuestas.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [respuestas[i], respuestas[j]] = [respuestas[j], respuestas[i]];
        }
       opciones.innerHTML = "";
        respuestas.forEach(r => {
            let divRespuesta = document.createElement('div');
            let divRespuestaImagen = document.createElement('div');
            let foto = document.createElement('img');
            foto.src = r.imagenPokemon;
            divRespuestaImagen.appendChild(foto);
            divRespuesta.appendChild(divRespuestaImagen);
            let divRespuestaNombre = document.createElement('div');
            divRespuestaNombre.textContent = r.texto;
            divRespuesta.appendChild(divRespuestaNombre);
            divRespuesta.classList.add("opcion");
            divRespuesta.dataset.correcta = r.esCorrecta;
            divRespuesta.addEventListener('click', () => {
                  document.querySelectorAll('.opcion').forEach(btn => btn.style.pointerEvents = 'none');
                if (divRespuesta.dataset.correcta === "true") {
                    divRespuesta.classList.add('correcta');
                    document.getElementById("acertasteONo").innerHTML = "acertaste";
                    fetch("../obtenerTipoPregunta.php?pregunta=2");
                    setTimeout(() => location.reload(), 1500);
                } else {
                    divRespuesta.classList.add('incorrecta'); 
                    document.getElementById("acertasteONo").innerHTML = "fraca"
             document.querySelectorAll('.opcion').forEach(btn => {
            if(btn.dataset.correcta === "true") {
                btn.classList.add('correcta');
             }})
                    document.getElementById("acertasteONo").innerHTML = "fraca";
                    fetch("../obtenerTipoPregunta.php?pregunta=2");
                    setTimeout(() => location.reload(), 1500);
                }
            });

            opciones.appendChild(divRespuesta);
            
        });
    };
// Colores posibles para el neón
const neonColors = ['#dbc608ff', '#009414ff', '#0fcacaff', '#00ff66e0', '#4c00ffff', '#cc00ffff'];
let currentNeon = '#ffeb3b'; // valor inicial

// Asigna un color aleatorio cada vez que se carga una nueva pregunta
function setRandomNeon() {
  const randomColor = neonColors[Math.floor(Math.random() * neonColors.length)];
  currentNeon = randomColor;
  document.documentElement.style.setProperty('--neon-color', currentNeon);
}

// Llamamos una vez al cargar
setRandomNeon();

// ======= EFECTO SPLASH =======
function createSplash(x, y, color) {
  const splash = document.createElement('div');
  splash.classList.add('splash');
  splash.style.left = `${x}px`;
  splash.style.top = `${y}px`;
  splash.style.background = color;
  document.body.appendChild(splash);
  setTimeout(() => splash.remove(), 600);
}

// ======= HOVER DINÁMICO =======
document.addEventListener('mouseover', (e) => {
  if (e.target.classList.contains('opcion')) {
    e.target.style.boxShadow = `0 0 40px ${currentNeon}, inset 0 0 30px ${currentNeon}`;
    e.target.style.borderColor = currentNeon;
  }
});
document.addEventListener('mouseout', (e) => {
  if (e.target.classList.contains('opcion')) {
    e.target.style.boxShadow = '';
    e.target.style.borderColor = '';
  }
});

// ======= SPLASH AL CLIC =======
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('opcion')) {
    const x = e.clientX;
    const y = e.clientY;
    createSplash(x, y, currentNeon);
  }
});

// ======= NUEVA PREGUNTA: CAMBIA EL COLOR =======
// Cada vez que se genera una pregunta nueva, llamá a setRandomNeon()


</script>