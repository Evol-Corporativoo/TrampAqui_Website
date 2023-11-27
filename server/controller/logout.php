<?php

    session_start();
    header('Location: ../../index.html');
    unset($_SESSION['usuario']);
    unset($_SESSION['empresas']);
    session_destroy();

?>