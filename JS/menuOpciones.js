let li1=document.getElementById("li1")
let li2=document.getElementById("li2")
let li3=document.getElementById("li3")
let li4=document.getElementById("li4")
let li5=document.getElementById("li5")
li1.addEventListener('click', ()=>{
window.location.href = "index.php?page=main"
});
li2.addEventListener('click', ()=>{
window.location.href = "index.php?page=pokedex"
});
li3.addEventListener('click', ()=>{
window.location.href = "index.php?page=chat"  
})
if(li4 && li5){
li4.addEventListener('click', ()=>{
window.location.href = "index.php?page=registro"  
});

li5.addEventListener('click', ()=>{
window.location.href = "index.php?page=Login"  
})
}
