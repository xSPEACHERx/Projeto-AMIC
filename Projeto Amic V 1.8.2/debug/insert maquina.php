<?php

$pdo = require_once('../db/conecta.php');

$idmaquina = random_int(10000000,99999999);
$maq_pro =  'AMD Ryzen Threadripper Pro';
$maq_mem =  '4X16 DDR4';
$maq_pla = 'B660 AORUS';
$maq_obs =  'Nenhuma';
$maq_lic =  'AC25-X493-98KJ-Z4F3';
$maq_lab = 'Lab 01';
$maq_rel_pend = 0;
$maq_feedbacks = 0;
$maq_status = 'Operando';

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

echo 'executado';
