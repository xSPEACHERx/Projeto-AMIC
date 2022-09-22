<?php

    $email = (isset($_POST['login_inputEmailTecnico'])) ? 
    $_POST['login_inputEmailTecnico'] : null;
    echo $email;

    $siape = (isset($_POST['login_inputSiape'])) ? 
    $_POST['login_inputSiape'] : null;
    echo $siape;

    $senha = (isset($_POST['login_inputSenhaTecnico'])) ? 
    $_POST['login_inputSenhaTecnico'] : null;
    echo $senha;