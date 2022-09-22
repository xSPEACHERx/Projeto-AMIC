<?php

$pdo = require_once('../db/conecta.php');

$idmaquina = $_GET['code'];
$idreportes = $_POST['idreportes'];

$tecnico_siape = NULL;
$re_feedback = $_POST['re_feedback'];
$re_feedback_data = date("Y-m-d H:i");


$sql = 'UPDATE relatorio SET tecnico_siape=:tecnico_siape, re_feedback=:re_feedback, re_feedback_data=:re_feedback_data WHERE idreportes=:idreportes';

$statement = $pdo->prepare($sql);

$statement->execute([
	':tecnico_siape' => $tecnico_siape,
    ':re_feedback' => $re_feedback,
    ':re_feedback_data' => $re_feedback_data,
    
]);



header("Location: ../maquinas/maquina-tec.php?code=$idmaquina");


