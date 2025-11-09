let pokemonesUsuario = []; // se puede reasignar

//  Referencias del DOM
const contenedor = document.querySelector(".contenedor-pokemones");
const busquedaInput = document.getElementById("busqueda");
const filtroTipo = document.getElementById("filtro-tipo");
const filtroGen = document.getElementById("filtro-generacion");

// Mostrar pokemones en el contenedor
function mostrarPokemones(lista) {
    contenedor.innerHTML = "";


    if (lista.length === 0) {
        contenedor.innerHTML = "<p>No se encontraron Pokémon.</p>";
        return;
    }

    lista.forEach(pokemon => {
     const nombres = pokemon.nombre.toLowerCase();
        const card = document.createElement("div");
        const esShiny = pokemon.shiny === 1;
        const esFavorito = pokemon.favorito === 1;
        console.log(nombres)

        // Asignar clase base
        card.classList.add(esShiny ? "card-pokemon-shiny" : "card-pokemon");
        if (esFavorito) card.classList.add("card-pokemon-favorito");

        // URL de imagen
        const imagen = esShiny
            ? `https://img.pokemondb.net/sprites/home/shiny/2x/${nombres}.jpg`
            : `https://img.pokemondb.net/sprites/home/normal/2x/${nombres}.jpg`;

        // Botón con estado actual
        const corazon = esFavorito ? "❤️" : "♡";

                const botonFavoritoHTML =
            idLogueado === idUsuario
                ? `<button class="boton-favorito" 
                            data-id="${pokemon.atrapado}" 
                            data-fav="${pokemon.favorito}">
                        ${corazon}
                   </button>`
                : "";

        card.innerHTML = `
            <img src="${imagen}" alt="${pokemon.nombre}">
            <h3>${pokemon.nombre}</h3>
            <p>Tipo: ${pokemon.tipo}${pokemon.tipo_secundario ? " / " + pokemon.tipo_secundario : ""}</p>
            <p>Generación: ${pokemon.generacion}</p>
                ${botonFavoritoHTML}
        `;

        contenedor.appendChild(card);
        
    });
}

//  Filtrar por nombre, tipo y generación
function aplicarFiltros() {
    const texto = busquedaInput.value.toLowerCase();
    const tipo = filtroTipo.value.toLowerCase();
    const generacion = filtroGen.value;

    const filtrados = pokemonesUsuario.filter(p => {
        const coincideNombre = p.nombre.toLowerCase().includes(texto);
        const coincideTipo =
            tipo === "" ||
            p.tipo.toLowerCase() === tipo ||
            (p.tipo_secundario && p.tipo_secundario.toLowerCase() === tipo);
        const coincideGen = generacion === "" || p.generacion.toString() === generacion;
        return coincideNombre && coincideTipo && coincideGen;
    });

    mostrarPokemones(filtrados);
}

// Cargar pokemones desde PHP
function cargarPokemones() {
     fetch(`/Gacha-Dex/inventario.php?id=${encodeURIComponent(idUsuario)}`)
        .then(res => res.text()) // leer respuesta cruda
        .then(texto => {
            console.log("Respuesta cruda del servidor:", texto);
            try {
                const data = JSON.parse(texto);
                console.log("JSON parseado correctamente:", data);
                if (!data.ok) {
                    contenedor.innerHTML = `<p>${data.error || "Error al obtener los Pokémon."}</p>`;
                    return;
                }
                pokemonesUsuario = data.pokemones || [];
                idLogueado = data.idLogueado
                mostrarPokemones(pokemonesUsuario);
            } catch (e) {
                console.error(" Error al parsear JSON:", e);
                contenedor.innerHTML = `<pre>${texto}</pre>`;
            }
        })
        .catch(err => {
            console.error(err);
            contenedor.innerHTML = "<p>Error al cargar los Pokémon.</p>";
        });
}

//  Cambiar favorito

function cambiarFavorito(idPokemonCatched, estadoActual, boton) {
      if (idUsuario == idLogueado ){
  
    fetch("../favorito.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "PokemonCatched=" + encodeURIComponent(idPokemonCatched)
    })
        .then(res => res.json())
        .then(res => {
            if (res.error) {
                console.error(res.error + ": " + (res.msj || ""));
            } else {
                //  Actualizar visualmente el botón
                const nuevoEstado = estadoActual === 1 ? 0 : 1;
                boton.dataset.fav = nuevoEstado;
                boton.innerHTML = nuevoEstado === 1 ? "❤️" : "♡";
                console.log("Favorito actualizado correctamente:", idPokemonCatched);
            }
        })
        .catch(err => console.error("Error al cambiar favorito:", err));
    }
}

//  cambio de corazon
contenedor.addEventListener("click", e => {
    if (e.target.classList.contains("boton-favorito")) {
        const boton = e.target;
        const id = boton.dataset.id;
        const estadoActual = boton.dataset.fav === "1" ? 1 : 0;
        cambiarFavorito(id, estadoActual, boton);
    }
});

// Escuchar filtros
busquedaInput.addEventListener("input", aplicarFiltros);
filtroTipo.addEventListener("change", aplicarFiltros);
filtroGen.addEventListener("change", aplicarFiltros);

// Inicializar
cargarPokemones();


window.addEventListener('load', () => {
const musica = new Audio('../sonidos/1-21.%20Pokémon%20Center.mp3');
musica.volume = 0.5;
musica.loop = true;
musica.play();
});
