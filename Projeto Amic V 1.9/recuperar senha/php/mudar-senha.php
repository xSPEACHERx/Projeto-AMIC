<?php

$pdo = require_once('../../db/conecta.php');

$rota = $_GET['rota'];
$email = $_GET['email'];
$tipo = $_GET['tipo'];

$dados = $dados2 = NULL;

// verifica se as duas senhas coincidem

    $senha1 = $_POST['input-new-password'];
    $senha2 = $_POST['input-confirm-new-password'];
    

    if ($senha1 != $senha2){
        header("Location: ../senha-esquecida-nova-senha.php?rota=$rota&error=1&email=$email&tipo=$tipo");
    }

// verifica se a nova senha é igual a anterior

    if ($tipo == 1){
        $sql = "SELECT us_senha FROM usuario WHERE us_email=:email";
        $statement = $pdo->prepare($sql);
        $statement->execute([':email' => $email]);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);
    } elseif ($tipo == 2){
        $sql2 = "SELECT tec_senha FROM tecnico WHERE tec_email=:email";
        $statement2 = $pdo->prepare($sql2);
        $statement2->execute([':email' => $email]);
        $dados2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
    }

    if ($senha1 == $dados[0]['us_senha'] or $senha1 == $dados2[0]['tec_senha']){
        header("Location: ../senha-esquecida-nova-senha.php?rota=$rota&error=2&email=$email&tipo=$tipo");
    }

// Modifica a senha

    if ($tipo == 1){
        $sql = "UPDATE usuario SET us_senha=:senha WHERE us_email=:email";
        $statement = $pdo->prepare($sql);
        $statement->execute([':senha' => $senha1, ':email' => $email]);
    } elseif ($tipo == 2){
        $sql = "UPDATE tecnico SET tec_senha=:senha WHERE tec_email=:email";
        $statement2 = $pdo->prepare($sql2);
        $statement2->execute([':senha' => $senha1, ':email' => $email]);
    }

// encerra sessão e volta ao login
    header("Location: ../../php/sistema-logout.php");