function validaCpf(){
    let cpf = document.getElementById("cpf");
    let valor = document.getElementById("cpf").value;
    let cpfSeparado = [];
    let cpfSeparado2 = [];
    let soma = 0, resto = 0;


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


        cpf.style.borderColor = "red";


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
                cpf.style.borderColor = "blue";
            }else{
                cpf.style.borderColor = "red";
            }
            
        }else{
            cpf.style.borderColor = "red";
        }
    }
}