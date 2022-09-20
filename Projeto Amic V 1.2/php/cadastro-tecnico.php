<?php
    // Recepção de dados de cadastro.html
    $pdo = require_once('../db/conecta.php');

    $nome = (isset($_POST['inputNomeTecnico'])) ? $_POST['inputNomeTecnico'] : null;
    $email = (isset($_POST['inputEmailTecnico'])) ? $_POST['inputEmailTecnico'] : null;
    $login = (isset($_POST['inputLoginTecnico'])) ? $_POST['inputLoginTecnico'] : null;
    $siape = (isset($_POST['inputSiape'])) ? $_POST['inputSiape'] : null;    
    $senha = (isset($_POST['inputSenhaTecnico'])) ? $_POST['inputSenhaTecnico'] : null;
    $isTec = 1;

    // Inserção de dados no BD
    $result = $pdo->query("INSERT INTO tecnico 
        VALUES ('{$siape}', '{$nome}', '{$email}', MD5('{$senha}'), '{$login}', '{$isTec}')");

    header("Location: ../login.html");
    die();