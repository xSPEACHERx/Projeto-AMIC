<?php

    if(!$_SESSION['matricula']) {
        header("Location: login-usuario.php");
        exit();
    }