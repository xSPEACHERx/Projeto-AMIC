<?php

 // DELETA maquina do idmaquina selecionado da tabela maquina e os reportes com aquele id.

$pdo = require_once('../db/conecta.php');

$idmaquina = $_GET['code'];

$sql = 'DELETE FROM maquina WHERE idmaquina=:idmaquina';
$statement = $pdo->prepare($sql);
$statement->execute([
	':idmaquina' => $idmaquina,
]);

$sql = 'DELETE FROM reporte WHERE maquina_idmaquina=:idmaquina';
$statement = $pdo->prepare($sql);
$statement->execute([
	':idmaquina' => $idmaquina,
]);

header("Location: ../tec/maquinas-tec.php");


