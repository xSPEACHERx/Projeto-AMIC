<?php

    if(!$_SESSION['siape']) {
        header("Location: login-tecnico.php");
        exit();
    }