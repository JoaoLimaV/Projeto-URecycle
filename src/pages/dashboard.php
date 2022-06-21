<?php

include_once("conexao.php");
include("sem_login.php");

if(!isset($_SESSION)){
    session_start();
}

 $query_code = "SELECT * FROM usuario WHERE ID_USUARIO = '$_SESSION[ID_USUARIO]'";
 $query = mysqli_query($conexao, $query_code);
 $usuario = $query->fetch_assoc();
 
 $_SESSION['NOME'] = $usuario['NOME'];
 $_SESSION['SOBRENOME'] = $usuario['SOBRENOME'];
 $_SESSION['CPF'] = $usuario['CPF'];
 $_SESSION['EMAIL'] = $usuario['EMAIL'];
 $_SESSION['TELEFONE'] = $usuario['TELEFONE'];
 $_SESSION['TIPO'] = $usuario['TIPO_USUARIO'];
 $_SESSION['CIDADE'] = $usuario['CIDADE'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
    
    <link rel="stylesheet" type="text/css" href="../css/base.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../fonts/font.css" media="screen"/>
    <script type="text/javascript" src="../js/funcionalidades.js"></script>
    <link rel="shortcut icon" href="/src/img/logo.png" type="image/x-icon">
    <title>Document</title>

    </style>
</head> 
<body>
    <main>
    <header>
        <!-- Inicio Logo-->
        <div id="logo"> 
            <a href="../../index.html">
                U-Recycle
            </a>
        </div> <!-- FIM Logo-->
        <!-- Inicio BOTÕES-->
        <div id="botoes_header">
            <button class="btn_redondo" id="interrogacao" onclick="location.href='pergunta_frequentes.html'">Dúvidas</button>
            <button class="btn_redondo" id="darkmode" onclick="darkmode()">Dark Mode</button>
            <button id="sair" onclick="location.href='sair.php'">SAIR</button>
        </div><!-- FIM BOTÕES-->

        <div id="menu_drop">
            <button onclick="dropdown()" id ="btn_drop">
                Menu
            </button>
            
            <nav id = nav_drop_down> 
                <ul>
                    <li>
                        <a onclick="darkmode()">Dark-Mode</a>
                    </li>
                    <li>
                        <a href="/src/pages/pergunta_frequentes.html">Dúvidas</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header><!-- FIM Cabeçalho-->
    <div id = "separador">
        
    </div>
    <article id = "container">
        <article id="container_esquerda">

        </article>

        <article id="container_direita">
            <h1>
                Olá, <?php echo($_SESSION['NOME']) ?> o que deseja fazer?
            </h1>
                    <a href="configuracao_usuario.php" class="cor_alink">Perfil</a>
                    <a href="pedidos.php" class="cor_alink">Fazer Pedido</a>
                    <a href="historico.php" class="cor_alink">Histórico de Pedidos</a>
        </article>
    </article>

   
</main>
</body>