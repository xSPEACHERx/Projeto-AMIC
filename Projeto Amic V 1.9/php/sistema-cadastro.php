<?php

$pdo = require_once('../db/conecta.php');

// define qual foi o formulario enviado, 1 para usuario, 2 para tecnico e define variavel email
    $form = $_GET['form'];

    if ($form == "1"){
        $email = $_POST['cadastro-usuario-email'];
    } elseif ($form == "2") {
        $email = $_POST['cadastro-tecnico-email'];
    }
    

// recebe um codigo de maquina, se existente
    if (isset($_GET['code'])){
        $linklog = "&code=".$_GET['code'];
    } else {
        $linklog = "";
    }

// verifica se existe uma conta com esse email

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

    // se existe uma conta com esse email então uma mensagem de erro aparece

        if (count($dados) > 0){
            header("Location: ../cadastro.php?error=1$linklog");

        } elseif (count($dados2) > 0) {
            header("Location: ../cadastro.php?error=1$linklog");

        } else {

        // verifica se a confirmação de senha está correto
            if($form == '1'){
                $senha1 = $_POST['cadastro-usuario-senha'];
                $senha2 = $_POST['cadastro-usuario-confirmar-senha'];
            } elseif ($form == '2') {
                $senha1 = $_POST['cadastro-tecnico-senha'];
                $senha2 = $_POST['cadastro-tecnico-confirma-senha'];
            }

            if ($senha1 == $senha2){

                // registra a conta
                    if ($form == '1') {

                        $matricula = $_POST['cadastro-usuario-matricula'];
                        $curso = $_POST['cadastro-usuario-curso'];
                        $periodo = $_POST['cadastro-usuario-periodo'];
                        $nome = $_POST['cadastro-usuario-nome'];
                        $senha = $senha1;
                        $login = $_POST['cadastro-usuario-login'];
                        $relat = 0;
                        
                        $result = $pdo->query("INSERT INTO usuario VALUES ('{$matricula}', '{$curso}', '{$periodo}', '{$nome}', '{$email}', '{$senha}', '{$login}', '{$relat}')");

                        header("Location: ../login.php?success=true$linklog");

                    } elseif ($form == '2'){

                        $nome = $_POST['cadastro-tecnico-nome'];
                        $email = $_POST['cadastro-tecnico-email'];
                        $login = $_POST['cadastro-tecnico-login'];
                        $siape = $_POST['cadastro-tecnico-siape'];
                        $senha = $senha1;
                        $isTec = 0; // istec é o numero de reportes que o tecnico respondeu

                        $result = $pdo->query("INSERT INTO tecnico VALUES ('{$siape}', '{$nome}', '{$email}', '{$senha}', '{$login}', '{$isTec}')");

                        header("Location: ../login.php?success=true$linklog");
                    }


                } else{
                    header("Location: ../cadastro.php?error=2$linklog");
                    }
            }

        

