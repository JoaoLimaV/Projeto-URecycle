<?php 
class user_register_verification{
    
    var $name;
    var $last_name;
    var $cpf;
    var $email;
    var $tel;
    var $password;
    var $city;
    var $type;

    var $query_verify_bd_code;
    var $query;

    function setName($nome){
        $this->name = $nome;
    }
    function setLast_name($sobre_nome){
        $this->last_name = $sobre_nome;
    }
    function setCpf($cpf){
        $this->cpf = $cpf;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setTel($telefone){
        $this->tel = $telefone;
    }
    function setPassword($senha){
        $this->password = $senha;
    }
    function setType($tipo){
        $this->type = $tipo;
    }
    function setCity($cidade){
        $this->city = $cidade;
    }

    //  Returns
    //  0 - Nothing  error | 1 - String empty | 2 - Specific error | 3 - Specific error (optional)

    function verifyName(){
        /* include_once("conexao.php"); */
        if(!empty($this->name)){
            if(filter_var($this->name, FILTER_SANITIZE_NUMBER_INT) == ''){
                return 0;
            }else{
                return 2; // Error 2 - Presence of numbers or operators in the String
            }
        }
        else{
            return 1;
        }
    }

    function verifyLast_name(){
        /* include_once("conexao.php"); */
        if(!empty($this->last_name)){
            if(filter_var($this->last_name, FILTER_SANITIZE_NUMBER_INT) == ''){
                return 0;
            }else{
                return 2; // Error 2 - Presence of numbers or operators in the String
            }
        }
        else{
            return 1;
        }
    }

    function verifyCPF(){
        if(!empty($this->cpf)){
                if(
                    $this->cpf == '11111111111' || 
                    $this->cpf == '22222222222' || 
                    $this->cpf == '33333333333' ||
                    $this->cpf == '44444444444' || 
                    $this->cpf == '55555555555' || 
                    $this->cpf == '66666666666' ||
                    $this->cpf == '77777777777' || 
                    $this->cpf == '88888888888' || 
                    $this->cpf == '99999999999' || 
                    $this->cpf == '00000000000' ||
                    strlen($this->cpf) > 11     ||
                    strlen($this->cpf) < 11){
                return 2; // Error 2 - Invalid CPF
            }
            else{
                // Atribuição dos Números Verificadores
                $dez = $this->cpf[9];
                $onze = $this->cpf[10];
                $soma = 0;
                $resto = 0;
                
                // PRIMEIRO DÌGITO VERIFICADOR 
                for ($x = 0, $y = 10; $x < 9; $x++, $y--) {
                    $soma += $this->cpf[$x] * $y;
                /*  echo($x . ' | ' .  $this->cpf[$x] . ' * ' . $y . ' = ' . $this->cpf[$x] * $y . ' || ' .$soma . '<br>'); */
                } 

                $resto = $soma * 10;
                $resto = $resto % 11;

                if($resto == 10) {$resto = 0;}

                if($resto == $dez){
                    // SEGUNDO DÌGITO VERIFICADOR~
                    $soma = 0;
                    $resto = 0;
                    for ($x = 0, $y = 11; $x < 10; $x++, $y--) {
                        $soma += $this->cpf[$x] * $y;
                    }

                    $resto = ($soma * 10) % 11;
                    if($resto == 10) {$resto = 0;}
                
                    if($resto == $onze){
                        // CPF VALID
                        require("conexao.php");
                        $this->query_verify_bd_code = "SELECT usuario.CPF FROM usuario WHERE usuario.CPF = '$this->cpf'";
                        $this->query = mysqli_query($conexao, $this->query_verify_bd_code);
                        mysqli_close($conexao);
                        if($this->query->num_rows != 0){
                            return 3; // Error 3 - CPF already registered
                        }else{
                            return 0;
                        }   
                    }else{
                        return 2; // Error 2 - Invalid CPF
                    }
                }else{
                    return 2; // Error 2 - Invalid CPF
                }
            }
        }else{
            return 1;
        }
    }

    function verifyEmail(){
        if(!empty($this->email)){
            if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                require("conexao.php");
                $this->query_verify_bd_code = "SELECT usuario.EMAIL FROM usuario WHERE usuario.EMAIL = '$this->email'";
                $this->query = mysqli_query($conexao, $this->query_verify_bd_code);
                mysqli_close($conexao);

                if($this->query->num_rows != 0){
                    return 3; // Error 3 - Tel already registered
                }else{
                    return 0;
                }       
            }else{
                return 2; // Error 2 - Presence of letters in the Value
            }
        }
        else{
            return 1;
        }
    }

    function verifyTel(){
        if(!empty($this->tel)){
            if(filter_var($this->tel, FILTER_SANITIZE_STRING) != ''){
                require("conexao.php");
                $this->query_verify_bd_code = "SELECT usuario.TELEFONE FROM usuario WHERE usuario.TELEFONE = '$this->tel'";
                $this->query = mysqli_query($conexao, $this->query_verify_bd_code);
                mysqli_close($conexao);
                if($this->query->num_rows != 0){
                    return 3; // Error 3 - Tel already registered
                }else{
                    return 0;
                }       
            }else{
                return 2; // Error 2 - Presence of letters in the Value
            }
        }
        else{
            return 1;
        }
    }
    function verifyPassword(){
        if(!empty($this->password)){
            return 0;
        }else{
            return 1;
        }
    }
    function verifyCity(){
        if(!empty($this->city)){
            if(filter_var($this->city, FILTER_SANITIZE_NUMBER_INT) == ''){
                return 0;
            }else{
                return 2; // Error 2 - Presence of numbers or operators in the String
            }
        }
        else{
            return 1;
        }
    }

    // Execute de Query
    function querySql(){
        require("conexao.php");
        $this->query_verify_bd_code = 
            "INSERT INTO usuario (NOME, SOBRENOME, CPF, EMAIL, TELEFONE, SENHA, TIPO_USUARIO, CIDADE) 
             VALUES('$this->name', '$this->last_name', $this->cpf, '$this->email', '$this->tel', '$this->password', '$this->type', '$this->city')";
        $this->query = mysqli_query($conexao, $this->query_verify_bd_code);
        mysqli_close($conexao);
    }
}

class user_login_verification{

}

class functions{
    function removeMask_cpf($cpf){
        $cpf = str_replace(".",'',$cpf); 
        $cpf = str_replace("-",'',$cpf);

        return $cpf;
    }
    function addMask_cpf(){
        
    }
    function removeMask_tel($telefone){
        $telefone = str_replace('(','',$telefone); 
        $telefone = str_replace(')','',$telefone); 
        $telefone = str_replace(' ','',$telefone);
        $telefone = str_replace('-','',$telefone);  

        return $telefone;
    }
    function addMask_tel(){        
        
    }
}
?>
