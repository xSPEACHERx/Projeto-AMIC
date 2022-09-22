<?php
    session_start();
    include('php/verifica-login-tecnico.php');
    $pdo = require_once('../db/conecta.php');

    $email = (isset($_POST['login-tecnico-email'])) ? 
    $_POST['login-tecnico-email'] : null;

    $senha = (isset($_POST['login-tecnico-senha'])) ? 
    $_POST['login-tecnico-senha'] : null;

    $siape = null;

    $result = $pdo->query("SELECT * FROM tecnico
    WHERE tec_email = '{$email}' AND tec_senha = MD5('{$senha}')");

    $row = $result->rowCount();

    if($row == 1) {

        $result = $pdo->query("SELECT siape FROM tecnico
	    WHERE tec_email = '{$email}' AND tec_senha = MD5('{$senha}')");

        foreach($result->fetchAll() as $row) {
            $siape = $row['siape'];
        }

        $_SESSION['siape'] = $siape;
        header("Location: ../tec/menu-tec.php");
        exit();
    } else {
        header("Location: ../login.html");
        exit();
    }