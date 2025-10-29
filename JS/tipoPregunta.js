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
let nombreDelPokemon = data.correcto[0].pokemonName
let nombreIncorrecto1 =data.incorrecto[0].pokemonName
let nombreIncorrecto2 =data.incorrecto[1].pokemonName
let nombreIncorrecto3=data.incorrecto[2].pokemonName
window.location.href = `index.php?page=preguntas2&imagen=${imagenDelPokemon}&nombre=${nombreDelPokemon}&incorrecto1=${nombreIncorrecto1}&incorrecto2=
${nombreIncorrecto2}&incorrecto3=${nombreIncorrecto3}`;
        })
})


botonPreguntaDescripcion.addEventListener('click', () => {
    fetch('../obtenerTipoPregunta.php?pregunta=' + 2)
        .then(response => response.json())
        .then(data => {
console.log(data)
        })
})


botonPreguntaNombre.addEventListener('click', () => {
    fetch('../obtenerTipoPregunta.php?pregunta=' + 3)
        .then(response => response.json())
        .then(data => {
console.log(data)
        })

})