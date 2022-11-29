<?php

$idmaquina = $_GET['code'];

// Sistema de login, verifica se o usuario está conctado, senão é redirecionado para a pagina de login, mas quando ele faz o login ele volta para essa pagina
session_start();
if (!isset($_SESSION['siape'])) {header("location: ../login.php?code=$idmaquina");}

// Ddos da maquina
$pdo = require_once('../db/conecta.php');

$sql = "SELECT * FROM maquina WHERE idmaquina=:idmaquina";

$statement = $pdo->prepare($sql);
$statement->execute([
    ':idmaquina' => $idmaquina
]);

// fetch all rows
$dados = $statement->fetchAll(PDO::FETCH_ASSOC);

$maq_pro = $dados[0]['maq_pro'];
$maq_mem = $dados[0]['maq_mem'];
$maq_pla = $dados[0]['maq_pla'];
$maq_obs = $dados[0]['maq_obs'];
$maq_lic = $dados[0]['maq_lic'];
$maq_lab = $dados[0]['maq_lab'];
$maq_rel_pend = $dados[0]['maq_rel_pend'];
$maq_feedbacks = $dados[0]['maq_feedbacks'];
$maq_status= $dados[0]['maq_status'];


if ($maq_status == 'Operando'){
  $maq_status2 = 'Desativado';
}
  

if ($maq_status == 'Desativado'){
  $maq_status2 = 'Operando';

}

// SISTEMA DE REPORTES


$sql2 = "SELECT * FROM reporte WHERE maquina_idmaquina=:idmaquina ORDER BY re_data DESC";

$statement2 = $pdo->prepare($sql2);

$statement2->execute([
    ':idmaquina' => $idmaquina
]);

$dados2 = $statement2->fetchAll(PDO::FETCH_ASSOC);


// var_dump($dados2)
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <title>ID: <?php echo $_GET['code'] ?></title>

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
        <a class="navbar-brand" href="../tec/menu-tec.php"><img src="../img/Logo simplificada.png" width="110px"></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample05" style="margin-top: 1%;">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
            <li class="nav-item">
                <a class="nav-link " href="../tec/menu-tec.php">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../tec/dados-pessoais-tec.php">Perfil</a>
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
                <a class="nav-link active" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                    href="../tec/menu-tec.php">Inicío</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white ; font-size: larger;"
                    href="../tec/dados-pessoais-tec.php">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="../tec/ver-relatorios-tec.php">Ver
                    Relatórios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                    href="../tec/maquinas-tec.php">Maquinas</a>
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
  <div class="container-fluid text-center"
    style="background-color: #e9ecef; padding-top: 2%; padding-bottom: 2%; margin-bottom: 2%;">
    <h1>Perfil da Máquina</h1>
  </div>

  <!-- Maquina -->
  <div class="container">
    <div class="main-body">
      <div class="row gutters-sm">

        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3787/3787704.png" alt="Admin" class="rounded-circle"
                  width="150">
                <div class="mt-3">
                  <h4>Maquina 01</h4>
                  <p class="text-secondary mb-1">Id: <?php echo $idmaquina ?></p>
                  <p class="text-muted font-size-sm"><?php echo $maq_lab ?></p>

                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">


              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-clipboard-data feather mr-2 icon-inline" viewBox="0 0 16 16">
                    <path
                      d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                    <path
                      d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path
                      d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                  </svg>Relatórios pendentes</h6>
                <span class="text-secondary"><?php echo $maq_rel_pend ?> Envios</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-check-circle-fill feather mr-2 icon-inline" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                  </svg>Feedbacks </h6>
                <span class="text-secondary"><?php echo $maq_feedbacks ?> Envios</span>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">ID</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $idmaquina ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Processador</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $maq_pro ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Memória</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $maq_mem ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Placa mãe</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $maq_pla ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Licença S.O</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $maq_lic ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $maq_status ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Observações</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $maq_obs ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#myModal">Editar</button>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir">Excluir
                    máquina</button>
                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="col-md-12">
          <div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 50vh; width: 100%;">
            <table class="table table-hover  table-striped table-bordered">
              <thead>
                <tr>
                  <th>Data de envio</th>
                  <th>Tipo de problema</th>
                  <th>Status</th>
                  <th>Detalhes</th>
                </tr>
              </thead>
              <tbody align="center">

                <?php foreach($dados2 as $row) {

                  $status = (isset($row['re_feedback_data'])) ? 'concluido' : 'pendente';

                  $idmodal= 'teste4'.strval(random_int(1,10000000));

                  $idmodal_detalhes= 'teste3'.strval(random_int(1,10000000));

                ?>
                <tr>
                  <td><?php echo $row['re_data']; ?> </td>
                  <td><?php echo $row['re_tipo']; ?></td>
                  <td class="<?php echo $status ?>"> <?php echo $status; ?></td>

                  <?php 
                  echo "<td><button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#$idmodal_detalhes'>Ver Detalhes</button></td>";
                  ?>

                </tr>

                <!-- Formulario para adicionar feedback -->
                <div class="modal" id="<?php echo $idmodal; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Feedback</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">

                        <form action="../php/insert-feedback.php?code=<?php echo $idmaquina ?>&id=<?php echo $row['idreporte'] ?>" method="POST">

                          <div class="mb-3">
                            ID Maquina: <?php echo $idmaquina ?> <br>
                            Id Report: <?php echo $row['idreporte'] ?>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Comentário (opcional)</label>
                            <textarea class="form-control" name="re_feedback"></textarea>
                          </div>
                          <div class="mb-3">
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkButton" required>
                                <label for="checkButton">Marcar problema como resolvido</label>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- Formulario para Ver Detalhes -->
                <div class="modal" id="<?php echo $idmodal_detalhes; ?>" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Detalhes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">

                          <div class="mb-3">

                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/3787/3787704.png" alt="Admin" class="rounded-circle"
                                  width="150">
                                <div class="mt-3">
                                  <h4>Maquina 01</h4>
                                  <p class="text-secondary mb-1">Id: <?php echo $idmaquina ?></p>
                                  <p class="text-muted font-size-sm"><?php echo $maq_lab ?></p>

                                </div>
                              </div>
                            </div>
        
                          </div>

                          <div class="mb-3">
                            <div class="card-body">
                              
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">id reporte</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <?php echo $row['idreporte'] ?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <?php echo $status ?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Data</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <?php echo $row['re_data'] ?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Titulo/Resumo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <?php echo $row['re_titulo'] ?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Descrição detalhada</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <?php echo $row['re_decricao'] ?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Feedback</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">                             
                                  <?php echo $row['re_feedback'] ?>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <h6 class="mb-0">Data de Feedback</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                  <?php echo $row['re_feedback_data'] ?>
                                </div>
                              </div>
                              <hr>
                            </div>
                          </div>
                          
                          <div class="modal-footer">

                            <?php if($status == 'pendente') { ?>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick='OpenBootstrapPopup()' >Adicionar feedback</button>
                            <script type="text/javascript">
                              function OpenBootstrapPopup() {
                                  $("#<?php echo $idmodal ?>").modal('show');
                              }
                            </script>
                            <?php } ?>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                          </div>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>


      </div>

    </div>
  </div>

  

  <!-- Confirmação de excluir maquina -->
  <div class="modal" id="excluir">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <form action="../php/delete-maquina.php?code=<?php echo $idmaquina ?>" method="POST">
              
            <div class="mb-3">
              ID Maquina: <?php echo $idmaquina ?>
              Tem certeza de que deseja DELETAR essa maquina?
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Confirmar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Formulario para editar configurações da maquina -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Relatório</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <form action="../php/update-maquina.php?code=<?php echo $idmaquina ?>" method="POST">
              
            <div class="mb-3">
              ID Maquina: <?php echo $idmaquina ?>
            </div>

            <div class="mb-3">
              <label class="form-label required">Status</label>
              <select class="form-control" name="maq_status" placeholder="Status" type="text">
                <option><?php echo $maq_status ?></option> 
                <option><?php echo $maq_status2 ?></option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Laboratorio </label>
              <input type="text" class="form-control" name="maq_lab" value="<?php echo $maq_lab ?>" >
            </div>
            <div class="mb-3">
              <label class="form-label required">Processador</label>
              <input type="text" class="form-control" name="maq_pro" value="<?php echo $maq_pro ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label required">Memória</label>
              <input type="text" class="form-control" name="maq_mem"  value="<?php echo $maq_mem ?>"
                required>
            </div>
            <div class="mb-3">
              <label class="form-label required">Placa mãe</label>
              <input type="text" class="form-control" name="maq_pla" value="<?php echo $maq_pla ?>"
                required>
            </div>
            <div class="mb-3">
              <label class="form-label required">Licença S.O</label>
              <input type="text" class="form-control" name="maq_lic" value="<?php echo $maq_lic ?>" >
            </div>
            <div class="mb-3">
              <label class="form-label">Observações</label>
              <input type="text" class="form-control" name="maq_obs" value="<?php echo $maq_obs ?>" >
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Botão voltar -->
  <div class="container">
    <a href="../tec/maquinas-tec.php"><img src="https://cdn-icons-png.flaticon.com/512/93/93634.png"
        style="width: 50px; margin-top: 2%;">
      <p>voltar</p>
    </a>
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