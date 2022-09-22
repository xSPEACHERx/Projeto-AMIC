<?php
    $pdo = require_once('../db/conecta.php');

    $status = (isset($_POST['cadastro-maquina-status'])) ? $_POST['cadastro-maquina-status'] : null;
    $local = (isset($_POST['cadastro-maquina-local'])) ? $_POST['cadastro-maquina-local'] : null;
    $id = (isset($_POST['cadastro-maquina-id'])) ? $_POST['cadastro-maquina-id'] : random_int(10000000, 99999999);
    $pro = (isset($_POST['cadastro-maquina-pro'])) ? $_POST['cadastro-maquina-pro'] : null;    
    $mem = (isset($_POST['cadastro-maquina-mem'])) ? $_POST['cadastro-maquina-mem'] : null;
    $pla = (isset($_POST['cadastro-maquina-pla'])) ? $_POST['cadastro-maquina-pla'] : null;
    $lic = (isset($_POST['cadastro-maquina-lic'])) ? $_POST['cadastro-maquina-lic'] : null;
    $obs = (isset($_POST['cadastro-maquina-obs'])) ? $_POST['cadastro-maquina-obs'] : null;

    $result = $pdo->query("INSERT INTO maquina 
	VALUES ('{$id}', '{$pro}', '{$mem}', '{$pla}', '{$obs}', '{$lic}', '{$local}', 0, 0, '{$status}')");

    header("Location: ../tec/maquinas-tec.php");
    die();