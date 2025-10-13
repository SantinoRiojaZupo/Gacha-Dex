let pokemonesUsuario = []; // se puede reasignar

const contenedor = document.querySelector(".contenedor-pokemones");
const busquedaInput = document.getElementById("busqueda");
const filtroTipo = document.getElementById("filtro-tipo");
const filtroGen = document.getElementById("filtro-generacion");

// Función para mostrar los pokemones en el contenedor
function mostrarPokemones(lista) {
    contenedor.innerHTML = "";

    if (lista.length === 0) {
        contenedor.innerHTML = "<p>No se encontraron Pokémon.</p>";
        return;
    }

    lista.forEach(pokemon => {
        const card = document.createElement("div");
        card.classList.add("card-pokemon");

        card.innerHTML = `
            <img src="${pokemon.imagen}" alt="${pokemon.nombre}">
            <h3>${pokemon.nombre}</h3>
            <p>Tipo: ${pokemon.tipo}${pokemon.tipo_secundario ? " / " + pokemon.tipo_secundario : ""}</p>
            <p>Generación: ${pokemon.generacion}</p>
        `;

        contenedor.appendChild(card);
    });
}

// Función para filtrar según búsqueda, tipo y generación
function aplicarFiltros() {
    const texto = busquedaInput.value.toLowerCase();
    const tipo = filtroTipo.value.toLowerCase();
    const generacion = filtroGen.value;

    const filtrados = pokemonesUsuario.filter(p => {
        const coincideNombre = p.nombre.toLowerCase().includes(texto);
        const coincideTipo = tipo === "" || p.tipo.toLowerCase() === tipo || (p.tipo_secundario && p.tipo_secundario.toLowerCase() === tipo);
        const coincideGen = generacion === "" || p.generacion.toString() === generacion;
        return coincideNombre && coincideTipo && coincideGen;
    });

    mostrarPokemones(filtrados);
}

// Cargar pokemones desde PHP
function cargarPokemones() {
    fetch("../inventario.php")
  .then(res => res.text()) // leemos como texto crudo
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
          mostrarPokemones(pokemonesUsuario);
      } catch (e) {
          console.error("❌ Error al parsear JSON:", e);
          contenedor.innerHTML = `<pre>${texto}</pre>`;
      }
  })
  .catch(err => {
      console.error(err);
      contenedor.innerHTML = "<p>Error al cargar los Pokémon.</p>";
  });
}

// Event listeners para filtros
busquedaInput.addEventListener("input", aplicarFiltros);
filtroTipo.addEventListener("change", aplicarFiltros);
filtroGen.addEventListener("change", aplicarFiltros);

// Inicializamos
cargarPokemones();