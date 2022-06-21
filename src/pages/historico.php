<?php
include_once("conexao.php");
include("sem_login.php");

if(!isset($_SESSION)){
    session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
    
    <link rel="stylesheet" type="text/css" href="../css/base.css" media="screen" />
    <link rel="stylesheet" href="../css/historico.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font.css" media="screen"/>
    <script type="text/javascript" src="../js/funcionalidades.js"></script>

    <title>Historico</title>

    </style>
</head>

<body>
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
        <div id = "separador"></div>
    <!-- FIM Cabeçalho-->
    <main>      
        <article id = "container_itens">
            <h1> Histórico</h1>
            <article id = "historico">
                <article id ="pesquisar">
                    <input type="text" id="pesquisa" name="pesquisa" placeholder="Digite o Número do Pedido">

                    <article id = "imagem_pesquisa">
                        <img src="../img/historico/lupa.png"height="70%">
                    </article>
                </article>
                <article class = "caixa_historico concluido">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #01 </p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status concluido">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CONCLUIDO</p>
                    </div>
                </article>
                <article class = "caixa_historico concluido">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #02</p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status concluido">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CONCLUIDO</p>
                    </div>
                </article>
                <article class = "caixa_historico pendente">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #03 </p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status pendente">
                            <p class = "titulo_status">STATUS: </p>
                            <p>PENDENTE</p>
                    </div>
                </article>
                <article class = "caixa_historico pendente">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #04</p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status pendente">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CANCELADO</p>
                    </div>
                </article>
                <article class = "caixa_historico cancelado">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #05</p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status cancelado">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CANCELADO</p>
                    </div>
                </article>
                <article class = "caixa_historico cancelado">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #06 </p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status cancelado">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CANCELADO</p>
                    </div>
                </article>
                <article class = "caixa_historico cancelado">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #07 </p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status cancelado">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CANCELADO</p>
                    </div>
                </article>
                <article class = "caixa_historico cancelado">
                    <div class ="img_pedido"></div>
                    <div class ="texto">
                    <p>Número do Pedido: #08 </p><br>
                    <p>DATA: 00/00/0000</p>
                    </div>
                    <div class ="status cancelado">
                            <p class = "titulo_status">STATUS: </p>
                            <p>CANCELADO</p>
                    </div>
                </article>
            </article>
        </article>
    </main>

    <footer>
        <p>@Copyright 2022 Todos os direitos reservados<span class="aqui"> U-Recycle</span></p>
        
    <article id = "redes_sociais">
       <span class="box_social">
            <a href="" class="face">F</a>
       </span>   

       <span class="box_social">
            <a href="" class="insta">I</a>
       </span>  

       <span class="box_social">
            <a href="" class="twitter">T</a>
       </span>   

       <span class="box_social">
            <a href="" class="whats">W</a>
       </span> 
    </article>
</footer>

</body>