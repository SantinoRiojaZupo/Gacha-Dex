let botonPreguntaAleatoria = document.getElementById("preguntasAleatorias")
let botonPreguntaImagenes = document.getElementById("preguntasImagenes")
let botonPreguntaDescripcion = document.getElementById("preguntasDescripcion")
let botonPreguntaNombre = document.getElementById("preguntasNombres")
let volver = document.getElementById("volver");

volver.addEventListener('click', () => {
    window.location.href = 'index.php?page=main'
})

if(botonPreguntaAleatoria){
botonPreguntaAleatoria.addEventListener('click', () => {
    let numeroAleatorio = Math.floor(Math.random() * 3) + 1;
    fetch('../obtenerTipoPregunta.php?pregunta=' + numeroAleatorio)
        .then(response => response.json())
        .then(data => {
      console.log(data)

        })
})
}

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
window.location.href = 'index.php?page=preguntas2'
        })

})