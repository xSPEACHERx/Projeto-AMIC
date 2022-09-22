<?php

$pdo = require_once('../db/conecta.php');

$idmaquina = 87654321;
$maq_pro =  'TESTE';
$maq_mem =  'TESTE';
$maq_pla = 'TESTE';
$maq_obs =  'TESTE';
$maq_lic =  'TESTE';
$maq_lab = 'TESTE';
$maq_rel_pend = 5;
$maq_feedbacks = 2;
$maq_status = 'TESTE';

$sql = 'INSERT INTO maquina VALUES(:idmaquina, :maq_pro, :maq_mem, :maq_pla, :maq_obs, :maq_lic, :maq_lab, :maq_rel_pend, :maq_feedbacks, :maq_status)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':idmaquina' => $idmaquina,
    ':maq_pro' => $maq_pro,
    ':maq_mem' => $maq_mem,
    ':maq_pla' => $maq_pla,
    ':maq_obs' => $maq_obs,
    ':maq_lic' => $maq_lic,
    ':maq_lab' => $maq_lab,
    ':maq_rel_pend' => $maq_rel_pend,
    ':maq_feedbacks' => $maq_feedbacks,
    ':maq_status' => $maq_status,
]);


$sql2 = 'SELECT * FROM maquina';

$statement = $pdo->prepare($sql2);
$statement->execute();
$publisher = $statement->fetch(PDO::FETCH_ASSOC);

var_dump($publisher);

