<?php
    $pdo = require_once('../db/conecta.php');
    
    $matricula = (isset($_POST['cadastro-usuario-matricula'])) ? $_POST['cadastro-usuario-matricula'] : null;
    $curso = (isset($_POST['cadastro-usuario-curso'])) ? $_POST['cadastro-usuario-curso'] : null;
    $periodo = (isset($_POST['cadastro-usuario-periodo'])) ? $_POST['cadastro-usuario-periodo'] : null;
    $nome = (isset($_POST['cadastro-usuario-nome'])) ? $_POST['cadastro-usuario-nome'] : null;
    $email = (isset($_POST['cadastro-usuario-email'])) ? $_POST['cadastro-usuario-email'] : null;
    $senha = (isset($_POST['cadastro-usuario-senha'])) ? $_POST['cadastro-usuario-senha'] : null;
    $login = (isset($_POST['cadastro-usuario-login'])) ? $_POST['cadastro-usuario-login'] : null;
    
    $result = $pdo->query("INSERT INTO usuario 
        VALUES ('{$matricula}', '{$curso}', '{$periodo}', '{$nome}', '{$email}', '{$senha}', '{$login}')");

    header("Location: ../login.html");
    die();