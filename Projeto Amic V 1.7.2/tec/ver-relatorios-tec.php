<?php 

    // Sistema de login, verifica se o usuario está conctado, senão é redirecionado para a pagina de login, mas quando ele faz o login ele volta para essa pagina
    session_start();
    if (!isset($_SESSION['siape'])) {header("location: ../login.php?code=$idmaquina");}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <title>Ver relatórios</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Barra de navegação -->
    <header role="banner">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <div class="container">
            <a class="navbar-brand" href="menu-tec.php"><img src="../img/Logo simplificada.png" width="110px"></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample05" style="margin-top: 1%;">
                <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                <li class="nav-item">
                    <a class="nav-link " href="../tec/menu-tec.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../tec/dados-pessoais-tec.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../tec/ver-relatorios-tec.php">Ver Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../tec/maquinas-tec.php">Máquinas</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <form action='../php/sistema-logout.php' method='post'>
                        <button type='submit' class='btn btn-danger'>Desconectar</button>
                    </form>
                </ul>
            </div>
            </div>
        </nav>
    </header>

    <!-- Barra de navegação Mobile-->
    <div class="offcanvas offcanvas-end bg-dark" style="width: 270px ;" id="demo">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" style="color: white;">Menu</h1>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="">
            <li class="nav-item">
                <a class="nav-link active" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="menu-tec.php">Inicío</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="dados-pessoais-tec.php">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white ; font-size: larger;" href="ver-relatorios-tec.php">Ver Relatórios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="maquinas-tec.php">Maquinas</a>
            </li>
        </ul>
        <ul class="">
            <li class="nav-item cta-btn">
                <a class="nav-link" href="../login.php"
                    style="color: rgba(255, 0, 0, 0.801);  font-size: larger;">Desconectar</a>
            </li>
        </ul>

    </div>


    </div>
    
    <!-- Titulo da pagina -->
    <div class="container-fluid text-center" style="background-color: #e9ecef; padding-top: 2%; padding-bottom: 2%;">
        <h1>Relatórios enviados</h1>
    </div>

    <!-- Conteúdo Página-->
    <div class="container">

        <!-- Barra de pesquisa -->
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
            <a class="navbar-brand" href="#">Histórico de relatórios</a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Buscar"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Tabela -->
        <div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 50vh; width: 100%;">
            <table class="table table-hover  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID do computador</th>
                        <th>Data de envio</th>
                        <th>Tipo de problema</th>
                        <th>Status</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr>
                        <td>15734823</td>
                        <td>29/06/2022 - 12:58</td>
                        <td>Hardware</td>
                        <td class="pendente">Pendente</td>
                        <td><a href="../maquinas/modelo maquina tec.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15673490</td>
                        <td>01/07/2022 - 17:47</td>
                        <td>Software</td>
                        <td class="pendente">Pendente</td>
                        <td><a href="../maquinas/modelo maquina tec.html.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15965784</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Sem Internet</td>
                        <td class="pendente">Pendente</td>
                        <td><a href="../maquinas/modelo maquina tec.html.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15664738</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Não inicia</td>
                        <td class="pendente">Pendente</td>
                        <td><a href="../maquinas/modelo maquina tec.html.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15889909</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Sem Internet</td>
                        <td class="concluido">concluido</td>
                        <td><a href="../maquinas/modelo maquina tec.html.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>14543335</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Hardware</td>
                        <td class="concluido">concluido</td>
                        <td><a href="../maquinas/modelo maquina tec.html.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15534267</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Sem Internet</td>
                        <td class="concluido">concluido</td>
                        <td><a href="modelo maquina tec.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15443678</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Software</td>
                        <td class="concluido">concluido</td>
                        <td><a href="modelo maquina tec.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15589907</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Não inicia</td>
                        <td class="concluido">concluido</td>
                        <td><a href="modelo maquina tec.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15534267</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Sem Internet</td>
                        <td class="concluido">concluido</td>
                        <td><a href="modelo maquina tec.html">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15546778</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Hardware</td>
                        <td class="concluido" style="background-color: rgba(1, 255, 1, 0.192);">Concluido</td>
                        <td><a href="">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15789009</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Sem Internet</td>
                        <td class="concluido" style="background-color: rgba(1, 255, 1, 0.192);">Concluido</td>
                        <td><a href="">Clique para ver detalhes</a></td>
                    </tr>
                    <tr>
                        <td>15632435</td>
                        <td>10/08/2022 - 09:50</td>
                        <td>Não inicia</td>
                        <td class="concluido" style="background-color: rgba(1, 255, 1, 0.192);">Concluido</td>
                        <td><a href="">Clique para ver detalhes</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Botão voltar -->
        <a href="menu-tec.php"><img src="https://cdn-icons-png.flaticon.com/512/93/93634.png"style="width: 50px; margin-top: 2%;"><p>Voltar</p> </a>
    </div>

    <!-- Rodapé -->
    <footer class="text-center text-lg-start bg-light text-muted" style="margin-top: 2%;">

        <!-- Copyright -->
        <div class="text-center p-2 bg-dark">
            <p style="color: white; margin-top: 1%;"> © 2022 Copyright: ProjetoAMIC.com</p>
        </div>
        <!-- Copyright -->
    </footer>

</body>