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
                pokemonDiv.innerHTML = `
                <img id="${pokemon.Id_Pokedex}" src="${pokemon.image}" alt="${pokemon.PokemonName}">
                <h3>${pokemon.PokemonName}</h3>`
            pokemonDiv.id=pokemon.Id_Pokedex
            pokemonDiv.addEventListener('click', ()=>{
              let idPokemon=pokemon.Id_Pokedex
             window.location.href = `index.php?page=DetallesPokemon&idpokemon=${idPokemon}`

            })
            }
            else{
                pokemonDiv.innerHTML=`???`
            }
            inventory.appendChild(pokemonDiv);
        })
}
    )
}
acutalizarPokedex();