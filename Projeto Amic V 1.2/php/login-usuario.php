<?php
    session_start();
    $pdo = require_once('../db/conecta.php');

    $email = (isset($_POST['login_inputEmailUsuario'])) ? 
    $_POST['login_inputEmailUsuario'] : null;

    $matricula = (isset($_POST['login_inputMatricula'])) ? 
    $_POST['login_inputMatricula'] : null;
    
    $senha = (isset($_POST['login_inputSenhaUsuario'])) ? 
    $_POST['login_inputSenhaUsuario'] : null;
    
    $result = $pdo->query("SELECT * FROM usuario
	WHERE us_email = '{$email}'
    AND matricula = '{$matricula}' AND us_senha = MD5('{$senha}')");

    $row = $result->rowCount();

    if($row == 1) {
        $_SESSION['matricula'] = $matricula;
        header("Location: ../usuario/menu.html");
        exit();
    } else {
        header("Location: ../login.html");
        exit();
    }