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
acutalizarPokedex();