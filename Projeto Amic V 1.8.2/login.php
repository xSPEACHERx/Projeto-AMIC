<?php

session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["matricula"]) == true){
    header("location: usuario/menu.php");
    exit;
} elseif(isset($_SESSION["siape"]) == true){
    header("location: tec/menu-tec.php");
    exit;
}

// se o login der erro ele recarrega a pagina com a mensagem de erro, recebendo um get do sistema-login.php para essa ação
if(isset($_GET['error'])){
    $message = 'Email ou Senha invalidos';
    $color = 'danger';

} else {
    $message = 'Digite seus dados cadastrados';
    $color = 'success';
    }
?>

<html>
<html lang="pt-BR">

<head>

    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

</head>

<body style="background-color: rgba(0, 0, 0, 0.13);">

    <!-- Container de conteudo -->
    <div class="container col-sm-12 col-md-6 " style="margin-top: 2%;">

        <!-- Cartão -->
        <div class="card">
            <article class="card-body">
                <div class="container text-center col-sm-12 col-md-6 "
                    style="background-color: white; margin-bottom: 2%;">
                    <img src="img/Logo Amic.png" class="img-fluid ">
                </div>
                <h4 class="card-title text-center mb-4 mt-1">Login</h4>
                <hr>
                <p class="text-<?php echo $color ?> text-center"><?php echo $message ?></p>

                <div class="conteudos">

                    <!-- Login Usuário -->
                    <div id="sistema-login">
                        <form action="php/sistema-login.php?<?php if(isset($_GET['code'])){echo 'code='.$_GET['code'];} ?>" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="login-email" class="form-control" placeholder="Email"
                                        type="text" maxlength="50" required>
                                </div> <!-- input-group.// -->
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"> </i> </span>
                                    </div>
                                    <input name="login-senha" class="form-control" placeholder="Senha"
                                        type="password" maxlength="10" required>
                                </div> <!-- input-group.// -->
                            </div> <!-- form-group// -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div>

                        </form>
                    </div>


                </div> <!-- Fim conteudos -->

                <!-- Recuperar senha -->
                <div class="form-group">
                    <div class="form-group d-md-flex" style="margin-top: 3%;">
                        <div class="w-50">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkButton">
                                    <label for="checkButton" style="font-size: 0.9rem;">Lembrar senha</label>
                                </div>
                            </div>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="recuperar senha/senha-esquecida-email.php?rota=login">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>

                <p class="text-center">Não está cadastrado? <a href="cadastro.html">Cadastre-se</a></p>

        </div>

    </div>

    <script src="js/index-login.js"></script>
</body>

</html>