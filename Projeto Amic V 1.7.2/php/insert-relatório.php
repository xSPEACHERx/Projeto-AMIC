<?php

 // insere dados do formularo do relatório (versão usuario) na tabela reportes.

$pdo = require_once('../db/conecta.php');

$idmaquina = $_GET['code'];

$idreporte = random_int(10000,99999);
$usuario_matricula =  random_int(1000000000000000,9999999999999999); // temporario, na versão final será inserido a matricula do usuario, atravez do session.
$tecnico_siape =  NULL;
$maquina_idmaquina = $idmaquina;
$re_decricao = $_POST['re_decricao'];
$re_titulo = $_POST['re_titulo'];
$re_tipo = $_POST['re_tipo'];
$re_data = date("Y-m-d H:i");
$re_feedback = NULL;
$re_feedback_data = NULL;

$sql = 'INSERT INTO reporte VALUES(:idreporte, :usuario_matricula, :tecnico_siape, :maquina_idmaquina, :re_decricao, :re_titulo, :re_tipo, :re_data, :re_feedback, :re_feedback_data)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':idreporte' => $idreporte,
    ':usuario_matricula' => $usuario_matricula,
    ':tecnico_siape' => $tecnico_siape,
    ':maquina_idmaquina' => $maquina_idmaquina,
    ':re_decricao' => $re_decricao,
    ':re_titulo' => $re_titulo,
    ':re_tipo' => $re_tipo,
    ':re_data' => $re_data,
    ':re_feedback' => $re_feedback,
    ':re_feedback_data' => $re_feedback_data,
]);

$sql = "UPDATE maquina SET maq_rel_pend=maq_rel_pend+1 WHERE idmaquina=$idmaquina";

$statement = $pdo->query($sql);

header("Location: ../maquinas/maquina.php?code=$idmaquina");
