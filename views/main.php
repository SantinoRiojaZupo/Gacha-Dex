<div>
                <h1>Gacha-Dex</h1>
            </div>
<main class="main-layout">
    
    <div class="side-box left-box">
        <h2>Breve explicación</h2>
        <p>Aprete el boton de rolls para buscar un pokemon</p>
        <button id="preguntas">Cuestionario</button>
    </div>
    <div class="center-boxes">
        <div class="center-box">
            <h2>Pity:</h2>
            <p id="probabilidad"><!--de tener Shiny/Legendario --></p>
        </div>
        <div class="center-box">
            <div id="pokemonDisplay"><!--Aca va a aparecer el pokemon--></div>
        </div>
        <div class="center-box">
            <button id="rolls">Roll</button>
                  <select id="generacionSelect">
                <option value="0" selected>Todas las generaciones</option>
                <option value="1">Generación 1</option>
                <option value="2">Generación 2</option>
                <option value="3">Generación 3</option>
                <option value="4">Generación 4</option>
                <option value="5">Generación 5</option>
                <option value="6">Generación 6</option>
                <option value="7">Generación 7</option>
                <option value="8">Generación 8</option>
                <option value="9">Generación 9</option>
            </select>
        </div>
    </div>
    <div class="side-box right-box">
        <h2>Últimos PKMN conseguidos</h2>
        <div id="pokemonesConseguidos"><!--Aca van a apareces los nombres o x cosa de los pokemons conseguidos--></div>
    </div>
 
</main>
<script>
let musica;

window.addEventListener('load', () => {
    musica = new Audio('../sonidos/1-35.%20Vermilion%20City.mp3');
    musica.volume = 0.5;
    musica.loop = true;

    // Guardar/Restaurar mute
    const mutadoGuardado = localStorage.getItem("mutado") === "true";
    musica.muted = mutadoGuardado;

    // Guardar/Restaurar volumen
    const volumenGuardado = localStorage.getItem("volumenMusica");
    if (volumenGuardado !== null) {
        musica.volume = parseFloat(volumenGuardado);
    }

    musica.play().catch(() => {});

    // Elementos
    const btn = document.getElementById("toggleMusic");
    const slider = document.getElementById("musicVolume");

    if (btn) {
        btn.textContent = musica.muted ? "🔇" : "🔊";
    }

    if (slider) {
        slider.value = musica.volume;
    }

    // Evento botón
    if (btn) {
        btn.addEventListener("click", () => {
            musica.muted = !musica.muted;
            localStorage.setItem("mutado", musica.muted);
            btn.textContent = musica.muted ? "🔇" : "🔊";
        });
    }

    // Evento volumen
    if (slider) {
        slider.addEventListener("input", () => {
            musica.volume = slider.value;
            localStorage.setItem("volumenMusica", slider.value);
        });
    }
});



</script>
<script src="../JS/botonPreguntas.js"></script>
<script src="../JS/rolls.js"></script>