<?php 

    session_start();
    

    //Controller
    require_once './validarCpf.php';
    $usuarioController = new validarCpf();

    //DAO
    require_once '../dao/DaoUsuario.php';
    require_once '../dao/DaoEmpresa.php';

    //Model
    require_once '../model/Usuario.php';
    require_once '../model/Conexao.php';
    $usuarioModel = new Usuario();
    $usuarioModel->setNome($_POST['nomeUsuario']);
    $usuarioModel->setCpf($_POST['cpfUsuario']);
    $usuarioModel->setEmail($_POST['emailUsuario']);
    $usuarioModel->setSenha($_POST['senhaUsuario']);
    $usuarioModel->setAcesso(1);

    DaoUsuario::cadastrar($usuarioModel);
    $usuarioModel->setId(DaoUsuario::buscarId($usuarioModel));
    $resultado = DaoUsuario::logar($usuarioModel, 0);
    if($resultado[0]==true){
        $_SESSION['usuario'] = serialize($usuarioModel);
        header('Location: ../../dash/index.php');
        $_SESSION['empresas'] = serialize(0);
    } else {
        header('Location: ../../login/index.php');
    }

?>