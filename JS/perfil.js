   const espacioFavorito = document.getElementById('espacioFavorito');
   const espacioShiny= document.getElementById('espacioShiny');
function cambiarDescripcion() {
    nuevoNombre = document.querySelector('[name="nuevoNombre"]').value;
    bios = document.getElementById('bios');
    restrincion=/[^A-Za-z0-9_-]/;
     if((nuevoNombre.length>=6)){
    for (let i = 0; i < nuevoNombre.length; i++) {
             let caracter = nuevoNombre.charAt(i);
             if(restrincion.test(caracter)){
                document.getElementById("errores").innerHTML="unicos carcteres especiales permitido son - _"
                return
             }
            }
    if(nuevoNombre!=="" & bios!==""){
    fetch("/Gacha-Dex/usuario.php", {
        method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "nuevoNombre=" + encodeURIComponent(nuevoNombre) + "&bios=" + encodeURIComponent(bios.value)
        }) //POST
            .then(res => res.json())
            .then(res => {
                if (res.error) {
                    // Muestra el error en la página
                    mostrarMensaje(res.msj, false);
                } else {
                    mostrarMensaje("Cambio de nombre exitoso.", true);
                }
            });
    } else {
            document.getElementById("errores").innerHTML="Escribi algo";
    }
}
else{
    document.getElementById("errores").innerHTML="el nombre de usurio debe de ser de 6 caracteres de minimo"
}
}

function mostrarMensaje(mensaje, exito) {
    const container = document.querySelector(".login-container"); //esperen un momento
    if (!container) return;
    // Elimina mensajes anteriores
    const oldMsg = container.querySelector(".success-message, .error-message");
    if (oldMsg) oldMsg.remove(); 
    // Crea y agrega el nuevo mensaje
    const div = document.createElement("div");
    div.className = exito ? "success-message" : "error-message";
    div.innerHTML = `<p>${mensaje}</p>`;
    container.appendChild(div);
}
function pokedexUsuario(idUsuario) {
fetch('/Gacha-Dex/pokemonUsuario.php?id=' + encodeURIComponent(idUsuario))
    .then(response => response.json())
    .then(data => {
        console.log(data);
        const inventory = document.getElementById("sidebar");
        inventory.innerHTML = '';
        data.forEach(pokemon => {
            let sidebar = document.getElementById("sidebar");
            const pokemonDiv = document.createElement('div');
            pokemonDiv.classList.add("sprite-box");
            imagen = pokemon.Image.toLowerCase();
            if (pokemon.tiene == 1) {
                pokemonDiv.innerHTML = `
                <img src="${imagen}" alt="${pokemon.PokemonName}">
                <h3>${pokemon.PokemonName}</h3>
                `
            
            }
            else{
                pokemonDiv.innerHTML=`???`
            }
            sidebar.appendChild(pokemonDiv);
        })
}
    )
}
 pokedexUsuario(idUsuario);
function cargarPokemones(idUsuario) {
    let contenedor = document.getElementById("espacioFavorito");
    fetch(`/Gacha-Dex/inventario.php?id=${encodeURIComponent(idUsuario)}`)
        .then(res => res.text())
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
        mostrarPokemones
}

function mostrarPokemones(lista) {
    let contenedor=document.getElementById("espacioFavorito");

    if (lista.length === 0) {
        contenedor.innerHTML = "<p>No se encontraron Pokémon.</p>";
        return;
    }

    lista.forEach(pokemon => {
        const nombre = pokemon.nombre.toLowerCase();
        const card = document.createElement("div");
        const esShiny = pokemon.shiny === 1;
        const esFavorito = pokemon.favorito === 1;

        // Asignar clase base
        card.classList.add(esShiny ? "card-pokemon-shiny" : "card-pokemon");
        if (esFavorito) card.classList.add("card-pokemon-favorito");

        // URL de imagen
        const imagen = esShiny
            ? `https://img.pokemondb.net/sprites/home/shiny/2x/${nombre}.jpg`
            : `https://img.pokemondb.net/sprites/home/normal/2x/${nombre}.jpg`;

        // Botón con estado actual
        const corazon = esFavorito ? "❤️" : "♡";

        if (esShiny)
{

        espacioShiny.innerHTML += `
            <img src="${imagen}" alt="${pokemon.nombre}">
            <p>${pokemon.nombre}</p>
        `;
    }

if (esFavorito)
{

        espacioFavorito.innerHTML += `
            <img src="${imagen}" alt="${pokemon.nombre}">
            <p>${pokemon.nombre}</p>
        `;
    }
        contenedor.appendChild(card);
    });
}

window.onload = () => {
    cargarPokemones(idUsuario);
}


function mostrarImagenPerfil(idUsuario){
fetch('/Gacha-Dex/usuarioImagen.php?id=' + encodeURIComponent(idUsuario))
.then(res => res.json())
.then(data => { 
    console.log(data)
    if (data.error) {
        console.error("Error al obtener la imagen de perfil:", data.error);
        return;
    }
    document.getElementById("imagenPerfil").innerHTML= `<img src="${data.foto}" alt="imagen1"></img>`


})

}