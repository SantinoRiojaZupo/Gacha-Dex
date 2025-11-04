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
let imagenDelPokemon = data.correcto[0].Image
let nombreDelPokemon = data.correcto[0].PokemonName
let nombreIncorrecto1 =data.incorrectos[0].PokemonName
let nombreIncorrecto2 =data.incorrectos[1].PokemonName
let nombreIncorrecto3=data.incorrectos[2].PokemonName
window.location.href = `index.php?page=preguntas2` +
`&imagen=${encodeURIComponent(imagenDelPokemon)}` +
`&nombre=${encodeURIComponent(nombreDelPokemon)}` +
`&incorrecto1=${encodeURIComponent(nombreIncorrecto1)}` +
`&incorrecto2=${encodeURIComponent(nombreIncorrecto2)}` +
`&incorrecto3=${encodeURIComponent(nombreIncorrecto3)}`;
        })
})


botonPreguntaDescripcion.addEventListener('click', () => {
    fetch('../obtenerTipoPregunta.php?pregunta=' + 2)
        .then(response => response.json())
        .then(data => {
console.log(data)
let arrIncorrectos = []
 let imagenDelPokemon = data.correcto[0].Image
 let nombreDelPokemon = data.correcto[0].PokemonName
 let descripcionDelPokemon = data.correcto[0].Description
 data.incorrectos.forEach(r => {
        arrIncorrectos.push({
                nombre: r.PokemonName,
                imagen: r.Image
                }
        )

 })
 let arrJSON = encodeURIComponent(JSON.stringify(arrIncorrectos));
 console.log(arrJSON)
 console.log(descripcionDelPokemon)
window.location.href = `index.php?page=preguntas2&imagen=${imagenDelPokemon}&nombre=${nombreDelPokemon}&arrincorrectos=${arrJSON}&descripcion=${encodeURIComponent(descripcionDelPokemon)}`;
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