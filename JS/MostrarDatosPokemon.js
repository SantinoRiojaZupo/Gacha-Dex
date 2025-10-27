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
                imagen=document.getElementById("0")
                imagen.src=pokemon.image
                document.getElementById("1").innerHTML=pokemon.PokemonName
                 document.getElementById("2").innerHTML=pokemon.Description
                document.getElementById("3").innerHTML=pokemon.Type + "," + "&nbsp"+ pokemon.Second_type
                document.getElementById("4").innerHTML=pokemon.Weaknesses
                document.getElementById("5").innerHTML=pokemon.Abilities + "," + "&nbsp"+ pokemon.Second_Abilities
                document.getElementById("6").innerHTML="<br>" +pokemon.Abilities_Hidden
                })
            });
