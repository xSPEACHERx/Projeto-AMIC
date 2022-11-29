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

// fim da exibição dos usuarios 

echo'<br> --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- <br>'.'<br>';


// exibir os tecnicos no sistema

$sql2 = 'SELECT * FROM tecnico';

$statement = $pdo->prepare($sql2);
$statement->execute();

$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

echo 'LISTA DE TECNICOS REGITRADOS NO SISTEMA:'.'<br>'.'<br>'; 

if ($publishers) {
	// show the publishers
	foreach ($publishers as $publisher) {
		echo 'SIAPE: '.$publisher['siape'].'<br>';
        echo 'NOME: '.$publisher['tec_nome'].'<br>';
        echo 'EMAIL: '.$publisher['tec_email'].'<br>';
        echo 'SENHA: '.$publisher['tec_senha'].'<br>';
        echo 'LOGIN: '.$publisher['tec_login'].'<br>';
        echo 'é tec: '.$publisher['tec_isTec'].'<br>'.'<br>';
	}
}

// fim da exibição dos tecnicos 

echo'<br> --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- <br>'.'<br>';


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

    

        // exibir os RELATORIOS DE CADA MAQUINA no sistema

            $idmaquina = $publisher['idmaquina'];

            $sql3 = "SELECT * FROM reporte WHERE maquina_idmaquina=$idmaquina";

            $statement = $pdo->prepare($sql3);
            $statement->execute();

            $publishers2 = $statement->fetchAll(PDO::FETCH_ASSOC);

            echo "LISTA DE RELATORIOS REGISTRADOS NA MAQUINA: $idmaquina".'<br>'.'<br>';  

            if ($publishers2) {
                // show the publishers
                foreach ($publishers2 as $publisher) {
                    echo ' idreporte: '.$publisher['idreporte'].'<br>';
                    echo ' usuario_matricula: '.$publisher['usuario_matricula'].'<br>';
                    echo ' tecnico_siape: '.$publisher['tecnico_siape'].'<br>';
                    echo ' maquina_idmaquina: '.$publisher['maquina_idmaquina'].'<br>';
                    echo ' re_decricao: '.$publisher['re_decricao'].'<br>';
                    echo ' re_titulo: '.$publisher['re_titulo'].'<br>';
                    echo ' re_tipo: '.$publisher['re_tipo'].'<br>';
                    echo ' re_data: '.$publisher['re_data'].'<br>';
                    echo ' re_feedback: '.$publisher['re_feedback'].'<br>';
                    echo ' re_feedback_data: '.$publisher['re_feedback_data'].'<br>';

                    echo'<br> ************************** <br>'.'<br>';
                }
            }

            echo'<br> <><><><><><><><><><><><><><<><><><><><><<><><><><><><><><><><><> <br>'.'<br>';

            // fim da exibição dO RELATÓRIO
	}
}

// fim da exibição das maquinas


