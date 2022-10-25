<?php

  // insere o feedback (atravez de UPDATE) no reporte seleciondado (idreportes).

$pdo = require_once('../db/conecta.php');

$idmaquina = $_GET['code'];
$idreporte = $_GET['id'];

$tecnico_siape = NULL; // TEMPORARIO, será adicionado o siap do tecnico, atravez do session.
$re_feedback = $_POST['re_feedback'];
$re_feedback_data = date("Y-m-d H:i");


$sql = 'UPDATE reportes SET tecnico_siape=:tecnico_siape, re_feedback=:re_feedback, re_feedback_data=:re_feedback_data WHERE idreporte=:idreporte';

$statement = $pdo->prepare($sql);

$statement->execute([
    ':idreporte' => $idreporte,
	':tecnico_siape' => $tecnico_siape,
    ':re_feedback' => $re_feedback,
    ':re_feedback_data' => $re_feedback_data,
    
]);


header("Location: ../maquinas/maquina-tec.php?code=$idmaquina");


