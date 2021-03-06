<?php
include_once("conexao.php");
include("sem_login.php");

if(!isset($_SESSION)){
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/configuracao_usuario.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/base.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../fonts/font.css" media="screen"/>
    <script type="text/javascript" src="../js/funcionalidades.js"></script>
    <link rel="shortcut icon" href="/src/img/logo.png" type="image/x-icon">
    <title>Meu Perfil</title>
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
        <div id = "separador"> </div>
            <!-- COMEÇO BARRA-LATERAL-ESQUERDA-->
            <article id = "container">
                <!-- <button class = "btn_redondo"  id = "perfil" onclick="darkmode()">PERFIL</button>  -->
                <h1 id="titulo">MINHA CONTA</h1>
                <article id="conteudo_principal">
                    <article id="menu_lateral_esquerda">
                        <article class="caixa">
                            <h3>Configuração de Usuário</h3>
                                <nav>
                                    <ul>
                                        <li>
                                            <a>Perfil de Usuário</a>
                                        </li>
                                        <li>
                                            <a>Endereço</a>
                                        </li>
                                        <li>
                                            <a class="primeiro" >Alterar Senha</a>
                                        </li>
                                    </ul>
                                </nav>
                        </article>

                        <div class = barra></div>

                        <article class="caixa">
                            <h3>Configuração do Aplicativo</h3>
                                <nav>
                                    <ul>
                                        <li>
                                            <a>Notificação</a>
                                        </li>
                                        <li>
                                            <a>Idioma</a>
                                        </li>
                                        <li>
                                            <a class="primeiro" >Acessiblidade</a>
                                        </li>
                                    </ul>
                                </nav>
                        </article>
                        
                        <div class = barra></div>

                        <article class="caixa">
                            <h3>Ajuda e Suporte</h3>
                                <nav>
                                    <ul>
                                        <li>
                                            <a>Mensagem</a>
                                        </li>
                                        <li>
                                            <a>Ajuda</a>
                                        </li>
                                        <li>
                                            <a class="primeiro" >Sobre</a>
                                        </li>
                                    </ul>
                                </nav>
                        </article>
                    </article>

                    <!-- FIM BARRA-LATERAL-DIREITA-->
                    

                    <article id="menu_meio">
                        <article class ="caixa_info">
                                <article id ="caixa_imagem">
                                    <article id ="imagem"></article>
                                </article>
    
                                <article id ="caixa_texto">
                                    <article id ="texto">
                                            <span class="bold">Nome: </span> <?php echo($_SESSION['NOME'] . " " . $_SESSION['SOBRENOME']);?><br>
                                            <span class="bold">Endereço: </span> <?php echo("Não Cadastrado"); ?> <br>
                                            <span class="bold">CPF: </span> <?php echo($_SESSION['CPF']);?><br>
                                            <span class="bold">Pessoa: </span> <?php if($_SESSION['TIPO']== "1"){echo("Física");}else{echo("Jurídica");}?><br>
                                            <span class="bold">Quant. Pedidos: </span> <?php echo("0")?><br>
                                            <span class="bold">Email: </span> <?php echo($_SESSION['EMAIL']);?><br>
                                            <span class="bold">Telefone: </span> <?php echo($_SESSION['TELEFONE']); ?>
                                    </article>
                                </article>
                        </article>
                        <h3> Sobre Mim</h3>
                        <article class ="caixa_sobre_mim">
                            <article class="colown">
                                     Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                     Non ab qui mollitia accusamus. Nobis ad velit molestias delectus dolores sequi, 
                                     sed numquam, natus possimus voluptas illo maiores eveniet explicabo placeat.
                                     Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </article>
                            <article class="colown">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Non ab qui mollitia accusamus. Nobis ad velit molestias delectus dolores sequi, 
                                    sed numquam, natus possimus voluptas illo maiores eveniet explicabo placeat.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </article>
                        </article>
                        <button id = "btn_editar"> Editar Perfil </button>
                    </article>

                    <article id="menu_lateral_direita">
                        <h1 id="titulo">Historico de Pedidos</h1>
                        <article class ="caixa concluido">
                            <div class ="icone_usuario"></div>
                            <div class ="texto">
                                CEP: 00000-000 <br>
                                <span class="bold">STATUS:</span> Concluido
                            </div>
                        </article>

                        <article class = "caixa concluido">
                            <div class ="icone_usuario"></div>
                            <div class ="texto">
                                CEP: 00000-000 <br>
                                <span class="bold">STATUS:</span> Concluido
                            </div>
                        </article>

                        <article class = "caixa concluido">
                            <div class ="icone_usuario"></div>
                            <div class ="texto">
                                CEP: 00000-000 <br>
                                <span class="bold">STATUS:</span> Concluido
                            </div>
                        </article>

                        <article class = "caixa pendente">
                            <div class ="icone_usuario"></div>
                            <div class ="texto">
                                CEP: 00000-000 <br>
                                <span class="bold">STATUS:</span> Pendente
                            </div>
                        </article>

                        <article class = "caixa cancelado">
                            <div class ="icone_usuario"></div>
                            <div class ="texto">
                                CEP: 00000-000 <br>
                                <span class="bold">STATUS:</span> Pendente
                            </div>
                        </article>
                        
                        <a href="">Ver Mais</a>
                    </article>
                </article>
            </article>

    </main>
</body>
</html>