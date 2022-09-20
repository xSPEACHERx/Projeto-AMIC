<?php
    session_start();
    include('verifica-login-usuario.php');
    $pdo = require_once('../db/conecta.php');

    $result = $pdo->query("SELECT us_nome FROM usuario");
?>

<h1>Bem vindo, <?php foreach($result->fetchAll() as $row)  { echo $row['us_nome']; }?></h1>
<h2>Sua matrícula é: <?php echo $_SESSION['matricula'];?></h2>
<h2><a href="logout-usuario.php">Sair</a></h2>