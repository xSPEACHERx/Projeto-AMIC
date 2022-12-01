<?php

$pdo = require_once('../db/conecta.php');

$sql2 = 'SELECT * FROM maquina';

$statement = $pdo->prepare($sql2);
$statement->execute();

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);


$idreporte = random_int(10000,99999);
$usuario_matricula =  random_int(1000000000000000,9999999999999999);
$tecnico_siape =  NULL;
$maquina_idmaquina = $publishers[0]['idmaquina'];
$re_decricao = 'ESSA MAQUINA NÃO ESTÁ COM INTERNET';
$re_titulo = 'Problema de rede';
$re_tipo = 'Sem Internet';
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



echo 'executado';

