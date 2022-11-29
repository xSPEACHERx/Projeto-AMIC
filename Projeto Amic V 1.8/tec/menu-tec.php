<?php
    // Sistema de login, verifica se o usuario está conctado, senão é redirecionado para a pagina de login, mas quando ele faz o login ele volta para essa pagina
    session_start();
    if (!isset($_SESSION['siape'])) {header("location: ../login.php?code=$idmaquina");}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Amic Home tec</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


</head>

<body>

    <!-- Barra de navegação-->
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
                  <a class="nav-link active" href="../tec/menu-tec.php">Início</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../tec/dados-pessoais-tec.php">Perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../tec/ver-relatorios-tec.php">Ver Relatórios</a>
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
                <a class="nav-link active" style="color: white ; font-size: larger;" href="menu-tec.php">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="dados-pessoais-tec.php">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="ver-relatorios-tec.php">Ver Relatórios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="maquinas-tec.php">Maquinas</a>
            </li>
        </ul>
        <ul class="">
            <form action='../php/sistema-logout.php' method='post'>
              <button type='submit' class='btn btn-danger'>Desconectar</button>
            </form>
        </ul>

    </div>
    </div>

    <!-- Conteúdo Página-->
    <div class="container" style="height: 100%;">

        <!-- Logo -->
        <div class="container text-right" style="margin-top: 15px;">
            <div class="container text-center col-sm-12 col-md-6" style="background-color: white; margin-bottom: 2%;">
                <img src="../img/Logo Amic.png" class="img-fluid ">
            </div>
        </div>
        
        <!-- Botões Principais-->
        <div class="container" style="padding-bottom: 8%;">
            <div class="row">
                <div class="col-md-4 text-center" style="margin-top: 6%;">
                    <a href="../tec/dados-pessoais-tec.php"><img src="https://cdn-icons-png.flaticon.com/512/3524/3524761.png"
                            alt="Usuario" style="width:100px;height:100px;">
                        <h3>Perfil</h3>
                    </a>

                </div>
                <div class="col-md-4 text-center" style="margin-top: 6%;">
                    <a href="../tec/ver-relatorios-tec.php"><img src="https://cdn-icons-png.flaticon.com/512/4022/4022015.png"
                            alt="Usuario" style="width:100px;height:100px;">
                        <h3>Ver Relatórios</h3>
                    </a>

                </div>
                <div class="col-md-4 text-center" style="margin-top: 6%;">
                    <a href="../tec/maquinas-tec.php"><img src="https://cdn-icons-png.flaticon.com/512/36/36020.png" alt="Usuario"
                            style="width:100px;height:100px;">
                        <h3>Maquinas</h3>
                    </a>
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
                                                <a href="relatar.php"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384063.png"
                                                        alt="Usuario" style="width:70px;height:70px;"></a>
                                                <a href="relatar.php">
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

</body>