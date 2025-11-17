imagen = document.getElementById("0");
variantes=document.getElementById("variantes");
volverBoton= document.getElementById("volver")
if (volverBoton){
    volverBoton.addEventListener("click", ()=> {
        console.log("xdxdxdx")
     window.history.back();
    })
}
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
        console.log(res[0])
            imagen.src = res[0].image;
            document.getElementById("1").innerHTML = res[0].PokemonName;
            document.getElementById("2").innerHTML = res[0].Description;
            document.getElementById("3").innerHTML = "&nbsp" + res[0].Type + "&nbsp" + res[0].Second_type;
            document.getElementById("4").innerHTML = res[0].Weaknesses;
            document.getElementById("5").innerHTML = "&nbsp" + res[0].Abilities + "&nbsp" + res[0].Second_Abilities;
            i=0
            res.forEach(pokemon => {
               hola=document.createElement("Option");
                hola.value=i++;
                hola.text=pokemon.PokemonName;
                variantes.appendChild(hola);
                console.log("hola");
            });
            variantes.addEventListener('change',function(){
                pokemon= this.value;
                if(res[pokemon].Id_Variant>1){
                imagen.src = "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/0"+res[pokemon].Id_Pokedex+"_f"+res[pokemon].Id_Variant+".png";
                }
                else{
                    imagen.src=res[pokemon].image
                }
                console.log(imagen.src)
            document.getElementById("1").innerHTML = res[pokemon].PokemonName;
            document.getElementById("2").innerHTML = res[pokemon].Description;
            document.getElementById("3").innerHTML = "&nbsp" + res[pokemon].Type + "&nbsp" + res[pokemon].Second_type;
            document.getElementById("4").innerHTML = res[pokemon].Weaknesses;
            document.getElementById("5").innerHTML = "&nbsp" + res[pokemon].Abilities + "&nbsp" + res[pokemon].Second_Abilities;
            if (res[pokemon].Abilities_Hidden) {
                document.getElementById("6").innerHTML = res[pokemon].Abilities_Hidden;
            } else {
                document.getElementById("6").innerHTML = "Malisimo, no tiene habilidad oculta <br>(a llorarlo)";
            }
            })
                

            if (res[0].Abilities_Hidden) {
                document.getElementById("6").innerHTML = res[0].Abilities_Hidden;
            } else {
                document.getElementById("6").innerHTML = "Malisimo, no tiene habilidad oculta <br>(a llorarlo)";
            }
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