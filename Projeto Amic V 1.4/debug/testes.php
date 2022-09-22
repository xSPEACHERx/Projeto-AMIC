<?php

$pdo = require_once('../db/conecta.php');


$matricula = 472389129;
$us_curso =  'EMI informatica';
$us_periodo =  'TESTE';
$us_nome = 'TESTE';
$us_email = 'diego16.rar@gmail.com';
$us_senha = '123';
$us_login = 'diego';

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

