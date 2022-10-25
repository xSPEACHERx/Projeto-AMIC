<?php

// $nome = 'Leandro Goulart';
// $curso = 'EMI-Secretariado';
// $periodo = 'Matutino';
// $email = 'leandro.goulart@gmail.com';
// $senha = '**********';
// $funcao = 'Aluno';
// $reltorios = '5';

// if ($periodo == 'Vespertino'){
//   $periodo2 = 'Matutino';
//   $periodo3 = 'Noturno';
// }
  

// if ($periodo == 'Matutino'){
//   $periodo2 = 'Vespertino';
//   $periodo3 = 'Noturno';
// }
  

// if ($periodo == 'Noturno'){
//   $periodo2 = 'Matutino';
//   $periodo3 = 'Vespertino';
// }

session_start();
$pdo = require_once('../db/conecta.php');

$consulta = $pdo->query("SELECT * FROM usuario");
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

do {
  $matricula = $resultado['matricula'];
  $nome = $resultado['us_nome'];
  $curso = $resultado['us_curso'];
  $periodo = $resultado['us_periodo'];
  $email = $resultado['us_email'];
  $senha = $resultado['us_senha'];
  $login = $resultado['us_login'];
} while($resultado = $consulta->fetch(PDO::FETCH_ASSOC));

$funcao = "Aluno/usuário";
$relatorios = 0;

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <title>Dados pessoais</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
        <a class="navbar-brand" href="menu.html"><img src="../img/Logo simplificada.png" width="110px"></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample05" style="margin-top: 1%;">
          <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
            <li class="nav-item">
              <a class="nav-link " href="../usuario/menu.php">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../usuario/dados-pessoais.php">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../usuario/relatar.html">Relatar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../usuario/historico.html">Histórico</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item cta-btn">
              <a class="nav-link" href="../php/logout-usuario.php" style="color: rgba(255, 0, 0, 0.801);">Desconectar</a>
            </li>
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
          <a class="nav-link " style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
            href="menu.html">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white ; font-size: larger;" href="dados-pessoais.html">Dados Pessoais</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="relatar.html">Relatar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="historico.html">Histórico</a>
        </li>
      </ul>
      <ul class="">
        <li class="nav-item cta-btn">
          <a class="nav-link" href="../login.html" style="color: rgba(255, 0, 0, 0.801);  font-size: larger;">Desconectar</a>
        </li>
      </ul>

    </div>
  </div>

  <!-- Titulo da pagina -->
  <div class="container-fluid text-center"
    style="background-color: #e9ecef; padding-top: 2%; padding-bottom: 2%; margin-bottom: 2%;">
    <h1>Dados pessoais</h1>
  </div>

  <!-- Conteudo -->
  <div class="container">
    <div class="main-body">

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                  width="150">
                <div class="mt-3">
                  <h4><?php echo $nome ?></h4>
                  <p class="text-secondary mb-1">Nome de usuário</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-briefcase-fill feather mr-2 icon-inline" viewBox="0 0 16 16">
                    <path
                      d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                    <path
                      d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                  </svg>Função</h6>
                <span class="text-secondary"><?php echo $funcao ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-clipboard-data feather mr-2 icon-inline" viewBox="0 0 16 16">
                    <path
                      d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                    <path
                      d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path
                      d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                  </svg>Relatórios</h6>
                <span class="text-secondary"><?php echo $relatorios ?> Envios</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nome</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="nome">
                 <?php echo $nome ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Curso</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="curso">
                 <?php echo $curso ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Período</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="periodo">
                  <?php echo $periodo ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="email">
                  <?php echo $email ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Senha</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="senha">
                  <?php echo $senha ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#myModal">Editar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Formulario para editar dados pessoais -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top: 20%;">
        <div class="modal-header">
          <h5 class="modal-title">Relatório</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="../php/update-usuario.php" method="post">
            <div class="card-body">
              
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nome</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="update-usuario-nome" value="<?php echo $nome ?>" id="itnome">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="update-usuario-email" value="<?php echo $email ?>" id="itemail">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Senha</h6>
                </div>

                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" name="update-usuario-senha" value="<?php echo $senha ?>" disabled>
                  <a href="../recuperar senha/senha-esquecida-email-dp.html"><input type="button" class="btn btn-primary"
                      value="Redefinir senha" style="margin-top: 5%"></a>
                </div>
              </div>
              
              <div class="modal-footer">
                <button type="submit"  class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Botão voltar -->
  <div class="container">
    <a href="menu.html">
      <img src="https://cdn-icons-png.flaticon.com/512/93/93634.png" style="width: 50px; margin-top: 2%;">
      <p>voltar</p>
    </a>
  </div>

  <!-- Rodapé -->
  <footer class="text-center text-lg-start bg-light text-muted" style="margin-top: 2%;">

    <!-- Copyright -->
    <div class="text-center p-2 bg-dark">
      <p style="color: white; margin-top: 1%;"> © 2022 Copyright: projetoamic.com</p>
    </div>
    <!-- Copyright -->
  </footer>

</body>