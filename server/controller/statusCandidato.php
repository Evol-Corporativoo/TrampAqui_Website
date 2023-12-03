<?php

    session_start();

    header('Location: ../../dash/listCandidatos.php?idVaga='.$_SESSION['idVaga_real']);

    $idCandidatura = $_GET['id'];
    $status = $_GET['status'];

    require_once(__DIR__.'/../dao/DaoCandidatura.php');

    if($status==2){
        DaoCandidatura::aceitar($idCandidatura);
    } else {
        DaoCandidatura::recusar($idCandidatura);
    }

?>