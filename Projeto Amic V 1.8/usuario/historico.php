<?php 

// Sistema de login, verifica se o usuario está conctado, senão é redirecionado para a pagina de login
session_start();
if (!isset($_SESSION['matricula'])) {header('location: ../login.php');}
$matricula = $_SESSION['matricula'];

// Query para exibir os dados da tabela

$pdo = require_once('../db/conecta.php');

$sql = "SELECT maquina_idmaquina, re_data, re_tipo, re_feedback_data FROM reporte WHERE usuario_matricula=$matricula ORDER BY re_data DESC";
$statement = $pdo->prepare($sql);
$statement->execute();

// fetch all rows
$dados = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
 
        <title>Histórico</title>

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
          <a class="navbar-brand" href="menu.php"><img src="../img/Logo simplificada.png" width="110px"></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbarsExample05" style="margin-top: 1%;">
          <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
              <a class="nav-link active" href="../usuario/menu.php">Inicío</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="../usuario/dados-pessoais.php">Perfil</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="../usuario/historico.php">Histórico</a>
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
                <a class="nav-link " style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="menu.php">Inicío</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="dados-pessoais.php">Perfil</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white; font-size: larger;" href="historico.php">Histórico</a>
                </li>
            </ul>
            <ul class="">
                <form action='../php/sistema-logout.php' method='post'>
                    <button type='submit' class='btn btn-danger'>Desconectar</button>
                </form>
            </ul>

        </div>
    </div>

    <!-- Titulo da pagina -->
    <div class="container-fluid text-center" style="background-color: #e9ecef; padding-top: 2%; padding-bottom: 2%;">
        <h1>Histórico</h1>
        
    </div>
    
    <!-- Conteudo -->
    <div class="container">  
        
        <!-- Barra de busca -->
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
            <a class="navbar-brand" href="#">Histórico de relatórios</a>
            <ul class="nav nav-pills">
              <li class="nav-item">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Buscar" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                  </div>
              </li>
              <li class="nav-item">
                
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
                        <th>Status</th>
                        <th>Data do feedback</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>
                <tbody align="center">
                <?php
                    // preenche a tabela com os dados
                        foreach($dados as $row){

                            $idmaquina = $row["maquina_idmaquina"];
                            $re_data = $row["re_data"];
                            $re_tipo = $row["re_tipo"];
                            $re_feedback_data = $row["re_feedback_data"];
                
                            echo "<tr>";
                            echo "<td>$idmaquina</td>"; 
                            echo "<td>$re_data</td>";
                            echo "<td>$re_tipo</td>";

                            if ($re_feedback_data == NULL){
                                echo "<td class='pendente'>Pendente</td>";
                            } else {
                                echo "<td class='concluido'>Concluido</td>";
                            }
                            
                            // Link de acesso à maquina
                            echo "<td><a href='../maquinas/maquina.php?code=$idmaquina'>Clique para ver detalhes</a></td>";
                            echo "</tr>";
                        }
                ?>
                </tbody>
              </table>
        </div>
        
        <!-- verifica se tem dados na query, caso não exibe mensagem -->
        <div align="center">
            <?php 
                if ($dados == NULL){echo "<h3>Nenhum reporte encontrado!</h3>";}
            ?>
        </div>
        
        <!-- Botão voltar -->
        <a href="menu.php"><img src="https://cdn-icons-png.flaticon.com/512/93/93634.png" style="width: 50px; margin-top: 3%;"><p>voltar</p></a>
    </div>

    <!-- Rodapé -->
    <footer class="text-center text-lg-start bg-light text-muted">

    <!-- Copyright -->
    <div class="text-center p-2 bg-dark" >
        <p style="color: white; margin-top: 1%;"> © 2022 Copyright: ProjetoAMIC.com</p>
    </div>
    <!-- Copyright -->
    </footer>

</body>
