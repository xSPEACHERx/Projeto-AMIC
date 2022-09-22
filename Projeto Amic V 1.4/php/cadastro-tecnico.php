<?php
    $pdo = require_once('../db/conecta.php');

    $nome = (isset($_POST['cadastro-tecnico-nome'])) ? $_POST['cadastro-tecnico-nome'] : null;
    $email = (isset($_POST['cadastro-tecnico-email'])) ? $_POST['cadastro-tecnico-email'] : null;
    $login = (isset($_POST['cadastro-tecnico-login'])) ? $_POST['cadastro-tecnico-login'] : null;
    $siape = (isset($_POST['cadastro-tecnico-siape'])) ? $_POST['cadastro-tecnico-siape'] : null;    
    $senha = (isset($_POST['cadastro-tecnico-senha'])) ? $_POST['cadastro-tecnico-senha'] : null;
    $isTec = 1;

    $result = $pdo->query("INSERT INTO tecnico 
        VALUES ('{$siape}', '{$nome}', '{$email}', MD5('{$senha}'), '{$login}', '{$isTec}')");

    header("Location: ../login.html");
    die();