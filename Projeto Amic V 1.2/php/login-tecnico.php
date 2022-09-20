<?php
    session_start();
    $pdo = require_once('../db/conecta.php');

    $email = (isset($_POST['login_inputEmailTecnico'])) ? 
    $_POST['login_inputEmailTecnico'] : null;
    echo $email;

    $siape = (isset($_POST['login_inputSiape'])) ? 
    $_POST['login_inputSiape'] : null;
    echo $siape;

    $senha = (isset($_POST['login_inputSenhaTecnico'])) ? 
    $_POST['login_inputSenhaTecnico'] : null;
    echo $senha;

    $result = $pdo->query("SELECT * FROM tecnico
    WHERE tec_email = '{$email}'
    AND siape = '{$siape}' AND tec_senha = MD5('{$senha}')");

    $row = $result->rowCount();

    echo $row;

    if($row == 1) {
        $_SESSION['siape'] = $siape;
        header("Location: ../tec/menu-tec.html");
        exit();
    } else {
        header("Location: ../login.html");
        exit();
    }