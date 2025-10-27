       fetch("/Gacha-Dex/DetallesPokemon.php", {
        method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "idpokemon=" + encodeURIComponent(idpokemon)
        })

            .then(res => res.json())
            .then(res => {
                res.forEach(pokemon => {
                console.log(res);
                console.log(pokemon.PokemonName)
                if(res!=""){
                    imagen=document.getElementById("0")
                imagen.src=pokemon.image
                document.getElementById("1").innerHTML=pokemon.PokemonName
                 document.getElementById("2").innerHTML=pokemon.Description
                document.getElementById("3").innerHTML= "&nbsp"+pokemon.Type  + "&nbsp"+ pokemon.Second_type
                document.getElementById("4").innerHTML=pokemon.Weaknesses
                document.getElementById("5").innerHTML= "&nbsp"+pokemon.Abilities  + "&nbsp"+ pokemon.Second_Abilities
                if(pokemon.Abilities_Hidden){
                    document.getElementById("6").innerHTML=pokemon.Abilities_Hidden
                }
                else{
                    document.getElementById("6").innerHTML="Malisimo, no tiene habilidad oculta <br>(a llorarlo)"
                }
                  idpokemon=parseInt(idpokemon)
                  idpokemon=idpokemon-1
                document.getElementById("anterior").innerHTML= '←'+"&nbsp"+ "N°" +idpokemon
                boton1=document.getElementById("anterior")
                boton1.onclick=function(){
                window.location.href =`index.php?page=DetallesPokemon&idpokemon=${idpokemon}`;
                }
                idpokemon=idpokemon+2
                document.getElementById("posterior").innerHTML= "&nbsp"+" N°" +idpokemon +"&nbsp"+ "→"
                boton2=document.getElementById("posterior")
                boton2.onclick=function(){
                window.location.href =`index.php?page=DetallesPokemon&idpokemon=${idpokemon}`;
                }
            }
            else{
                document.getElementById("1").innerHTML="???"
                document.getElementById("2").innerHTML="???"
                document.getElementById("3").innerHTML="???"               
                document.getElementById("4").innerHTML="???"  
                document.getElementById("5").innerHTML="???"
                document.getElementById("6").innerHTML="???"
            }
                
                })
            });