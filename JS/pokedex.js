let pokedex = [];
let pokemonesUsuario = [];

const contenedor = document.getElementById("inventoryPoke");
const busquedaInput = document.getElementById("busqueda");
const filtroTipo = document.getElementById("filtro-tipo");
const filtroGen = document.getElementById("filtro-generacion");
const filtroAtrapados = document.getElementById("filtro-atrapados");

// Progreso Pokédex
const progresoTexto = document.getElementById("progresoPokedex");
const barraProgresoFill = document.getElementById("barraProgresoFill");

function mostrarPokedex(lista) {
    contenedor.innerHTML = "";

    lista.forEach(pokemon => {
        const card = document.createElement("div");
        card.classList.add("pokemon-card");

        if (pokemon.atrapado == 1) {
            card.innerHTML = `
                <img src="${pokemon.imagen}" alt="${pokemon.nombre}">
                <h3>${pokemon.nombre}</h3>
            `;

            card.addEventListener("click", () => {
                window.location.href =
                    `index.php?page=DetallesPokemon&idpokemon=${pokemon.id_pokedex}`;
            });

        } else {
            card.classList.add("pokemon-card-locked");
            card.innerHTML = `
                <img class="locked" src="../imagenes/locked.png" alt="Bloqueado">
                <h3>???</h3>
            `;
        }

        contenedor.appendChild(card);
    });
}

function actualizarProgreso() {
    const total = pokedex.length; 
    const atrapados = pokedex.filter(p => p.atrapado == 1).length;

    const porcentaje = Math.round((atrapados / total) * 100);

    progresoTexto.textContent =
        `Progreso: ${atrapados} / ${total} (${porcentaje}%)`;

    barraProgresoFill.style.width = porcentaje + "%";
}

function cargarPokedex() {
    fetch("/Gacha-Dex/pokedex.php")
        .then(res => res.json())
        .then(data => {
            if (!data.ok) {
                contenedor.innerHTML = `<p>${data.error}</p>`;
                return;
            }

            pokedex = data.pokedex;
            pokemonesUsuario = pokedex.filter(p => p.atrapado == 1);

            mostrarPokedex(pokedex);
            actualizarProgreso();
        })
        .catch(err => console.error("Error en pokedex:", err));
}

function aplicarFiltros() {
    const nombre = busquedaInput.value.toLowerCase();
    const tipoSel = filtroTipo.value.toLowerCase();
    const genSel = filtroGen.value;
    const soloAtrapados = filtroAtrapados.checked;

    const filtrados = pokedex.filter(p => {
        const coincideNombre = p.nombre.toLowerCase().includes(nombre);
        const coincideTipo =
            tipoSel === "" ||
            p.tipo.toLowerCase() === tipoSel ||
            (p.tipo_secundario && p.tipo_secundario.toLowerCase() === tipoSel);
        const coincideGen = genSel === "" || p.generacion.toString() === genSel;
        const coincideAtrapado = !soloAtrapados || p.atrapado == 1;

        return coincideNombre && coincideTipo && coincideGen && coincideAtrapado;
    });

    mostrarPokedex(filtrados);
}

// Eventos de filtros
busquedaInput.addEventListener("input", aplicarFiltros);
filtroTipo.addEventListener("change", aplicarFiltros);
filtroGen.addEventListener("change", aplicarFiltros);
filtroAtrapados.addEventListener("change", aplicarFiltros);

// Inicializar
cargarPokedex();
