<?php

$rota = $_GET['rota'];
$email = $_POST['input-email-confirmation'];

// verifica se existe uma conta com esse email

    $pdo = require_once('../../db/conecta.php');
    // query 1
    $sql = "SELECT * FROM usuario WHERE us_email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute([':email' => $email]);
    $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

    // query 2
    $sql2 = "SELECT * FROM tecnico WHERE tec_email=:email";
    $statement2 = $pdo->prepare($sql2);
    $statement2->execute([':email' => $email]);
    $dados2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

// se existe uma conta com esse email então ele envia um email

    if ($dados != NULL){
        header("Location: ../senha-esquecida-codigo.php?rota=$rota&email=$email&tipo=1"); // não envia email por enquanto
    } elseif ($dados2 != NULL) {
        header("Location: ../senha-esquecida-codigo.php?rota=$rota&email=$email&tipo=2");
    } else {
        header("Location: ../senha-esquecida-email.php?rota=$rota&error=true");
    }
