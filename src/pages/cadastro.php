<?php 
    
    require_once("class-php/class.php");

    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['start'])){

        if(time() - $_SESSION['start'] >= 300){
            // esse destroy vai dar conflito com usuário logado arrumar.  
            session_destroy();
            header('Location: cadastro.php');
            exit;
        }
        /* echo (time() - $_SESSION['start']); */
    }
    if(isset($_POST['nome'])){ 
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        if(!isset($_SESSION['start'])){
            $_SESSION['start'] = time();
        }
        // Create Object Functions
        $functions = new functions;

        $nome = $_POST["nome"];
        $sobre_nome = $_POST['sobre_nome'];
        $cpf = $_POST['cpf'];
        $cpf = $functions->removeMask_cpf($cpf);
        $email = $_POST["email"];
        $telefone = $_POST['telefone'];
        $telefone = $functions->removeMask_tel($telefone);  
        $senha = $_POST["senha"];
        $cidade = $_POST["cidade"];
        $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : "";

        $_SESSION['nome'] = $_POST["nome"];
        $_SESSION['sobre_nome'] = $_POST["sobre_nome"];
        $_SESSION['cpf'] = $_POST["cpf"];
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['telefone'] = $_POST["telefone"];
        $_SESSION['cidade'] = $_POST["cidade"];

        // Create Object
        $user_verification = new user_register_verification;
        $user_verification->setName($nome);
        $user_verification->setLast_name($sobre_nome);
        $user_verification->setCpf($cpf);
        $user_verification->setEmail($email);
        $user_verification->setTel($telefone);
        $user_verification->setPassword($senha);
        $user_verification->setType($tipo);
        $user_verification->setCity($cidade);

        
        /* 
            [0] - input-nome    | [1] - input-sobrenome
            [2] - input-cpf     | [3] - input-email
            [4] - input-tel     | [5] - input-cidade 
        */
        
        // Array Error Validation Values

        $error[0] = $user_verification->verifyName();
        $error[1] = $user_verification->verifyLast_name();
        $error[2] = $user_verification->verifyCPF();
        $error[3] = $user_verification->verifyEmail();
        $error[4] = $user_verification->verifyTel();
        $error[5] = $user_verification->verifyPassword();
        $error[6] = $user_verification->verifyCity();

        if(in_array(1, $error) == true || in_array(2, $error) == true || in_array(3, $error) == true){
            $_SESSION['error'] = $error;
        }else{
            $user_verification->querySql();
            session_destroy();
            header('Location: login.php');
        }    
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" type="text/css" href="../css/cadastro.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../fonts/font.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/base.css" media="screen"/>
    <link rel="icon" type="image/x-icon" href="/src/img/logo.png">
    <title>Cadastro U-Recycle</title>
</head>
<body>
    <header>
        <!-- Inicio Logo-->
        <div id="logo"> 
            <a href="../../index.html">
                U-Recycle
            </a>
        </div> <!-- FIM Logo-->

        <nav> 
            <ul>
                <li>
                    <a href="../../index.html" >Home</a>
                </li>
                <li>
                    <a href="reciclagem.html">Reciclagem</a>
                </li>
                <li>
                    <a href="dicas.html" >Dicas</a>
                </li>
                <li>
            </nav>
        <!-- Inicio BOTÕES-->
        <div id="botoes_header">
            <button class="btn_redondo" id="interrogacao" onclick="location.href='pergunta_frequentes.html'">Dúvidas</button>
            <button class="btn_redondo" id="darkmode" onclick="darkmode()">Dark Mode</button>
            <!-- <button class="btn_normal" onclick="location.href='cadastro.html'">Cadastrar</button>
            <button class="btn_normal" onclick="location.href='login.php'">Entrar</button> -->
        </div><!-- FIM BOTÕES-->
        <div id="menu_drop">
            <button onclick="dropdown()" id ="btn_drop">
                Menu
            </button>
            
            <nav id = nav_drop_down> 
                <ul>
                    <li>
                        <a class="ViewCelular" href="../../index.html" >Home</a>
                    </li>
                    <li class="ViewCelular">
                        <a href="reciclagem.html" >Reciclagem</a>
                    </li>
                    <li class="ViewCelular">
                        <a href="dicas.html" >Dicas</a>
                    </li>
                    <li>
                        <a href="login.php">Entrar</a>
                    </li>
                    <li>
                        <a onclick="darkmode()">Dark-Mode</a>
                    </li>
                    <li>
                        <a href="pergunta_frequentes.html">Dúvidas</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header><!-- FIM Cabeçalho-->
    <div id = "separador"></div>

    <!-- COMEÇO TUDO-->
    <article id = "container">

        <article id = "container_principal">

            <article id="container_esquerda">
                <h1>Você faz a diferença!</h1>
                <div class="img_form">
                    <img src="../img/Cadastro.png">
                </div>
            </article>  

            <article id="container_direita">
                <!-- USUÁRIO SEM $_SESSION!-->
                    <form method = "POST" action="">
                    <h1>Cadastro</h1>
                     <div class="form_nome">
                        <input type="text" class = ''placeholder="Nome" id="nome" name="nome"  pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" value="<?php echo (isset($_SESSION['nome'])) ? $_SESSION['nome'] : "";?>">
                        <input type="text" class = '' placeholder="Sobrenome" id="sobrenome" name="sobre_nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" value="<?php echo (isset($_SESSION['sobre_nome'])) ? $_SESSION['sobre_nome'] : "";?>"><br>
                     </div>   
                     <p class ="p-error" id = "p-error-nome-sobre"> * </p>
                    <div id ="campos-input">
                        <input type="text" class = '' placeholder="CPF" name="cpf" id="cpf" maxlength="11" onkeypress="$(this).mask('000.000.000-00')" value="<?php echo (isset($_SESSION['cpf'])) ? $_SESSION['cpf'] : "";?>">
                        <p class ="p-error" id = "p-error-cpf" > * </p>
                        <input type="email" class = '' placeholder="E-mail" name="email" id="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : "";?>">
                        <p class ="p-error" id = "p-error-email"> * </p>
                        <div id = "div-senha" class = ''><input type="password" class = '' placeholder="Senha" name="senha" id="senha"> <span id = "btn-show-hidden-passowrd"></span></div>
                        <p class ="p-error" id = "p-error-senha"> * </p>
                        <input type="text" class = '' placeholder="Telefone" maxlength="11" name="telefone" id="telefone" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo (isset($_SESSION['telefone'])) ? $_SESSION['telefone'] : "";?>"> 
                        <p class ="p-error" id = "p-error-telefone"> * </p>
                        <input type="text" class = '' placeholder="Cidade" name="cidade" id="cidade" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" value="<?php echo (isset($_SESSION['cidade'])) ? $_SESSION['cidade'] : "";?>">
                        <p class ="p-error" id = "p-error-cidade"> * </p>
                    </div>
                    
                    <div class="radio">
                            <span><input type="radio" name="tipo" id="pessoaFisica" class="radio" value="1"><label for="pessoaFisica">Pessoa Fisica</label></span>
                            <span><input type="radio" name="tipo" id="pessoaJuridica" class="radio" value="2"><label for="pessoaJuridica">Pessoa Juridica</label></span>
                    </div>
                    <!--<button id="btn_cadastrar" onclick="fazCadastro()">Cadastrar</button>-->
                    
                    <div class="redes_sociais">
                        <button id="btn_facebook">Facebook</button>
                        <button id="btn_google">Google</button>
                    </div>
                    <input type="submit" id="btn_cadastrar">
                </form>
                        
                <div id = fora_form>
                    <!-- <button id="btn_cadastrar">Cadastrar</button> -->
                    <a href="login.php" class="possui_cadastro">Já possuo cadastro</a>
                </div>
            </article>
        </article>
    </article>    
</body>

<script src="../js/funcionalidades.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>

<?php 
    if(isset($_SESSION['error'])){
        echo("
        <script> 
         var error_input = [
            '" . $_SESSION['error'][0] . "',
            '" . $_SESSION['error'][1] . "',
            '" . $_SESSION['error'][2] . "',
            '" . $_SESSION['error'][3] . "',
            '" . $_SESSION['error'][4] . "',
            '" . $_SESSION['error'][5] . "',
            '" . $_SESSION['error'][6] . "'
        ];
        </script>");
    }
?>
<script>
    window.onload = function(){
        /* 
                [0] - input-nome    | [1] - input-sobrenome
                [2] - input-cpf     | [3] - input-email
                [4] - input-tel     | [5] - input-senha
                [6] - input-cidade  
        */
        if(typeof error_input != "undefined"){
            var duplicate = false;
            if(error_input[0] != 0){
                input_name.classList.add('invalid');
                switch(error_input[0]){
                    case '1':
                        var text = document.createTextNode("Preencha os Campos");
                        var duplicate = true;
                    break;
                    case '2':
                        var text = document.createTextNode("Apenas Letras e Caracteres Especiais São Aceitos");
                        var duplicate = true;
                    break;
                }
                p_name.appendChild(text);
                p_name.style.visibility="visible";
            }   
            if(error_input[1] != 0){
                input_lastname.classList.add('invalid');
                if(duplicate == false){
                    switch(error_input[1]){
                        case '1':
                            var text = document.createTextNode("Preencha os Campos");
                        break;
                        case '2':
                            var text = document.createTextNode("Apenas Letras e Caracteres Especiais São Aceitos");
                        break;
                    }
                    p_name.appendChild(text);
                    p_name.style.visibility="visible";
                }
            }
            if(error_input[2] != 0){
                input_cpf.classList.add('invalid');
                switch(error_input[2]){
                    case '1':
                        var text = document.createTextNode("Preencha o Campo");
                    break;
                    case '2':
                        var text = document.createTextNode("CPF inválido");
                    break;
                    case '3':
                        var text = document.createTextNode("CPF Já Registrado");
                    break;
                }
                p_cpf.appendChild(text);
                p_cpf.style.visibility="visible";
            }
            if(error_input[3] != 0){
                input_email.classList.add('invalid');
                switch(error_input[3]){
                    case '1':
                        var text = document.createTextNode("Preencha o Campo");
                    break;
                    case '2':
                        var text = document.createTextNode("Email inválido");
                    break;
                    case '3':
                        var text = document.createTextNode("Email Já Registrado");
                    break;
                }
                p_email.appendChild(text);
                p_email.style.visibility="visible";
            }
            if(error_input[4] != 0){
                input_tel.classList.add('invalid');
                switch(error_input[4]){
                    case '1':
                        var text = document.createTextNode("Preencha o Campo");
                    break;
                    case '2':
                        var text = document.createTextNode("Telefone inválido");
                    break;
                    case '3':
                        var text = document.createTextNode("Telefone Já Registrado");
                    break;
                }
                p_tel.appendChild(text);
                p_tel.style.visibility="visible";
            }
            if(error_input[5] != 0){
                div_input_password.classList.add('invalid');
                switch(error_input[5]){
                    case '1':
                        var text = document.createTextNode("Preencha o Campo");
                    break;
                }
                p_password.appendChild(text);
                p_password.style.visibility="visible";
            }
            if(error_input[6] != 0){
                input_city.classList.add('invalid');
                switch(error_input[6]){
                    case '1':
                        var text = document.createTextNode("Preencha o Campo");
                    break;
                    case '2':
                        var text = document.createTextNode("Apenas Letras e Caracteres Especiais São Aceitos");
                    break;
                }
                p_city.appendChild(text);
                p_city.style.visibility="visible";
            }
        }
    }
</script>

