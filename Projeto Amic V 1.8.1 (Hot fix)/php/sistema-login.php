<?php 

// chama a sessão para colocar dados nas variaveis $_Session['variavel']
    session_start();

// conecta com o Banco de Dados
    $pdo = require_once('../db/conecta.php');

// se for de uma maquina
    if (isset($_GET['code'])){$code = $_GET['code'];}

// 1 para Usuario e 2 para Tecnico
    
    $email = $_POST['login-email'];  
    $senha = $_POST['login-senha'];
    $form = NULL;
    
    $sql = "SELECT matricula, us_nome  FROM usuario WHERE us_email = '$email' AND us_senha = '$senha'";
    $sql2 = "SELECT siape, tec_nome  FROM tecnico WHERE tec_email = '$email' AND tec_senha = '$senha'";

// executa a query sql, se possivel e define se é um usuario ou técnico
    if (isset($sql)){
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    if (isset($sql2)){
        $statement2 = $pdo->query($sql2);
        $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
    }
    if (count($result) != NULL){
        $form = 'us';
        echo 'o form recebeu 1';
    } elseif ($result2 != NULL) {
        $form = 'tec';
        $result = $result2;
        echo 'o form recebeu 2';
    } else {
        $form = 'error';
    }
    var_dump($result);
    var_dump(count($result));
    if ($result == NULL) {echo 'result nao é NULL';}

// Pega o resultado da query e toma uma ação
    switch ($result) {

        // caso o login deu erro
        case ($result != NULL and $form == 'error'):
            if (isset($_GET['code'])){
                header("location: ../login.php?error=true&code=$code");
            } else {
                header("location: ../login.php?error=true");
            }
            break;

        // caso venha de uma maquina e o login deu certo, volta para a pagina daquela maquina
        case ($result != NULL and $code != NULL):
            if ($form == 'us'){
                $_SESSION['matricula'] = $result[0]['matricula'];
                $_SESSION['us_nome'] = $result[0]['us_nome'];
                header("location: ../maquinas/maquina.php?code=$code");
            } elseif ($form == 'tec') {
                $_SESSION['siape'] = $result[0]['siape'];
                $_SESSION['tec_nome'] = $result[0]['tec_nome'];
                header("location: ../maquinas/maquina-tec.php?code=$code");
            }
            break;
        
        // caso o login deu certo, vai para o menu
        case ($result != NULL ):
            if ($form == 'us') {
                $_SESSION['matricula'] = $result[0]['matricula'];
                $_SESSION['us_nome'] = $result[0]['us_nome'];
                header("location: ../usuario/menu.php");

            } elseif ($form == 'tec') {
                $_SESSION['siape'] = $result[0]['siape'];
                $_SESSION['tec_nome'] = $result[0]['tec_nome'];
                header("location: ../tec/menu-tec.php");
            }
            break;
        
        // caso aconteça algun erro desconhecido ou o usuario tente burlar o login
        default:
            header("location: ../login.php");
            break;

    }