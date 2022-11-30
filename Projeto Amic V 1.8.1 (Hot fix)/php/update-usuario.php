<?php

// atualiza os dados do usuario
    session_start();
    
    $pdo = require_once('../db/conecta.php');

    $nome = (isset($_POST['update-usuario-nome'])) ? $_POST['update-usuario-nome'] : null;
    $email = (isset($_POST['update-usuario-email'])) ? $_POST['update-usuario-email'] : null;
    $matricula = $_SESSION['matricula'];

    $sql = 'UPDATE usuario SET us_nome=:us_nome, us_email=:us_email WHERE matricula=:matricula';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':us_nome' => $nome,
        ':us_email' => $email,
        ':matricula' => $matricula
    ]);

// volta para a pagina
    header("Location: ../usuario/dados-pessoais.php");