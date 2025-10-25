let li1=document.getElementById("li1")
let li2=document.getElementById("li2")
let li3=document.getElementById("li3")
li1.addEventListener('click', ()=>{
window.location.href = "index.php?page=main"
})
li2.addEventListener('click', ()=>{
window.location.href = "index.php?page=pokedex"
})
li3.addEventListener('click', ()=>{
window.location.href = "index.php?page=chat"  
})
li4.addEventListener('click', ()=>{
window.location.href = "index.php?page=registro"  
})
li5.addEventListener('click', ()=>{
window.location.href = "index.php?page=Login"  
})