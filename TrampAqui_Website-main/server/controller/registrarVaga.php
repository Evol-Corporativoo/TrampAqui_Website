<?php 
session_start();

// Verifique se os campos do formulário foram enviados e estão preenchidos corretamente
if (isset($_POST['descVaga'])|| isset($_POST['cargoVaga'])) {
    // Controller
   
    require_once './validarCnpj.php';
    $empresaController = new validarCnpj();

    // DAO
    require_once '../dao/DaoVaga.php';
    $vagaDAO = new DaoVaga();

    // Model
    require_once '../model/Vaga.php';
    require_once '../model/Conexao.php';
    require_once '../model/Empresa.php';

    $empresa = unserialize($_SESSION['empresa']);
    
    $vagaModel = new Vaga();
    $vagaModel->setNome($_POST['nomeVaga']);
    $vagaModel->setDescricao($_POST['descVaga']);
    $vagaModel->setCargo($_POST['cargoVaga']);
    $vagaModel->setCargaHoraria($_POST['cargaHorariaVaga']);
    $vagaModel->setSalario($_POST['salarioVaga']);
    $vagaModel->setSobreVaga($_POST['sobreVaga']);
    $vagaModel->setIdEmpresa($_SESSION['temporario_idEmpresa']);
   
    print_r($empresa);
    // Salvar a vaga no banco de dados
    DaoVaga::cadastrar($vagaModel);
    
    // Redirecionar para a página de destino
    header("Location: ../../dash/vagas.php?idEmpresa=".$_SESSION['temporario_idEmpresa']);
    unset($_SESSION['temporario_idEmpresa']);
    

}
?>