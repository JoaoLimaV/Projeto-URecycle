<?php 
 include_once("conexao.php");

 if(isset($_POST["login"])){
      $login = $_POST["login"];
      $senha = $_POST["senha"];

      $query_code = "SELECT * FROM usuario WHERE EMAIL = '$login' AND SENHA = '$senha' OR CPF = '$login' AND SENHA = '$senha'";
      $query = mysqli_query($conexao, $query_code) or die($conexao->error);
      $result = $query->num_rows;
  
          if($result == 1){
              $usuario = $query->fetch_assoc();

              if(!isset($_SESSION['ID_USUARIO'])){
                  session_start();
              }
              $_SESSION['ID_USUARIO'] = $usuario['ID_USUARIO'];
              header('Location: dashboard.php');
          }else{
            ?>
                <script>
                    alert('Login ou Senha Incorreto');
                </script>
                <?php
          }
 }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" type="text/css" href="../css/login.css" media="screen"/>
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
            <!-- <button class="btn_normal" onclick="location.href='cadastro.php'">Cadastrar</button>
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
                <h1>NÓS VAMOS ATÉ VOCÊ</h1>
                <div class="img_form">
                    <img src="../img/caminhao-removebg-preview-removebg-preview.png">
                </div>
            </article>  

            <article id="container_direita">
                
                <form method = "POST" action="">
                    <h1>login</h1>
                        <input type="text" placeholder="E-mail ou CPF" name="login" id="login">
                        <input type="password" placeholder="Senha" name="senha" id="senha">

                    <div class="redes_sociais">
                        <button id="btn_facebook">Facebook</button>
                        <button id="btn_google">Google</button>
                    </div>
                    <input type="submit" id="btn_cadastrar">
                </form>
                <div id = fora_form>
                    <!-- <button id="btn_cadastrar" onclick="location.href='dashboard.php'">Entrar</button> -->
                    <a href="cadastro.php" class="">Não possuo cadastro</a>
                    <a href="" class="segundo_a">Esqueci a senha</a>
                </div>
            </article>
        </article>
    </article>    
</body>
<script src="../js/funcionalidades.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>