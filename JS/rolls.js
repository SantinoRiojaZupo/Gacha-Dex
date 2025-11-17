const pokemonDisplay = document.getElementById('pokemonDisplay');
const generacionSelect = document.getElementById('generacionSelect');
const rollsBtn = document.getElementById('rolls');
const pityBox = document.getElementById('probabilidad');
const rollsBox = document.getElementById('rollsCant');

let pokemonActual = null;
let pityActual = 0;
let Roles=0;
let sobreAbierto = false;

const rangosGen = {
  1: [1, 151], 2: [152, 251], 3: [252, 386], 4: [387, 493],
  5: [494, 649], 6: [650, 721], 7: [722, 809],
  8: [810, 905], 9: [906, 1025]
};

const sobrePorGen = {
  0: "../imagenes/sobre0.png", 1: "../imagenes/sobre1.png",
  2: "../imagenes/sobre2.png", 3: "../imagenes/sobre3.png",
  4: "../imagenes/sobre4.png", 5: "../imagenes/sobre5.png",
  6: "../imagenes/sobre6.png", 7: "../imagenes/sobre7.png",
  8: "../imagenes/sobre8.png", 9: "../imagenes/sobre9.png"
};

// Mostrar sobre
function mostrarSobre(pokemon, resultado = "normal") {
  const gen = generacionSelect.value;

  if (!pokemon) {
    pokemonDisplay.innerHTML = `
      <img id="sobreImg" src="${sobrePorGen[gen]}" alt="Sobre Gen ${gen}" style="width:120px;cursor:pointer;">
    `;
    sobreAbierto = false;
  } else {
    if (!sobreAbierto) {
      mostrarAnimacionSobre(pokemon, gen, resultado);
      sobreAbierto = true;
    } else {
      mostrarPokemon(pokemon, resultado);
    }
  }
}

// Animación de sobre
function mostrarAnimacionSobre(pokemon, gen, resultado) {
  pokemonDisplay.innerHTML = `
    <img id="sobreImg" src="${sobrePorGen[gen]}" class="sobre-animando" style="width:120px;">
  `;
  const sobre = document.getElementById('sobreImg');
  sobre.addEventListener("animationend", () => {
    pokemonDisplay.classList.add("fade-in");
    setTimeout(() => mostrarPokemon(pokemon, resultado), 400);
  }, { once: true });
}

// Mostrar Pokémon
function mostrarPokemon(pokemon, resultado) {
  const imagen = pokemon.Image.toLowerCase();
  const esShiny = resultado.includes("shiny");
  const esLegendario = resultado.includes("legendario");

  pokemonDisplay.innerHTML = `
    <div class="pokemon-revelado" style="text-align:center; position:relative;">
      <img src="${imagen}" alt="${pokemon.PokemonName}" style="width:120px;">
      <br><strong>${pokemon.PokemonName}</strong>
    </div>
  `;
  pokemonDisplay.classList.add("fade-in");

  if (esShiny || esLegendario) {
    const contenedor = document.querySelector(".pokemon-revelado");
    contenedor.classList.add("pokemon-especial");
    crearParticulas(contenedor, esLegendario ? 150 : 100);
    reproducirSonidoEspecial(esLegendario);
  }

  guardarPokemon(pokemon);
  pokemonActual = null;
  generacionSelect.disabled = false;
  rollsBtn.disabled = false;
}

// Guardar en base
function guardarPokemon(pokemon) {
  fetch("/Gacha-Dex/guardarPokemones.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body:
      "pokemonName=" + encodeURIComponent(pokemon.PokemonName) +
      "Id_Pokedex=" + encodeURIComponent(pokemon.Id_Pokedex) +
      "&Is_Shiny=" + (pokemon.Is_Shiny ? 1 : 0)
  })
    .then(res => res.json())
    .then(res => {
      if (!res.ok) {
        console.error("Error guardando Pokémon:", res.error);
      } else {
        pityBox.innerHTML = `"${pityActual}"`;
        localStorage.removeItem("pokemonPendiente");
        cargarUltimosPokemones();
      }
    })
    .catch(err => console.error("Error en fetch guardarPokemones:", err));
}

// Partículas
function crearParticulas(parent, cantidad) {
  for (let i = 0; i < cantidad; i++) {
    const p = document.createElement("div");
    p.classList.add("particula");
    const x = (Math.random() - 0.5) * 400 + "px";
    const y = (Math.random() - 0.5) * 400 + "px";
    p.style.setProperty("--x", x);
    p.style.setProperty("--y", y);
    const size = 3 + Math.random() * 6;
    p.style.width = `${size}px`;
    p.style.height = `${size}px`;
    const colores = ["gold", "white", "#9ef7ff", "#7fffd4"];
    p.style.background = colores[Math.floor(Math.random() * colores.length)];
    parent.appendChild(p);
    p.addEventListener("animationend", () => p.remove());
  }
}

// Sonido especial
 const sonido = new Audio("../sonidos/brillo.mp3");
function reproducirSonidoEspecial(isLegendario) {

  if (!musica || musica.muted) return;

    if (sonido.currentTime > 0) {
      sonido.currentTime = 0;
  }

  sonido.volume = musica.volume
  musica.pause();
  sonido.play().catch(() => {});
}
sonido.addEventListener("ended", () => {
  if (musica && !musica.muted) {
    musica.play().catch(() => {});
  }});


// Roll
rollsBtn.addEventListener("click", function () {
  if (Roles <= 0) {
    console.log("No te quedan rolls disponibles.");
    alert("No te quedan rolls disponibles. ¡Consigue más en Cuestionario!");
    return;
  }
  rollsBtn.disabled = true;
  generacionSelect.disabled = true;
  sobreAbierto = false;

  const gen = generacionSelect.value;
  pokemonDisplay.innerHTML = `
    <img id="sobreImg" src="../imagenes/sobreCerrado.png" alt="Sobre Cerrado" style="width:120px;">
  `;

  fetch("/Gacha-Dex/rolls.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "gen=" + encodeURIComponent(gen)
  })
    .then(res => res.json())
    .then(res => {
      if (res.error) {
        alert(res.error);
        generacionSelect.disabled = false;
        rollsBtn.disabled = false;
        mostrarSobre();
        return;
      }

      pokemonActual = res.pokemon;
      pityActual = res.pity;

      const resultado = res.resultado || "normal";
      console.log("Pokémon obtenido:", pokemonActual);
      console.log("Resultado:", resultado);

      localStorage.setItem("pokemonPendiente", JSON.stringify(pokemonActual));

      mostrarSobre(pokemonActual, resultado);
    })
    .catch(err => console.error("Error en la petición fetch:", err));
});

// Últimos pokémon
function cargarUltimosPokemones() {
  fetch("/Gacha-Dex/ultimosPokemones.php")
    .then(res => res.json())
    .then(data => {
      if (!data.ok) return console.error("Error cargando últimos:", data.error);
      const contenedor = document.getElementById("pokemonesConseguidos");
      contenedor.innerHTML = "";
       Roles= data.Rolls;
      if (data.pity !== undefined) pityBox.innerHTML = `"${data.pity}"`;
      if (data.Rolls !== undefined) rollsBox.innerHTML = `"${data.Rolls}"`;
      data.pokemones.forEach(p => {
        const div = document.createElement("div");
        div.style.display = "inline-block";
        div.style.margin = "5px";
        div.style.textAlign = "center";
        const nombre = p.PokemonName.toLowerCase();
        const imageUrl = p.Is_Shiny == 1
          ? `https://img.pokemondb.net/sprites/home/shiny/2x/${nombre}.jpg`
          : `https://img.pokemondb.net/sprites/home/normal/2x/${nombre}.jpg`;
        div.innerHTML = `<img src="${imageUrl}" style="width:50px;"><br><small>${p.PokemonName}</small>`;
        contenedor.appendChild(div);
      return(Roles);});
    })
    .catch(err => console.error("Error fetch ultimosPokemones:", err));
}

// Al cargar la página
window.onload = () => {
  generacionSelect.value = 0;
  generacionSelect.disabled = false;
  rollsBtn.disabled = false;
  mostrarSobre();
  cargarUltimosPokemones();

  const pendiente = localStorage.getItem("pokemonPendiente");
  if (pendiente) {
    const poke = JSON.parse(pendiente);
    console.log("Pokémon pendiente detectado:", poke.PokemonName);
    guardarPokemon(poke);
  }
};