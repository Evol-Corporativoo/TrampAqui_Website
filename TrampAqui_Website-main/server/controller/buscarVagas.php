<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    session_start();
    require_once('../model/Empresa.php');
    $id = $_SESSION['temporario_idEmpresa'];
    $empresa = new Empresa();
    $empresa->setId($id);

    require_once('../dao/DaoVaga.php');
    
    $vagas = DaoVaga::listarPorEmpresa($empresa);

    echo $vagas;
    unset($_SESSION['temporario_idEmpresa']);

?>