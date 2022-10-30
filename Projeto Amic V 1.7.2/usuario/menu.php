<?php 

// Sistema de login, verifica se o usuario está conctado, senão é redirecionado para a pagina de login
session_start();
if (!isset($_SESSION['matricula'])) {header('location: ../login.php');}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <title>Início</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <!-- Barra de navegação -->
  <header role="banner">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="menu.php"><img src="../img/Logo simplificada.png" width="110px"></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#demo">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample05" style="margin-top: 1%;">
                <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../usuario/menu.php">Início</a>
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
            <a class="nav-link" style="color: rgba(255, 255, 255, 0.712); font-size: larger;" href="historico.php">Histórico</a>
            </li>
        </ul>
        <ul class="">
            <form action='../php/sistema-logout.php' method='post'>
              <button type='submit' class='btn btn-danger'>Desconectar</button>
            </form>
        </ul>

    </div>
  </div>

  <!-- Conteudo Página -->
  <div class="container" style="height: 100%;">

    <div class="container text-left" style="margin-top: 15px;">


      <!-- Logo -->
      <div class="container text-center col-sm-12 col-md-6" style="background-color: white; margin-bottom: 2%;">
        <img src="../img/Logo Amic.png" class="img-fluid ">
      </div>

    </div>

    <!-- Barra de pesquisas -->
    <form action="../maquinas/maquina.php" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="code"
          placeholder="Digite o codigo do QR Code ou escaneie-o clicando no botão 'Escanear QR Code' abaixo (caso você esteja usando o celular)"
          aria-label="Recipient's username" aria-describedby="basic-addon2">
        <button>Buscar</button>
      </div>
    </form>

    <!-- Botões secundarios -->
    <div class="container" style="padding-bottom: 8%; margin-top: 5%;">
      <div class="row">
        <div class="col-md-6 text-center" style="margin-top: 6%;">
          <a href="">
            <img src="https://cdn-icons-png.flaticon.com/512/714/714390.png" alt="Usuario"
              style="width:90px;height:90px;">
            <h3>Escanear QR Code</h3>
          </a>
        </div>

        <div class="col-md-6 text-center" style="margin-top: 6%;">
          <a href="historico.php">
            <img src="https://cdn-icons-png.flaticon.com/512/7358/7358162.png" alt="Usuario"
              style="width:90px;height:90px;">
            <h3>Histórico</h3>
          </a>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Suporte -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="container text-center" style="background-color: white; margin-bottom: 5%; margin-top: 5%;">
                                <h1>Meios de contato com o suporte</h1>
                            </div>
                            <div class="container" style="padding-bottom: 8%; margin-top: 10%;">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <a href=""><img src="https://cdn-icons-png.flaticon.com/512/5968/5968841.png" alt="Usuario"
                                                style="width:70px;height:70px;"></a>
                                        <a href="">
                                            <h3>WhatsApp</h3>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="menu.php"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png"
                                                alt="Usuario" style="width:70px;height:70px;"></a>
                                        <a href="menu.php">
                                            <h3>Instagram</h3>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="historico.php"><img src="https://cdn-icons-png.flaticon.com/512/732/732200.png"
                                                alt="Usuario" style="width:70px;height:70px;"></a>
                                        <a href="historico.php">
                                            <h3>Gmail</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Rodapé -->
  <footer class="text-center text-lg-start text-muted" style="background-color: #e9ecef;">

    <div class="container text-center" style=" padding-top: 2%; padding-bottom: 2%;">
        <h1>Precisa de ajuda ?</h1>
        <p>Entre em contato com o suporte</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Suporte</button>
    </div>

    <!-- Copyright -->
    <div class="text-center p-2 bg-dark">
        <p style="color: white; margin-top: 1%;"> © 2022 Copyright: projetoamic.com</p>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->



</body>