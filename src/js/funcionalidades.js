// Function Dark-Mode (All pages)

const $html = document.querySelector('html')
const dark = document.getElementById('btn-dark')
console.log(dark);

 window.onload = function(){
    $tema = localStorage.getItem('tema');

    // Get the value of the object local storage, if its "dark", the page opens in dark mode
    if($tema == "dark"){
        $html.classList.toggle('dark-mode')
    }
}

function darkmode(){
    $tema = localStorage.getItem('tema');
    if($tema == "dark"){ // If its 'dark' in the localStorage variable, the page is in dark-mode. (The button switch to light-mode)
        $html.classList.toggle('dark-mode');
        localStorage.setItem('tema', 'light');
    }else{
        alert("ALTERANDO DARK");
        $html.classList.toggle('dark-mode');
        localStorage.setItem('tema', 'dark');
    }
}

// Function Dropdown Menu (All pages)

function dropdown(){
    const nav = document.getElementById ('menu_drop'); 
    nav.classList.toggle('active');
}

// 
function envia_contato(){
    alert("Enviou legal!");
}

function acaoBotao(){
    alert("Obrigado por seu feedback!");
}

// Function Page Register - Verify Front-End

//Variables Front-End Verification
const input_name = document.getElementById('nome');
const input_lastname = document.getElementById('sobrenome');
const input_cpf = document.getElementById('cpf');
const input_email = document.getElementById('email');
const input_tel = document.getElementById('telefone');
const input_city = document.getElementById('cidade');
const div_input_password = document.getElementById('div-senha');

//Variables Show/Hidden Password
var btn_senha = document.getElementById('btn-show-hidden-passowrd')
const input_password = document.getElementById('senha');

// Verify Name
input_name.addEventListener('blur', () =>{
    input_name.checkValidity();
    if(input_name.validity.valid == false || input_name.value == ""){
        input_name.classList.add('invalid');
    }else{
        input_name.classList.remove('invalid');
    }
});

// Verify Last Name
input_lastname.addEventListener('blur', () =>{
    input_lastname.checkValidity();
    if(input_lastname.validity.valid == false || input_lastname.value == ""){
        input_lastname.classList.add('invalid');
    }else{
        input_lastname.classList.remove('invalid');
    }
});

// Verify CPF 
input_cpf.addEventListener('blur', () =>{
    cpf.classList.remove("invalid");

    let valor = document.getElementById('cpf').value;
    let cpfSeparado = [];
    let cpfSeparado2 = [];
    let soma = 0, resto = 0;

    valor = valor.replace('.', '');
    valor = valor.replace('.', '');  
    valor = valor.replace('-', ''); 

    if(valor == '11111111111' || 
        valor == '22222222222' || 
        valor == '33333333333' ||
        valor == '44444444444' || 
        valor == '55555555555' || 
        valor == '66666666666' ||
        valor == '77777777777' || 
        valor == '88888888888' || 
        valor == '99999999999' || 
        valor == '00000000000' || 
        valor.length < 11){

        cpf.classList.add("invalid");

    }else{
        // Separando os Dígitos do CPF 
        for(let x = 0, j = 1; x < 11; x++,j++){
            if(j == 12){
                cpfSeparado[x] = valor.substring((x-2),(x-1));
            }else{
                cpfSeparado[x] = valor.substring(x,j);
            }
        }
        // Atribuição dos Números Verificadores
        let dez = cpfSeparado[9];
        let onze = cpfSeparado[10];

        // PRIMEIRO DÌGITO VERIFICADOR 
        // Convert - String to INT
        for (let x = 0; x < 9; x++) {
            cpfSeparado2[x] = cpfSeparado[x];
        }
        
        for (let x = 0, y = 10; x < 9; x++, y--) {
            cpfSeparado2[x] = cpfSeparado2[x] * y;
            soma += cpfSeparado2[x];
        } 
        resto = (soma * 10) % 11;
        
        if(resto == 10) {resto = 0;}

        if(resto == dez){
            resto = 0;
            soma = 0;
            for (let x = 0; x < 10; x++) {
                cpfSeparado2[x] = cpfSeparado[x];
            }
            for (let x = 0, y = 11; x < 10; x++, y--) {
                cpfSeparado2[x] = cpfSeparado2[x] * y;
                soma +=cpfSeparado2[x];
            }
            resto = (soma * 10) % 11;
            if(resto == 10) {resto = 0;}
            
            if( resto == onze){
                cpf.classList.remove("invalid")
                /* cpf.style.border = "solid green"; */
            }else{
                cpf.classList.add("invalid")
            }
            
        }else{
            cpf.classList.add("invalid")
        }
    }
});
// Verify Password
input_password.addEventListener('blur', () => {
    if(input_password.value == ""){
        div_input_password.classList.add('invalid');
    }else{
        div_input_password.classList.remove('invalid');
    }
});
// Verify tel
input_tel.addEventListener('blur', () =>{
    input_tel.checkValidity();
    if(input_tel.validity.valid == false || input_tel.value == ""){
        input_tel.classList.add('invalid');
    }else{
        input_tel.classList.remove('invalid');  
    }
});

// Verify email
input_email.addEventListener('blur', () =>{
    input_email.checkValidity();
    if(input_email.validity.valid == false || input_email.value == ""){
        input_email.classList.add('invalid');
    }else{
        input_email.classList.remove('invalid');
    }
});

// Verify City
input_city.addEventListener('blur', () =>{
    input_city.checkValidity();
    if(input_city.validity.valid == false || input_city.value == ""){
        input_city.classList.add('invalid');
        
    }else{
        input_city.classList.remove('invalid');
    }
});

// Show-Hidden Password
btn_senha.addEventListener('click', () => {
    if(input_password.type == "password"){
        input_password.type = "text";
    }else{
        input_password.type = "password";
    }
});

