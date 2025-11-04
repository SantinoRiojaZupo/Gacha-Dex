imagen = document.getElementById("0");
fetch("/Gacha-Dex/DetallesPokemon.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "idpokemon=" + encodeURIComponent(idpokemon)
})
.then(res => res.json())
.then(res => {
    if (res.error) {
        console.log(res.error);
    } else if (res.length > 0){
        res.forEach(pokemon => {
            console.log(res);
            console.log(typeof obj)
            console.log("Tipo de res:", typeof res);
            console.log(pokemon.PokemonName);
            imagen.src = pokemon.image;
            document.getElementById("1").innerHTML = pokemon.PokemonName;
            document.getElementById("2").innerHTML = pokemon.Description;
            document.getElementById("3").innerHTML = "&nbsp" + pokemon.Type + "&nbsp" + pokemon.Second_type;
            document.getElementById("4").innerHTML = pokemon.Weaknesses;
            document.getElementById("5").innerHTML = "&nbsp" + pokemon.Abilities + "&nbsp" + pokemon.Second_Abilities;

            if (pokemon.Abilities_Hidden) {
                document.getElementById("6").innerHTML = pokemon.Abilities_Hidden;
            } else {
                document.getElementById("6").innerHTML = "Malisimo, no tiene habilidad oculta <br>(a llorarlo)";
            }
        });
    }
    else{

            
    document.getElementById("1").innerHTML = "???";
    document.getElementById("2").innerHTML = "???";
    document.getElementById("3").innerHTML = "???";
    document.getElementById("4").innerHTML = "???";
    document.getElementById("5").innerHTML = "???";
    document.getElementById("6").innerHTML = "???";
 imagen.src ="../imagenes/locked.png";

   
}
})
if(idpokemon>1){
    let anteriorId = parseInt(idpokemon) - 1;
    document.getElementById("anterior").innerHTML = '←&nbspN°' + anteriorId;
    boton1 = document.getElementById("anterior");
    boton1.onclick = function() {
        window.location.href = `index.php?page=DetallesPokemon&idpokemon=${anteriorId}`;
    };}
    else{ 
        let anteriorId = parseInt(idpokemon) +1024;
    document.getElementById("anterior").innerHTML = '←&nbspN°' + anteriorId;
    boton1 = document.getElementById("anterior");
    boton1.onclick = function() {
        window.location.href = `index.php?page=DetallesPokemon&idpokemon=${anteriorId}`;
    };}
 
if(idpokemon<1025){
    let posteriorId = parseInt(idpokemon) + 1;
    document.getElementById("posterior").innerHTML = "&nbspN°" + posteriorId + "&nbsp→";
    boton2 = document.getElementById("posterior");
    boton2.onclick = function() {
        window.location.href = `index.php?page=DetallesPokemon&idpokemon=${posteriorId}`;
    };}
    else{
    let posteriorId = parseInt(idpokemon) -1024 ;
    document.getElementById("posterior").innerHTML = "&nbspN°" + posteriorId + "&nbsp→";
    boton2 = document.getElementById("posterior");
    boton2.onclick = function() {
        window.location.href = `index.php?page=DetallesPokemon&idpokemon=${posteriorId}`;
    };}