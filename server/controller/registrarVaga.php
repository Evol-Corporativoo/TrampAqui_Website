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
    $numeros = preg_replace("/[^0-9,.]/", "", $_POST['salarioVaga']);
    $semPontos = str_replace('.', '', $numeros);
    $numerosSalario = str_replace(',', '.', $semPontos);
    $vagaModel->setSalario(doubleval($numerosSalario));
    $vagaModel->setTipo($_POST['tipo-vaga']);
    $vagaModel->setModelo($_POST['modelo-vaga']);
    $vagaModel->setFormacao($_POST['formacaoVaga']);
    $vagaModel->setIdEmpresa($_SESSION['temporario_idEmpresa']);
   
    print_r($empresa);
    // Salvar a vaga no banco de dados
    DaoVaga::cadastrar($vagaModel);
    
    // Redirecionar para a página de destino
    header("Location: ../../dash/vagas.php?idEmpresa=".$_SESSION['temporario_idEmpresa']);
    unset($_SESSION['temporario_idEmpresa']);
    

}
?>