<?php 

    session_start();
    //próxima tela
    header('Location: ../../dash/addEmpresa.php');
    //Controller
    require_once './validarCnpj.php';
    $empresaController = new validarCnpj();

    //DAO
    require_once '../dao/DaoEmpresa.php';
    $empresaDAO = new DaoEmpresa();

    //Model
    require_once '../model/Empresa.php';
    require_once '../model/Conexao.php';
    require_once '../model/Usuario.php';
    $empresaModel = new Empresa();
    $empresaModel->setNome($_POST['nomeEmpresa']);
    $empresaModel->setCnpj($_POST['cnpjEmpresa']);
    $empresaModel->setAreaAtuacao($_POST['atuacaoEmpresa']);
    $empresaModel->setTelefone($_POST['telEmpresa']);
    $empresaModel->setCep($_POST['cepEmpresa']);
    $empresaModel->setCidade($_POST['cidadeEmpresa']);
    $empresaModel->setUf($_POST['ufEmpresa']);
    $empresaModel->setBairro($_POST['bairroEmpresa']);
    $empresaModel->setLogradouro($_POST['logradouroEmpresa']);
    $empresaModel->setNumero($_POST['numeroEmpresa']);
    $empresaModel->setComplemento($_POST['complementoEmpresa']);

    $usuario = unserialize($_SESSION['usuario']);
    $empresaModel->setIdUsuario($usuario->getId());

    $cadastrou = DaoEmpresa::cadastrar($empresaModel);
    echo $cadastrou;
    if($cadastrou==true){
        $empresas = DaoEmpresa::procurarPorUsuario($usuario);
        $_SESSION['empresas'] = serialize($empresas);
        $arrayEmpresa = DaoEmpresa::procurarCNPJ($empresaModel);
        header('Location: ../../dash/minhaEmpresa.php?idEmpresa='.$arrayEmpresa['idEmpresa']);
    }
?>