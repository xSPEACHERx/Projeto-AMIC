<?php 

// chama a sessão para colocar dados nas variaveis $_Session['variavel']
    session_start();

// conecta com o Banco de Dados
    $pdo = require_once('../db/conecta.php');

// define qual formulario foi enviado
    $form = $_GET['form'];

// se for de uma maquina
    if (isset($_GET['code'])){$code = $_GET['code'];}

// 1 para Usuario e 2 para Tecnico
    if ($form == '1'){
        $email = $_POST['login-usuario-email'];  
        $senha = $_POST['login-usuario-senha'];
        
        $sql = "SELECT matricula, us_nome  FROM usuario WHERE us_email = '$email' AND us_senha = '$senha'";

    } elseif ($form == '2') {
        $email = $_POST['login-tecnico-email'];  
        $senha = $_POST['login-tecnico-senha']; 

        $sql = "SELECT siape, tec_nome  FROM tecnico WHERE tec_email = '$email' AND tec_senha = '$senha'";
    }

// executa a query sql, se possivel
    if (isset($sql)){
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

// Pega o resultado da query e toma uma ação
    switch ($result) {

        // caso venha de uma maquina e o login deu certo, volta para a pagina daquela maquina
        case (count($result) > 0 && $form == '1' && isset($_GET['code'])):
            $_SESSION['matricula'] = $result[0]['matricula'];
            $_SESSION['us_nome'] = $result[0]['us_nome'];
            header("location: ../maquinas/maquina.php?code=$code");
            break;
        
        // caso o login deu certo, vai para o menu
        case (count($result) > 0 && $form == '1' ):
            $_SESSION['matricula'] = $result[0]['matricula'];
            $_SESSION['us_nome'] = $result[0]['us_nome'];
            header("location: ../usuario/menu.php");
            break;
        
        // caso venha de uma maquina e o login deu certo Versão tecnico
        case (count($result) > 0 && $form == '2'&& isset($_GET['code'])):
            $_SESSION['siape'] = $result[0]['siape'];
            $_SESSION['tec_nome'] = $result[0]['tec_nome'];
            header("location: ../maquinas/maquina-tec.php?code=$code");
            break;
        
        // caso o login deu certo, vai para o menu Versão Tecnico
        case (count($result) > 0 && $form == '2'):
            $_SESSION['siape'] = $result[0]['siape'];
            $_SESSION['tec_nome'] = $result[0]['tec_nome'];
            header("location: ../tec/menu-tec.php");
            break;
        
        // caso o login deu erro e venha de uma maquina
        case (count($result) == 0 && isset($_GET['code'])):
            header("location: ../login.php?error=true&code=$code");
            break;
        
        // caso o login deu erro
        case (count($result) == 0 ):
            header("location: ../login.php?error=true");
            break;
        
        // caso aconteça algun erro desconhecido ou o usuario tente burlar o login
        default:
            header("location: ../login.php");
            break;

    }