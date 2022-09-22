<?php

    $pdo = require_once('../db/conecta.php');

    $nome = 
    $email =
    $login = 
    $siape =  
    $senha = 
    $isTec = 1;

    $result = $pdo->query("INSERT INTO tecnico 
        VALUES ('{$siape}', '{$nome}', '{$email}', '{$senha}', '{$login}', '{$isTec}')");

    header("Location: ../login.html");
    die();