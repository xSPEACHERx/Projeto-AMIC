<?php

$pdo = require_once('../db/conecta.php');

$idmaquina = $_GET['code'];

$maq_pro = $_POST['maq_pro'];
$maq_mem = $_POST['maq_mem'];
$maq_pla = $_POST['maq_pla'];
$maq_obs = $_POST['maq_obs'];
$maq_lic = $_POST['maq_lic'];
$maq_lab = $_POST['maq_lab'];
$maq_status= $_POST['maq_status'];


$sql = 'UPDATE maquina SET maq_pro=:maq_pro, maq_mem=:maq_mem, maq_pla=:maq_pla, maq_obs=:maq_obs, maq_lic=:maq_lic, maq_lab=:maq_lab, maq_status=:maq_status WHERE idmaquina=:idmaquina';

$statement = $pdo->prepare($sql);

$statement->execute([
	':idmaquina' => $idmaquina,
    ':maq_pro' => $maq_pro,
    ':maq_mem' => $maq_mem,
    ':maq_pla' => $maq_pla,
    ':maq_obs' => $maq_obs,
    ':maq_lic' => $maq_lic,
    ':maq_lab' => $maq_lab,
    ':maq_status' => $maq_status,
]);



header("Location: ../maquinas/maquina-tec.php?code=$idmaquina");


