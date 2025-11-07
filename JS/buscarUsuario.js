
let delay;
const input = document.getElementById('buscadorUsuario');
const resultados = document.getElementById('resultadosBusqueda');
resultados.classList.add('resultadosInvisibles');

// Escucha cada vez que se escribe algo
input.addEventListener('input', () => {
  clearTimeout(delay);
  delay = setTimeout(() => {
    buscarUsuarios(); // función que hace el fetch
  }, 300); // espera 300 ms desde la última tecla
});

function buscarUsuarios(){
    resultados.innerHTML = ''
    console.log("Botón de búsqueda clickeado");
    const query = document.getElementById('buscadorUsuario').value;
    if (!query) {   
        resultados.innerHTML = "";
        resultados.classList.remove('resultadosVisibles');
        resultados.classList.add('resultadosInvisibles');
        
   return; 
    }
    resultados.classList.remove('resultadosInvisibles');
    resultados.classList.add('resultadosVisibles');
    if (query.length > 0) {
        fetch('../buscarUsuario.php?query=' + encodeURIComponent(query))
        .then(res => res.json())
        .then(data => {
            if (!Array.isArray(data)) {
                resultados.innerHTML = "<li>Error en la respuesta del servidor</li>";
                return;
            }
            if (data.length === 0) {
                resultados.innerHTML = "<li>No se encontraron usuarios</li>";
                return;
            }
         data.forEach(element => {
            const li = document.createElement('li');
            li.classList.add('resultado')
            
            li.innerHTML = `<a href="index.php?page=perfil&id=${element.Id_User}&nombre=${element.Name_User}">${element.Name_User}</a>`; //aca esta lo q dije
            resultados.appendChild(li)
         });
        })
    }
    else {
        resultados.classList.remove('resultadosVisibles');
        resultados.classList.add('resultadosInvisibles');
    }




}


    document.addEventListener('click', (e) => {
    if (!e.target.closest('.busqueda')) {
        resultados.classList.remove('resultadosVisibles');
        resultados.classList.add('resultadosInvisibles');
    }
});