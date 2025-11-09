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
    // guardar id del pokemon (id del registro atrapado) en dataset para referencia desde el menú
    if (pokemon.atrapado !== undefined) card.dataset.id = pokemon.atrapado;
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


let musica;

window.addEventListener('load', () => {
    musica = new Audio('../sonidos/1-21.%20Pokémon%20Center.mp3');
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
// === MENU CONTEXTUAL PERSONALIZADO ===
const menuContextual = document.getElementById("menuContextual");
let pokemonSeleccionado = null;

if (!menuContextual) {
    console.warn("menuContextual no encontrado en el DOM. El menú contextual no funcionará.");
} else {
    // mover el menú al body para evitar problemas de posicionamiento con ancestros posicionados/transformados
    if (menuContextual.parentElement !== document.body) {
        document.body.appendChild(menuContextual);
    }

    // CLICK DERECHO (delegado desde el documento)
    document.addEventListener("contextmenu", (e) => {
        const card = e.target.closest(".card-pokemon, .card-pokemon-shiny, .card-pokemon-favorito");
        if (!card) return; // no es una tarjeta
        if (!contenedor || !contenedor.contains(card)) return;

        e.preventDefault(); // evitar menú nativo
        pokemonSeleccionado = card;

        // coordenadas del mouse
        let x = e.pageX;
        let y = e.pageY;

        // mostrar y posicionar (fixed -> coordenadas del viewport)
        menuContextual.style.display = "block";
        // ajustar para que no se salga de pantalla
        const menuWidth = menuContextual.offsetWidth;
        const menuHeight = menuContextual.offsetHeight;
        const pageWidth = window.innerWidth;
        const pageHeight = window.innerHeight;
        if (x + menuWidth > pageWidth) x = pageWidth - menuWidth - 10;
        if (y + menuHeight > pageHeight) y = pageHeight - menuHeight - 10;
        menuContextual.style.left = x + "px";
        menuContextual.style.top = y + "px";
        requestAnimationFrame(() => menuContextual.classList.add("show"));
    });

    // CERRAR AL CLICK FUERA
    document.addEventListener("mousedown", (e) => {
        if (!menuContextual || menuContextual.contains(e.target)) return;
        menuContextual.classList.remove("show");

    });

    // Manejo de acciones del menú
    menuContextual.addEventListener('click', (e) => {
        const btn = e.target.closest('button');
        if (!btn) return;
        const action = btn.dataset.action;
        // cerrar menú
        menuContextual.classList.remove('show');
        setTimeout(() => { menuContextual.style.display = 'none'; }, 150);

        if (action === 'info') {
            if (pokemonSeleccionado) {
                // usar el id del pokemon almacenado en el data-id de la tarjeta (atrapado)
                const pokeId = pokemonSeleccionado.dataset.id || pokemonSeleccionado.querySelector('.boton-favorito')?.dataset.id;
                if (pokeId) {
                    window.location.href = `index.php?page=DetallesPokemon&idpokemon=${encodeURIComponent(pokeId)}`;
                } else {
                    // fallback a nombre si no existe id
                    const nombre = pokemonSeleccionado.querySelector('h3')?.textContent?.trim() || '';
                    window.location.href = `index.php?page=DetallesPokemon&name=${encodeURIComponent(nombre)}`;
                }
            }
        } else if (action === 'favorito') {
            const botonFav = pokemonSeleccionado?.querySelector('.boton-favorito');
            if (botonFav) botonFav.click();
        } else if (action === 'borrar') {
            if (confirm('¿Eliminar este Pokémon?')) {
                // eliminamos del DOM; idealmente llamar al backend para eliminar permanentemente
                pokemonSeleccionado?.remove();
            }
        }
    });
}
