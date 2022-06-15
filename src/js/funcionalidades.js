const $html = document.querySelector('html')
const dark = document.getElementById('btn-dark')

 window.onload = function(){
    $tema = localStorage.getItem('tema');
    
    if($tema == "dark"){// SE JÁ ESTÁ DARK, QUER DIZER QUE ELE JÀ ESTÀ NO MODO ESCURO
        $html.classList.toggle('dark-mode');
    }
}

function darkmode(){
    $tema = localStorage.getItem('tema');
    
    if($tema == "dark"){ // SE JÁ ESTÁ DARK, QUER DIZER QUE ELE JÀ ESTÀ NO MODO ESCURO
        $html.classList.toggle('dark-mode');
        localStorage.setItem('tema', 'light');
    }else{
        alert("ALTERANDO DARK");
        $html.classList.toggle('dark-mode');
        localStorage.setItem('tema', 'dark');
    }
}

function dropdown(){
    const nav = document.getElementById ('menu_drop'); 
    nav.classList.toggle ('active');
}

function envia_contato(){
    alert("Enviou legal!");
}

function acaoBotao(){
    alert("Obrigado por seu feedback!");
}

