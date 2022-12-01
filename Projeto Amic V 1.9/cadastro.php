
<?php 

// recebe codio de maquina se existente
if (isset($_GET['code'])){
    $linklog = "&code=".$_GET['code'];
} else {
    $linklog = "";
}

// exibem mensagem de erro se existente
    if (isset($_GET['error'])){
        if ($_GET['error'] == "1"){
            $mensagem = "<p class='text-danger text-center'>Email já usado!</p>";
            
        } elseif ($_GET['error'] == "2") {
            $mensagem = "<p class='text-danger text-center'>As senhas não coincidem!</p>";
            
        }
    } else {
        $mensagem = "<p class='text-success text-center'>Digite seus dados</p>";
        
    }


?>

<html lang="pt-BR">

<head>

    <title>Cadastro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>

<body style="background-color: rgba(0, 0, 0, 0.13);">

    <!-- Container de conteudo -->
    <div class="container col-sm-12 col-md-6 col-xl-3" style="margin-top: 2%; margin-bottom: 3%;">

        <!-- Cartão -->
        <div class="card">
            <article class="card-body">

                <!-- Titulo e subtitulo -->
                <h4 class="card-title text-center mb-4 mt-1">Cadastrar-se</h4>
                <hr>
                <?php echo $mensagem; ?>

                <!-- Botões para trocar entre versão usuario e tecnico/funcionario -->
                <div class="btn-group mb-4 col-md-12" role="group">
                    <button type="button" class="btn btn-secondary activated" id="aba-aluno-cadastro"
                        onclick="estadoAlunoCadastro()">Aluno</button>
                    <button type="button" class="btn btn-secondary" id="aba-tecnico-cadastro"
                        onclick="estadoTecnicoCadastro()">Técnico</button>
                </div>

                <div class="conteudos">

                    <!-- Formulário Usuário -->
                    <div id="aluno-cadastro">
                        <form action="php/sistema-cadastro.php?form=1<?php echo $linklog; ?>" method="post">

                        <!-- nome -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-usuario-nome" class="form-control" placeholder="Nome" type="text"
                                        maxlength="80" required>
                                    </input>
                                </div> 
                            </div> 

                        <!-- email -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-usuario-email" class="form-control" placeholder="Email" type="email"
                                        maxlength="50" required>
                                    </input>
                                </div> 
                            </div> 
                        

                        <!-- Curso -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <select class="form-control" name="cadastro-usuario-curso" placeholder="Curso" type="text">
                                        <option value="EMI-Informática">EMI-Informática</option>
                                        <option value="EMI-Secretariado">EMI-Secretariado</option>
                                        <option value="EMI-Química">EMI-Química</option>
                                        <option value="EMI-Alimentos">EMI-Alimentos</option>
                                        <option value="PROEJA">PROEJA</option>
                                        <option value="TADS">TADS</option>
                                        <option value="LCN">LCN</option>
                                    </select>
                                </div> 
                            </div> 

                        <!-- periodo -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <select class="form-control" name="cadastro-usuario-periodo" placeholder="Período" type="text">
                                        <option value="Matutino">Matutino</option>
                                        <option value="Vespertino">Vespertino</option>
                                        <option value="Noturno">Noturno</option>
                                    </select>
                                </div> 
                            </div> 

                        <!-- Matricula -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-usuario-matricula" class="form-control"
                                        placeholder="Matrícula" type="text" minlength="16" maxlength="16" required>
                                    </input>
                                </div> 
                            </div> 

                        <!-- senha 1 -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-usuario-senha" type="password" class="form-control" placeholder="Senha"
                                        type="text" maxlength="15" required>
                                    </input>
                                </div> 
                            </div> 

                        <!-- senha 2 -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-usuario-confirmar-senha" type="password" class="form-control"
                                        placeholder="Confirmar senha" type="text" maxlength="15" required>
                                    </input>
                                </div> <!-- input-group.// -->
                            </div> <!-- form-group// -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Cadastrar </button>
                            </div> <!-- form-group// -->


                            <div class="mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkButton-usuario"
                                            required>
                                        <label for="checkButton-usuario" style="font-size: 0.9rem;">Eu li e aceito os termos de
                                            compromisso</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Formulário Técnico -->
                    <div id="tecnico-cadastro" class="hide">
                        <form action="php/sistema-cadastro.php?form=2<?php echo $linklog; ?>" method="post">

                        <!-- nome.// -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-tecnico-nome" class="form-control" placeholder="Nome" type="text"
                                        maxlength="80" required>
                                    </input>
                                </div> 
                            </div>

                        <!-- email -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-tecnico-email" class="form-control" placeholder="Email" type="email"
                                        maxlength="50" required>
                                    </input>
                                </div> 
                            </div> 

                            
                        <!-- siape -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-tecnico-siape" class="form-control" placeholder="SIAPE"
                                        type="text" minlength="8" maxlength="8" required>
                                    </input>
                                </div> 
                            </div> 

                        <!-- senha 1 -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-tecnico-senha" type="password" class="form-control" placeholder="Senha"
                                        maxlength="10" required>
                                    </input>
                                </div> 
                            </div> 
                        <!-- senha 2 -->
                            <div class="form-group">
                                <div class="input-group" style="margin-bottom: 4%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="cadastro-tecnico-confirma-senha" type="password" class="form-control"
                                        placeholder="Confirmar senha" maxlength="10" required>
                                    </input>
                                </div> 
                            </div> 

                        <!-- Envia o formulario -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Cadastrar </button>
                            </div> 


                            <div class="mb-3">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkButton-tecnico"
                                            required>
                                        <label for="checkButton-tecnico" style="font-size: 0.9rem;">Eu li e aceito os termos de
                                            compromisso</label>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <p class="text-center" style="font-size: 1rem;">Já está cadastrado? <a href="login.php">Login</a></p>

            </article>
        </div>
    </div>

    <script src="js/index-cadastro.js"></script>
</body>

</html>