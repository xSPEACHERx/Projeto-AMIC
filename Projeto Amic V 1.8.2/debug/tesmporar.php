<?php

$pdo = require_once('../db/conecta.php');

$idmaquina = $_GET['code'];

$idreportes = random_int(10000,99999);
$usuario_matricula =  random_int(1000000000000000,9999999999999999);
$tecnico_siape =  NULL;
$maquina_idmaquina = $idmaquina;
$re_decricao = $_POST['re_decricao'];
$re_titulo = $_POST['re_titulo'];
$re_tipo = $_POST['re_tipo'];
$re_data = date("Y-m-d H:i");
$re_feedback = NULL;
$re_feedback_data = NULL;

$sql = 'INSERT INTO reportes VALUES(:idreportes, :usuario_matricula, :tecnico_siape, :maquina_idmaquina, :re_decricao, :re_titulo, :re_tipo, :re_data, :re_feedback, :re_feedback_data)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':idreportes' => $idreportes,
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


$maq_rel_pend = null;

$sql2 = 'SELECT * FROM maquina WHERE idmaquina=:idmaquina';

$statement = $pdo->prepare($sql2);

$statement->execute([
	':idmaquina' => $idmaquina,
]);

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($publishers);

$maq_rel_pend = intval($publishers['maq_rel_pend']);

$sql = 'UPDATE maquina SET maq_rel_pend=:maq_rel_pend WHERE idmaquina=:idmaquina';

$statement = $pdo->prepare($sql);

$statement->execute([
	':idmaquina' => $idmaquina,
    ':maq_rel_pend' => $maq_rel_pend,
]);

header("Location: ../maquinas/maquina.php?code=$idmaquina");
