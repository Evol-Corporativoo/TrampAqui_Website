<?php

    session_start();

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    require_once(__DIR__.'/../dao/DaoCandidatura.php');

    $dados = $_SESSION['buscarCandidatos'];
    $json = file_get_contents('php://input');
    $status = json_decode($json);
    $lista = DaoCandidatura::listar($dados[0],$status);

    echo json_encode($lista);

?>