<?php 
    include_once("conexao.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST['nome'])){ 
        $nome = $_POST["nome"];
        $sobre_nome = $_POST['sobre_nome'];

        $cpf = str_replace(".",'',$_POST["cpf"]); $cpf = str_replace("-",'',$cpf);

        $email = $_POST["email"];

        $telefone = str_replace('(','',$_POST["telefone"]); $telefone = str_replace(')','',$telefone); 
        $telefone = str_replace(' ','',$telefone);$telefone = str_replace('-','',$telefone);  

        $senha = $_POST["senha"];
        $cidade = $_POST["cidade"];

        if(isset($_POST['tipo'])){
            $tipo = $_POST['tipo'];
        }

        $_SESSION['nome'] = $_POST["nome"];
        $_SESSION['sobre_nome'] = $_POST["sobre_nome"];
        $_SESSION['cpf'] = $_POST["cpf"];
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['telefone'] = $_POST["telefone"];
        $_SESSION['cidade'] = $_POST["cidade"];
        
        /* $_SESSION['senha'] = $_POST["senha"]; */
        /* $_SESSION['tipo'] = $_POST["tipo"]; */
        

        if(!empty($nome) && !empty($sobre_nome) && !empty($cpf) && !empty($email) &&
        !empty($telefone) && !empty($senha) && !empty($tipo) && !empty($cidade)){

            $query_code = "SELECT * FROM usuario WHERE CPF = '$cpf' OR EMAIL = '$email' OR TELEFONE = '$telefone'";
            $query = mysqli_query($conexao, $query_code);
            $result = $query->num_rows;

            if($result == 0){
                $query_code = "INSERT INTO usuario (NOME, SOBRENOME, CPF, EMAIL, TELEFONE, SENHA, TIPO_USUARIO, CIDADE) 
                VALUES('$nome', '$sobre_nome', $cpf, '$email', '$telefone', '$senha', '$tipo', '$cidade')";
                $query = mysqli_query($conexao, $query_code);
                if($conexao->error){
                    die("Usuário não cadastrado erro MYSQL" . $conexao->error);
                }else{
                    session_destroy();
                    ?>  
                    <script>
                        alert('Usuário cadastrado com Sucesso!');
                        window.location.href='login.php';

                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert('CPF, EMAIL ou TELEFONE já cadastrado!');
                </script>
                <?php
            }
        }// SEGUNDO PRIMEIRO IF
        else{
            ?>
                <script>
                    alert('Preencha TODOS os dados!');
                </script>
            <?php
        }
        
    }// FIM PRIMEIRO IF
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
                <?php
                    if(isset($_SESSION['nome'])){
                ?>
                    <form method = "POST" action="">
                    <h1>Cadastro</h1>
                     <div class="form_nome">
                        <input type="text" placeholder="Nome" id="nome" name="nome" value="<?php echo($_SESSION['nome']);?>">
                        <input type="text" placeholder="Sobrenome" id="sobrenome" name="sobre_nome" value="<?php echo($_SESSION['sobre_nome']);?>">
                     </div>   
                    
                    <div>
                        <input type="text" placeholder="CPF" name="cpf" id="cpf" onChange="validaCpf()" maxlength="11" onkeypress="$(this).mask('000.000.000-00')" value="<?php echo($_SESSION['cpf']);?>">
                        <input type="email" placeholder="E-mail" name="email" id="email" value=<?php echo($_SESSION['email']);?>>
                        <input type="password" placeholder="Senha" name="senha" id="senha">
                        <input type="text" placeholder="Telefone" maxlength="11" name="telefone" id="telefone" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo($_SESSION['telefone']);?>">
                        <input type="text" placeholder="Cidade" name="cidade" id="cidade" value="<?php echo($_SESSION['cidade']);?>">
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
                <?php } 

                else{ ?>  
                        <form method = "POST" action="">
                        <h1>Cadastro</h1>
                         <div class="form_nome">
                            <input type="text" placeholder="Nome" id="nome" name="nome" value="">
                            <input type="text" placeholder="Sobrenome" id="sobrenome" name="sobre_nome" value="">
                         </div>   
                        
                        <div>
                            <input type="text" placeholder="CPF" name="cpf" id="cpf" onChange="validaCpf()" maxlength="11" onkeypress="$(this).mask('000.000.000-00')" value="">
                            <input type="email" placeholder="E-mail" name="email" id="email" value="">
                            <input type="password" placeholder="Senha" name="senha" id="senha">
                            <input type="text" placeholder="Telefone" maxlength="11" name="telefone" id="telefone" onkeypress="$(this).mask('(00) 00000-0000')" value="">
                            <input type="text" placeholder="Cidade" name="cidade" id="cidade" value="">
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
                <?php } 
                ?>     
                 

                <div id = fora_form>
                    <!-- <button id="btn_cadastrar">Cadastrar</button> -->
                    <a href="login.php" class="possui_cadastro">Já possuo cadastro</a>
                </div>
            </article>
        </article>
    </article>    
</body>
<script src="../js/funcionalidades.js"></script>
<script src="../js/cpf.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>