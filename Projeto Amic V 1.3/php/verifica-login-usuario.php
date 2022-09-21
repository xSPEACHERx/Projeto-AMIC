<?php
    if(!$_SESSION['matricula']) {
        header("Location: ../login.html");
        exit();
    }