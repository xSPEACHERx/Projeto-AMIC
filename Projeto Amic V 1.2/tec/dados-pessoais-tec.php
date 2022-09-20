<?php

$nome = 'Marcos Henrique';
$curso = 'Funcionário';
$periodo = 'Noturno';
$email = 'marcos.henrique@gmail.com';
$senha = '**********';
$funcao = 'Tecnico';
$feedbcks = '2';

if ($periodo == 'Vespertino'){
  $periodo2 = 'Matutino';
  $periodo3 = 'Noturno';
}
  

if ($periodo == 'Matutino'){
  $periodo2 = 'Vespertino';
  $periodo3 = 'Noturno';
}
  

if ($periodo == 'Noturno'){
  $periodo2 = 'Matutino';
  $periodo3 = 'Vespertino';
}
  
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <title>Dados pessoais</title>

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
        <a class="navbar-brand" href="menu-tec.html"><img src="../img/Logo simplificada.png" width="110px"></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample05" style="margin-top: 1%;">
          <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
            <li class="nav-item">
              <a class="nav-link " href="menu-tec.html">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="dados-pessoais-tec.html">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ver-relatorios-tec.html">Ver Relatórios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="maquinas-tec.html">Máquinas</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item cta-btn">
              <a class="nav-link" href="../login.html" style="color: rgba(255, 0, 0, 0.801);">Desconectar</a>
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
                <a class="nav-link active" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                    href="menu-tec.html">Inicío</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white ; font-size: larger;"
                    href="dados-pessoais-tec.html">Dados Pessoais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="Ver relatorios.html">Ver
                    Relatórios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                    href="maquinas-tec.html">Maquinas</a>
            </li>
        </ul>
        <ul class="">
            <li class="nav-item cta-btn">
                <a class="nav-link" href="../login.html"
                    style="color: rgba(255, 0, 0, 0.801);  font-size: larger;">Desconectar</a>
            </li>
        </ul>

    </div>


  </div>

  <!-- Titulo da pagina -->
  <div class="container-fluid text-center" style="background-color: #e9ecef; padding-top: 2%; padding-bottom: 2%; margin-bottom: 2%;">
    <h1>Dados pessoais</h1>
  </div>

  <!-- Conteúdo Página-->
  <div class="container">
    <div class="main-body">

      <!-- cards dos dados pessoais -->
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                  width="150">
                <div class="mt-3">
                  <h4><?php echo $nome ?></h4>
                  <p class="text-secondary mb-1">Nome de Usuario</p>

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
                    class="bi bi-check-circle-fill feather mr-2 icon-inline" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                  </svg>Feedbacks </h6>
                <span class="text-secondary"><?php echo $feedbcks ?> envios</span>
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
                <div class="col-sm-9 text-secondary">
                 <?php echo $nome ?>

                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Função</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $curso ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Período</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $periodo ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $email ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Senha</h6>
                </div>
                <div class="col-sm-9 text-secondary">
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

      <!-- Botão voltar -->
      <a href="menu-tec.html"><img src="https://cdn-icons-png.flaticon.com/512/93/93634.png"style="width: 50px; margin-top: 2%;"><p>voltar</p></a>
    </div>
  </div>

  <!-- Formulario para editar dados pessoais -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Relatório</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nome</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $nome ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Função</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <select class="form-control" placeholder="Curso" type="text">
                    <option><?php echo $curso ?></option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Período</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <select class="form-control" placeholder="Período" type="text">
                    <option><?php echo $periodo ?></option>
                    <option><?php echo $periodo2 ?></option>
                    <option><?php echo $periodo3 ?></option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="marcos.henrique@gmail.com">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Senha</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $senha ?>">
                  <a href="../recuperar senha/senha-esquecida-email-dp.html"><input type="button" class="btn btn-primary"
                      value="Redefinir senha" style="margin-top: 5%"></a>
                </div>
              </div>

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
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