const pokemonDisplay = document.getElementById('pokemonDisplay');
const generacionSelect = document.getElementById('generacionSelect');
const rollsBtn = document.getElementById('rolls');

let pokemonActual = null;

// Pokémons organizados por generación(id_pokedex)
const rangosGen = {
    1: [1, 151],
    2: [152, 251],
    3: [252, 386],
    4: [387, 493],
    5: [494, 649],
    6: [650, 721],
    7: [722, 809],
    8: [810, 905],
    9: [906, 1025]
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

// Función para mostrar el sobre según la generación
function mostrarSobre(pokemonActual) {
    const gen = generacionSelect.value;
    if (pokemonActual == null) {
        pokemonDisplay.innerHTML = `<img id="sobreImg" src="../imagenes/sobreCerrado.png" alt="Sobre Cerrado" style="width:120px;cursor:pointer;">`;
    } else {
        pokemonDisplay.innerHTML = `<img id="sobreImg" src="${sobrePorGen[gen]}.png" alt="Sobre Gen ${gen}" style="width:120px;cursor:pointer;">`;
    }
    document.getElementById('sobreImg').onclick = mostrarPokemon(pokemonActual);
}

// Función para mostrar el Pokémon al abrir el sobre
function mostrarPokemon(pokemonActual) {
    if (!pokemonActual) return;
    pokemonDisplay.innerHTML = `
        <div style="text-align:center;">
            <img src="${pokemonActual.Image}" alt="${pokemonActual.PokemonName}" style="width:120px;"><br>
            <strong>${pokemonActual.PokemonName}</strong>
        </div>
    `;
    pokemonActual = null;
    generacionSelect.disabled = false;
    rollsBtn.disabled = false;
}

// Al cambiar la generación, cambia el sobre
generacionSelect.addEventListener('change', mostrarSobre);

// Al hacer roll, pide al backend un Pokémon
rollsBtn.addEventListener('click', function () {
    const gen = generacionSelect.value;

    fetch("../views/rollsBackend.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "gen=" + encodeURIComponent(gen)
    })
    .then(res => res.json())
    .then(res => {
        if (res.error) {
            pokemonActual = null;
            pokemonDisplay.innerHTML = '';
            generacionSelect.disabled = false;
            rollsBtn.disabled = false;
            alert(res.error);
            mostrarSobre();
            return;
        }

        console.log("Respuesta del backend:", res);

        // Guardamos el Pokémon que eligió el backend
        pokemonActual = res.pokemon ;
        mostrarSobre(pokemonActual);
    })
    // .catch(err => console.error("Error en la petición fetch:", err));
});

// Inicializa el sobre al cargar la página
window.onload = () => {
    mostrarSobre();
};