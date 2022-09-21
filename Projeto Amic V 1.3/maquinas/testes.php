<?php

$pdo = require_once('../db/conecta.php');


$matricula = 87654321;
$us_curso =  'TESTE';
$us_periodo =  'TESTE';
$us_nome = 'TESTE';
$us_email = 'TESTE';
$us_senha = 'TESTE';
$us_login = 'TESTE';

$sql = 'INSERT INTO usuario VALUES(:matricula, :us_curso, :us_periodo, :us_nome, :us_email, :us_senha, :us_login)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':matricula' => $matricula,
    ':us_curso' => $us_curso,
    ':us_periodo' => $us_periodo,
    ':us_nome' => $us_nome,
    ':us_email' => $us_email,
    ':us_senha' => $us_senha,
    ':us_login' => $us_login,
]);


$sql2 = 'SELECT * FROM usuario';

$statement = $pdo->prepare($sql2);
$statement->execute();
$publisher = $statement->fetch(PDO::FETCH_ASSOC);

var_dump($publisher);

