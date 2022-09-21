<?php

$pdo = require_once('../db/conecta.php');

// exibir os usuarios no sistema

$sql2 = 'SELECT * FROM usuario';

$statement = $pdo->prepare($sql2);
$statement->execute();

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

echo 'LISTA DE USUARIOS REGITRADOS NO SISTEMA:'.'<br>'.'<br>'; 

if ($publishers) {
	// show the publishers
	foreach ($publishers as $publisher) {
        echo 'NOME: '.$publisher['us_nome'].'<br>';
		echo 'Matricula: '.$publisher['matricula'].'<br>';
        echo 'CURSO: '.$publisher['us_curso'].'<br>';
        echo 'PERIODO: '.$publisher['us_periodo'].'<br>';
        echo 'EMAIL: '.$publisher['us_email'].'<br>';
        echo 'SENHA: '.$publisher['us_senha'].'<br>';
        echo 'LOGIN: '.$publisher['us_login'].'<br>'.'<br>';
	}
}

var_dump($publisher);

// fim da exibição dos usuarios 

echo'<br> ------------------------------------------------------------------------------------------------------------------------------------ <br>'.'<br>';

// exibir os MAQUINAS no sistema

$sql3 = 'SELECT * FROM maquina';

$statement = $pdo->prepare($sql3);
$statement->execute();

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

echo 'LISTA DE MAQUINAS REGITRADOS NO SISTEMA:'.'<br>'.'<br>';  

if ($publishers) {
	// show the publishers
	foreach ($publishers as $publisher) {
        echo ' idmaquina: '.$publisher['idmaquina'].'<br>';
		echo ' maq_pro: '.$publisher['maq_pro'].'<br>';
        echo ' maq_mem: '.$publisher['maq_mem'].'<br>';
        echo ' maq_pla: '.$publisher['maq_pla'].'<br>';
        echo ' maq_obs: '.$publisher['maq_obs'].'<br>';
        echo ' maq_lic: '.$publisher['maq_lic'].'<br>';
        echo ' maq_lab: '.$publisher['maq_lab'].'<br>';
        echo ' maq_rel_pend: '.$publisher['maq_rel_pend'].'<br>';
        echo ' maq_feedbacks: '.$publisher['maq_feedbacks'].'<br>';
        echo ' maq_status: '.$publisher['maq_status'].'<br>'.'<br>';
	}
}

var_dump($publisher);

// fim da exibição das maquinas
