<?php

// atualiza os dados do tecnico
    session_start();
    $pdo = require_once('../db/conecta.php');

    $nome = (isset($_POST['update-tecnico-nome'])) ? $_POST['update-tecnico-nome'] : null;
    $email = (isset($_POST['update-tecnico-email'])) ? $_POST['update-tecnico-email'] : null;
    $siape = $_SESSION['siape'];

    $sql = 'UPDATE tecnico SET tec_nome=:tec_nome, tec_email=:tec_email WHERE siape=:siape';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':tec_nome' => $nome,
        ':tec_email' => $email,
        ':siape' => $siape
    ]);

// volta para a pagina
    header("Location: ../tec/dados-pessoais-tec.php");