pokemonesUsuario=[];

const contenedor = document.querySelector("search-box");
const busquedaInput = document.getElementById("busqueda");
const filtroTipo = document.getElementById("filtro-tipo");
const filtroGen = document.getElementById("filtro-generacion");

function acutalizarPokedex() {
fetch('/Gacha-Dex/pokedex.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const inventory = document.getElementById('inventoryPoke');
        inventory.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevos elementos
 
        if (!Array.isArray(data)) {
                inventory.innerHTML = '<div>NO ESTAS LOGUEADOOOOOOOO</div>';
                return;
            }

        data.forEach(pokemon => {
            const pokemonDiv = document.createElement('div');
            pokemonDiv.classList.add('pokemon-card');
            if (pokemon.tiene == 1) {
                            pokemonesUsuario.push(pokemon) ;
                pokemonDiv.innerHTML = `
                <img src="${pokemon.image}" alt="${pokemon.PokemonName}">
                <h3>${pokemon.PokemonName}</h3>`
            
            }
            else{
                pokemonDiv.innerHTML=`???`
            }
            inventory.appendChild(pokemonDiv);
        })
}
    )
}
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
acutalizarPokedex();