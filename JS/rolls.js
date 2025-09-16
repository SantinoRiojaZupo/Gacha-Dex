// Simulación de pokémon por generación
const pokemonsPorGen = {
    1: ["Bulbasaur", "Charmander", "Squirtle"],
    2: ["Chikorita", "Cyndaquil", "Totodile"],
    3: ["Treecko", "Torchic", "Mudkip"],
    4: ["Turtwig", "Chimchar", "Piplup"],
    5: ["Snivy", "Tepig", "Oshawott"],
    6: ["Chespin", "Fennekin", "Froakie"],
    7: ["Rowlet", "Litten", "Popplio"],
    8: ["Grookey", "Scorbunny", "Sobble"],
    9: ["Sprigatito", "Fuecoco", "Quaxly"]
};

// Cambia la imagen del sobre según la generación
const sobrePorGen = {
    0: "../imagenes/sobre0.png", // Todas las generaciones
    1: "../imagenes/sobre1.png",
    2: "../imagenes/sobre2.png",
    3: "../imagenes/sobre3.png",
    4: "../imagenes/sobre4.png",
    5: "../imagenes/sobre5.png",
    6: "../imagenes/sobre6.png",
    7: "../imagenes/sobre7.png",
    8: "../imagenes/sobre8.png",
    9: "../imagenes/sobre9.png"
};

const pokemonDisplay = document.getElementById('pokemonDisplay');
const generacionSelect = document.getElementById('generacionSelect');
const rollsBtn = document.getElementById('rolls');

let pokemonActual = null;

// Función para mostrar el sobre según la generación
function mostrarSobre() {
    const gen = generacionSelect.value;
    pokemonDisplay.innerHTML = `<img id="sobreImg" src="${sobrePorGen[gen]}" alt="Sobre Gen ${gen}" style="width:120px;cursor:pointer;">`;
    document.getElementById('sobreImg').onclick = mostrarPokemon;
}

// Función para mostrar el Pokémon al abrir el sobre
function mostrarPokemon() {
    if (!pokemonActual) return;
    pokemonDisplay.innerHTML = `
        <div style="text-align:center;">
            <img src="../imagenes/${pokemonActual}.png" alt="${pokemonActual}" style="width:120px;"><br>
            <strong>${pokemonActual}</strong>
        </div>
    `;
}

// Al cambiar la generación, cambia el sobre
generacionSelect.addEventListener('change', mostrarSobre);

// Al hacer roll, elige un Pokémon y muestra el sobre
rollsBtn.addEventListener('click', function () {
    const gen = generacionSelect.value;
    let pokemons;
    if (gen == 0) {
        // Si es "Todas las generaciones", combina todos los pokémon
        pokemons = [].concat(...Object.values(pokemonsPorGen));
    } else {
        pokemons = pokemonsPorGen[gen];
    }
    const randomIndex = Math.floor(Math.random() * pokemons.length);
    pokemonActual = pokemons[randomIndex];
    mostrarSobre();
});

// Inicializa el sobre al cargar la página
window.onload = mostrarSobre;