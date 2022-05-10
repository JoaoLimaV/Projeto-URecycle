const $html = document.querySelector('html')
const dark = document.getElementById('btn-dark')

function darkmode(){
        $html.classList.toggle('dark-mode')}

function dropdown(){
    const nav = document.getElementById ('menu_drop'); 
    nav.classList.toggle ('active');
}

function envia_contato(){
    alert("Enviou legal!");
}

function duvidas(){
    window.location.href = "/src/pages/pergunta_frequentes.html"
}

function cadastrar(){
    window.location.href = "/src/pages/cadastro.html"
}