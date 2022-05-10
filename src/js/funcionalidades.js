function darkmode(){
    const $html = document.querySelector('html')
    $html.classList.toggle('dark-mode')
}

function dropdown(){
    const nav = document.getElementById ('menu_drop'); 
    nav.classList.toggle ('active');
}

function envia_contato(){
    alert("Enviou legal!");
}