<?php 
$rota = $_GET['rota'];
$email = $_GET['email'];
$tipo = $_GET['tipo'];

// define mensagem de erro
    if(isset($_GET['error'])){
        if ($_GET['error'] == '1') {$message = "As duas Senhas inseridas não coincidem";}
        if ($_GET['error'] == '2') {$message = "A nova senha não pode ser a mesma do que a anterior.";}
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Login</title>
</head>

<body style="background-color: rgba(0, 0, 0, 0.13);">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

    <form action="php/mudar-senha.php?rota=<?php echo $rota ?>&email=<?php echo $email ?>&tipo=<?php echo $tipo ?>" method="post">
        <div class="container col-sm-12 col-md-6 col-xl-4" style="margin-top: 10%;">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Redefinir senha</h4>
                    <hr>
                    <?php 
                        if (isset($message)){
                            echo "<p class='text-center text-danger'>$message</p>";
                        } else{
                            echo "<p class='text-center text-success'>Preencha os campos abaixo. </p>";
                        }
                    ?>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="input-new-password" id="input-new-password" class="form-control"
                                placeholder="Digite sua nova senha" type="password" maxlength="15" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="input-confirm-new-password" id="input-confirm-new-password" class="form-control"
                                placeholder="Confirme sua senha" type="password" maxlength="15" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Redefinir senha </button>
                        <div class="form-group d-md-flex" style="margin-top: 5%;">
                            <div class="w-50 text-left">

                                <?php // verifica o caminho de origem do usuario, se ele veio da pagina de login ou de perfil
                                    if($rota == 'dados-pessoais') {
                                        echo "<a href='../usuario/dados-pessoais.php'>Cancelar</a>";
                                    } elseif ($rota == 'dados-pessoais-tec') {
                                        echo "<a href='../tec/dados-pessoais-tec.php'>Cancelar</a>";
                                    } else {
                                        echo "<a href='../login.php'>Cancelar</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </form>

</body>

</html>