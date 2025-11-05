let botonPreguntaAleatoria = document.getElementById("preguntasAleatorias")
let botonPreguntaImagenes = document.getElementById("preguntasImagenes")
let botonPreguntaDescripcion = document.getElementById("preguntasDescripcion")
let botonPreguntaNombre = document.getElementById("preguntasNombres")


botonPreguntaAleatoria.addEventListener('click', () => {
    let numeroAleatorio = Math.floor(Math.random() * 3) + 1;
    fetch('../obtenerTipoPregunta.php?pregunta=' + numeroAleatorio)
        .then(response => response.json())
        .then(data => {
      console.log(data)

        })
})


botonPreguntaImagenes.addEventListener('click', () => {
    fetch('../obtenerTipoPregunta.php?pregunta=' + 1)
        .then(response => response.json())
        .then(data => {
console.log(data)
window.location.href = 'index.php?page=preguntas2'
        })
})


botonPreguntaDescripcion.addEventListener('click', () => {
    fetch('../obtenerTipoPregunta.php?pregunta=' + 2)
        .then(response => response.json())
        .then(data => {
console.log(data)

window.location.href = 'index.php?page=preguntas2';
        })
})


botonPreguntaNombre.addEventListener('click', () => {
    fetch('../obtenerTipoPregunta.php?pregunta=' + 3)
        .then(response => response.json())
        .then(data => {
console.log(data)
let nombreCorrecto =   data.correcto[0].PokemonName
let imagenCorrecto = data.correcto[0].Image
imagenesIncorrectas = []
data.incorrectos.forEach(r => {
        imagenesIncorrectas.push({
                imagen: r.Image
                }
        )
})
console.log(nombreCorrecto)
console.log(imagenCorrecto)
console.log(imagenesIncorrectas)
window.location.href = `index.php?page=preguntas3` +
`&nombre=${encodeURIComponent(nombreDelPokemon)}` +
`&imagenCorrecta=${encodeURIComponent(imagenDelPokemon)}` +
`&incorrecto1=${encodeURIComponent(nombreIncorrecto1)}` +
`&incorrecto2=${encodeURIComponent(nombreIncorrecto2)}` +
`&incorrecto3=${encodeURIComponent(nombreIncorrecto3)}`;
        })

})