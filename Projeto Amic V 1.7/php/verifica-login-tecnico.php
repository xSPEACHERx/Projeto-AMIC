<?php
    if(!$_SESSION['siape']) {
        header("Location: ../login.html");
        exit();
    }