var deta = document.getElementById('plus')
var hidden = document.getElementById('baixo')


deta.addEventListener('click', () =>{
 if(deta.classList.contains("down")){
   deta.classList.remove('down')
  hidden.style.visibility = "hidden"
 }else{
  deta.classList.add('down')
  hidden.style.visibility = "visible"
  
 }
})
