<?php
    session_start();
    include('verifica-login-tecnico.php');
    $pdo = require_once('../db/conecta.php');

    $result = $pdo->query("SELECT tec_nome FROM tecnico");
?>

<h1>Bem vindo, <?php foreach($result->fetchAll() as $row)  { echo $row['tec_nome']; }?></h1>
<h2>Seu siape é: <?php echo $_SESSION['siape'];?></h2>
<h2><a href="logout-tecnico.php">Sair</a></h2>