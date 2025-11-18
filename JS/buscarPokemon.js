
function buscarPokemon(){
    console.log("click en buscar")
    let resultados = document.getElementById('resultados')
    resultados.innerHTML = ''
    const query = document.getElementById('buscarPokemonDP').value;
    if (!query) {
        resultados.innerHTML = "<li>Escribí algo</li>";
        resultados.classList.remove('resultadosVisibles');
        resultados.classList.add('resultadosInvisibles');
   return; 
    }
    resultados.classList.remove('resultadosInvisibles');
    resultados.classList.add('resultadosVisibles');
        if (query.length > 0) {
        fetch('../buscarPokemon.php?query=' + encodeURIComponent(query))
        .then(res => res.json())
        .then(data => {
            console.log(data)
            if (!Array.isArray(data)) {
                resultados.innerHTML = "<li>Error en la respuesta del servidor</li>";
                return;
            }
            if (data.length === 0) {
                resultados.innerHTML = "<li>No se encontraron pokemones</li>";
                return;
            }
         data.forEach(element => {
            const li = document.createElement('li');
            li.classList.add('resultado')
            const nombreCodificado = encodeURIComponent(element.PokemonName);
            li.innerHTML = `<button><a href="index.php?page=DetallesPokemon&idpokemon=${element.Id_Pokedex}">${element.PokemonName}</a></button>`;
            resultados.appendChild(li)
         });
        })
    }
}
