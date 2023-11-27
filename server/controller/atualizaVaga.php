<?php
require_once('../model/Conexao.php');
require_once('../model/Vaga.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

// aqui recebe do buscaVagas.js
$data = json_decode(file_get_contents('php://input'), true);

// Extraia os dados
$idVaga = $data['idVaga'];
$nomeVaga = $data['nomeVaga'];
$cargoVaga = $data['cargoVaga'];
$descVaga = $data['descVaga'];
$cargaHorariaVaga = $data['cargaHorariaVaga'];

$conexao = Conexao::conectar();

$queryUpdate = 'UPDATE tbvaga 
                SET nomeVaga=?, cargoVaga=?, descVaga=?, cargaHorariaVaga=? 
                WHERE idVaga=?';

$prepare = $conexao->prepare($queryUpdate);
$prepare->bindValue(1, $nomeVaga);
$prepare->bindValue(2, $cargoVaga);
$prepare->bindValue(3, $descVaga);
$prepare->bindValue(4, $cargaHorariaVaga);
$prepare->bindValue(5, $idVaga);

$prepare->execute();


$response = ['success' => true];
echo json_encode($response);
?>
