<?php 

$load_index = 'SELECT index FROM maquinas';
$index = [1,2,3,4,5,6,7];

$card_list = [];


foreach ($index as $row)
    $load = 'SELECT * FROM maquinas WHERE index = $row';
    array_push($card_list, $load)
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <title>Máquinas</title>

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
                    <a class="nav-link" href="dados-pessoais-tec.html">Dados Pessoais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver-relatorios-tec.html">Ver Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="maquinas-tec.html">Máquinas</a>
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
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;"
                    href="dados-pessoais-tec.html">Dados Pessoais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(255, 255, 255, 0.712) ; font-size: larger;" href="ver-relatorios-tec.html">Ver Relatórios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white ; font-size: larger;"
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
    <div class="container-fluid text-center" style="background-color: #e9ecef; padding-top: 2%; padding-bottom: 2%;">
        <h1>Máquinas</h1>
    </div>

    <!-- Conteúdo Página-->
    <div class="container">

        <!-- Barra de pesquisa -->
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
            <a class="navbar-brand" href="#">Lista de Máquinas</a>
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
                <li class="nav-item">
                </li>
            </ul>
        </nav>


        
        <!-- Cartões das maquinas -->
        <div class="row g-4">

        <?php 
        
        foreach($index as $card){

            
            echo '<div class="col-sm-6 col-lg-3 col-xl-2">';
            echo '<div class="card shadow h-100" style="margin-top: 20%;">';
               echo '<div class="card-body pb-0">';
                   
                   echo '<div class="d-flex justify-content-between mb-2">';
                       echo '<p href="#" class="badge bg-danger text-danger">************</p>';
                       echo '<a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>';
                   echo '</div>';
                   
                   echo '<h5 class="card-title fw-normal"><a href="../maquinas/modelo maquina tec.html">ID: teste</a></h5>';
                   echo '<p class="text-truncate-2 mb-2">Lab 01</p>';
                   

               echo '</div>';
               
               echo '<div class="card-footer pt-0 pb-3">';
                   echo '<hr>';
                   echo '<div class="d-flex justify-content-between mt-2">';
                       echo '<span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>5 relatórios pendentes</span>';
                   echo '</div>';
               echo '</div>';
           echo '</div>';
       echo '</div>';
            
        }
        
        ?>

            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-danger text-danger">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="../maquinas/modelo maquina tec.html.html">ID: 12344567</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 02</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>7 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-warning text-warning">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="../maquinas/modelo maquina tec.html.html">ID: 14355457</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 01</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>4 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-warning text-warning">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="../maquinas/modelo maquina tec.html.html">ID: 13456734</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 01</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>2 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-warning text-warning">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="../maquinas/modelo maquina tec.html.html">ID: 12344567</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 02</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>3 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-warning text-warning">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="#">ID: 12344567</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 02</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-dange"></i>4 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-success text-success">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="#">ID: 12344567</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 01</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>0 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-success text-success">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="#">ID: 12344567</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 01</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>0 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->
            <!-- Card item START -->
            <div class="col-sm-6 col-lg-3 col-xl-2">
                <div class="card shadow h-100" style="margin-top: 20%;">
                    <div class="card-body pb-0">
                        <!-- Badge and favorite -->
                        <div class="d-flex justify-content-between mb-2">
                            <p href="#" class="badge bg-success text-success">************</p>
                            <a href="#" class="h6 fw-light mb-0"><i class="far fa-heart"></i></a>
                        </div>
                        <!-- Title -->
                        <h5 class="card-title fw-normal"><a href="#">ID: 12344567</a></h5>
                        <p class="text-truncate-2 mb-2">Lab 01</p>
                        <!-- Rating star -->

                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pt-0 pb-3">
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger"></i>0 relatórios
                                pendentes</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card item END -->

            <div class="text-right" style="padding-top: 50px;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Adicionar maquina</button>
            </div>
        </div>

        <!-- Formulario para Criar Maquinas -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Relatório</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="maquinas.html">
                            <div class="mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-control" placeholder="Status" type="text">
                                    <option>Operando</option>
                                    <option>Desativado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Local</label>
                                <select class="form-control" placeholder="Status" type="text">
                                    <option>lab 1</option>
                                    <option>lab 2</option>
                                    <option>lab 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">ID</label>
                                <input type="text" class="form-control" minlength="8" maxlength="8" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Processador</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Memória</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Placa mãe</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Licença S.O</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Observações</label>
                                <textarea class="form-control"></textarea>
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
        <a href="menu-tec.html"><img src="https://cdn-icons-png.flaticon.com/512/93/93634.png"style="width: 50px; margin-top: 5%;"><p>voltar</p></a>

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