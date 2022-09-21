<?php
    session_start();
    include('php/verifica-login-usuario.php');
    $pdo = require_once('../db/conecta.php');

    $email = (isset($_POST['login-usuario-email'])) ? 
    $_POST['login-usuario-email'] : null;
    
    $senha = (isset($_POST['login-usuario-senha'])) ? 
    $_POST['login-usuario-senha'] : null;
    
    $matricula = null;

    $result = $pdo->query("SELECT * FROM usuario
	WHERE us_email = '{$email}' AND us_senha = MD5('{$senha}')");

    $row = $result->rowCount();

    if($row == 1) {

        $result = $pdo->query("SELECT matricula FROM usuario
	    WHERE us_email = '{$email}' AND us_senha = MD5('{$senha}')");

        foreach($result->fetchAll() as $row) {
            $matricula = $row['matricula'];
        }

        $_SESSION['matricula'] = $matricula;
        header("Location: ../usuario/menu.php");
        exit();

    } else {
        header("Location: ../login.html");
        exit();
    }