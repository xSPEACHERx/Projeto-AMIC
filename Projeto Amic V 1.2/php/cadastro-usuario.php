<?php
    session_start();
    $pdo = require_once('../db/conecta.php');
    
    // Recepção de dados de cadastro.html
    $matricula = (isset($_POST['inputMatricula'])) ? $_POST['inputMatricula'] : null;
    $curso = (isset($_POST['usuarioCurso'])) ? $_POST['usuarioCurso'] : null;
    $periodo = (isset($_POST['usuarioPeriodo'])) ? $_POST['usuarioPeriodo'] : null;
    $nome = (isset($_POST['inputNomeUsuario'])) ? $_POST['inputNomeUsuario'] : null;
    $email = (isset($_POST['inputEmailUsuario'])) ? $_POST['inputEmailUsuario'] : null;
    $senha = (isset($_POST['inputSenhaUsuario'])) ? $_POST['inputSenhaUsuario'] : null;
    $confirmaSenha = (isset($_POST['inputConfirmaSenhaUsuario'])) ? $_POST['inputConfirmaSenhaUsuario'] : null;
    $login = (isset($_POST['inputLoginUsuario'])) ? $_POST['inputLoginUsuario'] : null;
      
    // if ($senha != $confirmaSenha) {
    //     $msg_senhas_nao_conferem = true;
    //     header("Location: ../cadastro.html");
    // }

    // die();

    // Inserção de dados no BD
    $result = $pdo->query("INSERT INTO usuario 
        VALUES ('{$matricula}', '{$curso}', '{$periodo}', '{$nome}', '{$email}', MD5('{$senha}'), '{$login}')");

    header("Location: ../login.html");
    die();