<?php

    // Sistema de login, verifica se o usuario está conctado, senão é redirecionado para a pagina de login, mas quando ele faz o login ele volta para essa pagina
    session_start();
    if (!isset($_SESSION['siape'])) {header("location: ../login.php?code=$idmaquina");}

    // Query 
    $pdo = require_once('../db/conecta.php');
    $result = $pdo->query("SELECT idmaquina, maq_lab, maq_rel_pend, maq_status FROM maquina 
                            ORDER BY maq_rel_pend DESC");

    $band = null;

    // badge bg-danger text-danger
    // badge bg-warning text-warning
    // badge bg-success text-success
?>  

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <title>Máquinas</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Barra de navegação -->
    <header role="banner">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <div class="container">
                <a class="navbar-brand" href="../tec/menu-tec.php"><img src="../img/Logo simplificada.png" width="110px"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#demo">
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
                            <a class="nav-link" href="../tec/ver-relatorios-tec.php">Ver Relatórios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../tec/maquinas-tec.php">Máquinas</a>
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
                        href="../tec/menu-tec.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                        href="../tec/dados-pessoais-tec.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                        href="../tec/ver-relatorios-tec.php">Ver Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white ; font-size: larger;"
                        href="../tec/maquinas-tec.php">Máquinas</a>
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
        <h1>Máquinas</h1>
    </div>

    <!-- Conteúdo Página-->
    <div class="container">

        <!-- Cartões das maquinas -->
        <div class="container">

            <!-- Barra de pesquisa -->
            <nav id="navbar-example2" class="navbar navbar-dark bg-dark px-3">
                <a class="navbar-brand" href="#">Filtro</a>
                <ul class="nav nav-pills">
                    <li class="nav-item container-fluid">
                        <div class="input-group rounded" style="Width: 270px;">
                            <input type="search" class="form-control rounded" placeholder="Digite um id, local ou status..." aria-label="Buscar"
                                aria-describedby="search-addon" id="myInput" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </li>
                </ul>
            </nav>
            <br>
            <ul class="list-group list-unstyled" id="myList">
                <div class="row g-4">

                    <?php foreach($result->fetchAll() as $row) { 
                        
                        switch($row['maq_rel_pend']) {
                            case 0:
                                $band = "badge bg-success text-success";
                                break;
                            case $row['maq_rel_pend'] >= 1 && $row['maq_rel_pend'] < 3:
                                $band = "badge bg-warning text-warning";
                                break;
                            case $row['maq_rel_pend'] >= 3:
                                $band = "badge bg-danger text-danger";
                                break;
                        }

                        if($row['maq_status'] == 'Desativado') {
                            $band = "badge bg-dark text-dark";
                            $status = "desativado ***";
                        } else{
                            $status = "operando *****";
                        }
                        ?>
                    <li class="col-sm-6 col-lg-3 col-xl-2">
                        <div >
                            <div class="card shadow h-100" style="margin-top: 10%;">
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between mb-2">
                                        <p href="#" class="<?php echo $band; ?>"><?php echo $status;?></p>
                                        <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                                    </div>
                                    <h5 class="card-title fw-normal"><a href="../maquinas/maquina-tec.php?code=<?php echo $row['idmaquina'] ?>">ID:<?php echo $row['idmaquina'] ?>
                                        </a>
                                    </h5>
                                    <p class="text-truncate-2 mb-2">
                                        <?php echo $row['maq_lab']; ?>
                                    </p>
                                </div>
                                <div class="card-footer pt-0 pb-3">
                                    <hr>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>
                                            <?php echo $row['maq_rel_pend']; ?> relatórios pendentes
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>

                    <div class="text-right" style="padding-top: 50px;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Adicionar máquina</button>
                    </div>
                </div>
            </ul>  
        </div>
        
        <!-- script do filtro -->
        <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>

        <!-- Formulario para Criar Maquinas -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Relatório</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../php/cadastro-maquina.php" method="post">
                            <div class="mb-3">
                                <label class="form-label required">Quantidade de máquinas (clones)</label>
                                <input type="number" name="quantidade" class="form-control" value='1'  min='1' max='99' required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-control" name="cadastro-maquina-status" placeholder="Status" type="text">
                                    <option value="Operando">Operando</option>
                                    <option value="Desativado">Desativado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Local</label>
                                <select class="form-control" name="cadastro-maquina-local" type="text">
                                    <option value="Lab 1">Lab 1</option>
                                    <option value="Lab 2">Lab 2</option>
                                    <option value="Lab 3">Lab 3</option>
                                    <option value="Lab de redes">Lab de redes</option>
                                    <option value="Lab Maker">Lab Maker</option>
                                    <option value="Lab Especial">Lab Especial</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Processador</label>
                                <input type="text" name="cadastro-maquina-pro" class="form-control"  >
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Memória Ram</label>
                                <input type="text" name="cadastro-maquina-mem" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Placa mãe</label>
                                <input type="text" name="cadastro-maquina-pla" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Sistema Operacional/licença</label>
                                <input type="text" name="cadastro-maquina-lic" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Observações</label>
                                <textarea class="form-control" name="cadastro-maquina-obs"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Criar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão voltar -->
        <a href="../tec/menu-tec.php"><img src="https://cdn-icons-png.flaticon.com/512/93/93634.png"
                style="width: 50px; margin-top: 5%;">
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
    </div>
</body>