<?php 

include_once("conexao.php");
include("sem_login.php");

if(!isset($_SESSION)){
    session_start();
}

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="../css/pedidos.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../fonts/font.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/base.css" media="screen" />
    <script type="text/javascript" src="../js/funcionalidades.js"></script>

    <title>Meus Pedidos</title>

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
            </div>
            <!-- FIM Logo-->

            <nav>
                <ul>
                    <li>
                        <a href="../../index.html">Home</a>
                    </li>
                    <li>
                        <a href="reciclagem.html" class="aqui">Reciclagem</a>
                    </li>
                    <li>
                        <a href="dicas.html">Dicas</a>
                    </li>
                    <li>
            </nav>
            <!-- Inicio BOTÕES-->
            <div id="botoes_header">
                <button class="btn_redondo" id="interrogacao" onclick="location.href='pergunta_frequentes.html'">Dúvidas</button>
                <button class="btn_redondo" id="darkmode" onclick="darkmode()">Dark Mode</button>
                <button id="sair" onclick="location.href='sair.php'">SAIR</button>
            </div>
            <!-- FIM BOTÕES-->
            <div id="menu_drop">
                <button onclick="dropdown()" id="btn_drop">
                Menu
            </button>

                <nav id=n av_drop_down>
                    <ul>
                        <li>
                            <a class="ViewCelular" href="../../index.html">Home</a>
                        </li>
                        <li class="ViewCelular">
                            <a href="reciclagem.html" class="aqui">Reciclagem</a>
                        </li>
                        <li class="ViewCelular">
                            <a href="dicas.html">Dicas</a>
                        </li>
                        <li>
                            <a href="login.php">Entrar</a>
                        </li>
                        <li>
                            <a href="cadastro.php">Cadastrar</a>
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
        </header>
        <!-- FIM Cabeçalho-->

        <div id="separador">
        </div>

        <article class="titulo"> U-Recycle </article>
        <div id="formulario">
            <span class="sub_titulo">Fazer Pedido</span>
            <form id="pedido">
                <label for="nome" id="nome" class="nome">Nome:<br></label>
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome aqui"><br>

                <label for="cep" id="cep" class="cep">CEP:<br></label>
                <input type="text" name="cep" id="cep" placeholder="00000-000"><br>
                
                <label for="end" id="end" class="end">Endereço:<br></label>
                <input type="text" name="end" id="end" placeholder="Digite seu endereço"><br>

                <label for="num" id="num" class="num">Número:</label>
                <label for="comp" id="complemento" class="comp">Complemento:</label><br>


                <input type="text" name="num" id="num" placeholder="1234">

                <input type="text" name="comp" id="comp" placeholder="Digite o complemento "><br>

                <span class="tipom">Tipo de Material:</span><br>


                <div id="checkbox">
                    <input type="checkbox" id="papel" value="on">Papel


                    <input type="checkbox" id="metal" value="on">Metal


                    <input type="checkbox" id="isopor" value="on">Isopor<br>


                    <input type="checkbox" id="vidro" value="on">Vidro

                    <input type="checkbox" id="plastico" value="on">Plastico


                    <input type="checkbox" id="eletronicos" value="on">Eleletronicos<br>


                    <input type="checkbox" id="madeira" value="on">Madeira


                    <input type="checkbox" id="oléo" value="on">Oléo

                    <input type="checkbox" id="borracha" value="on">Borracha<br>
                </div>


                <label for="nome">Outros:</label>
                <input type="text">
                <p id="c">ATENÇÂO NÂO FAZEMOS A RECICLAGEM DE ITENS HOSPITALARES, CONTAMINADOS OU RADIOATIVOS</p>


                <label for="nome">DESCRIÇÃO:</label><br>
                <textarea id="descrição"></textarea>

                <p id="f">Fotos</p>

                <input type="file" name="image" id="fotos" label><br>

                <div id = botao>
                    <button id="enviar">Enviar</button>
                </div>

            </form>
        </div>
    </main>

    <footer>
        <p>@Copyright 2022 Todos os direitos reservados<span class="aqui"> U-Recycle</span></p>

        <article id="redes_sociais">
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