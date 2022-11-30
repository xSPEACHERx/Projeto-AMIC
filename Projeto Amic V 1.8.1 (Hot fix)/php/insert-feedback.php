<?php

session_start();
// insere o feedback (atravez de UPDATE) no reporte seleciondado (idreportes).

  $pdo = require_once('../db/conecta.php');

  $idmaquina = $_GET['code'];
  $idreporte = $_GET['id'];

  $tecnico_siape = $_SESSION['siape'];
  $re_feedback = $_POST['re_feedback'];
  $re_feedback_data = date("Y-m-d H:i");

  $sql = 'UPDATE reporte SET tecnico_siape=:tecnico_siape, re_feedback=:re_feedback, re_feedback_data=:re_feedback_data WHERE idreporte=:idreporte';
  $statement = $pdo->prepare($sql);
  $statement->execute([
      ':idreporte' => $idreporte,
    ':tecnico_siape' => $tecnico_siape,
      ':re_feedback' => $re_feedback,
      ':re_feedback_data' => $re_feedback_data,
      
  ]);

// atualiza os contadores da maquina

  $sql = "UPDATE maquina SET maq_feedbacks=maq_feedbacks+1 WHERE idmaquina=$idmaquina";
  $statement = $pdo->query($sql);

  $sql = "UPDATE maquina SET maq_rel_pend=maq_rel_pend-1 WHERE idmaquina=$idmaquina";
  $statement = $pdo->query($sql);

  // atualiza os contadores do tecnico
  $sql = "UPDATE tecnico SET tec_isTec=tec_isTec+1 WHERE siape=$tecnico_siape";
  $statement = $pdo->query($sql);

// apos finalizar volta para a pagina da maquina
  header("Location: ../maquinas/maquina-tec.php?code=$idmaquina");


