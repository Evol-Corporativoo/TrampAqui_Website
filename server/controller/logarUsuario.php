<?php 

    session_start();

    //DAO
    require_once '../dao/DaoUsuario.php';
    require_once '../dao/DaoEmpresa.php';

    //Model
    require_once '../model/Usuario.php';
    require_once '../model/Empresa.php';

    $usuarioModel = new Usuario();
    $usuarioModel->setEmail($_POST['emailLogin']);
    $usuarioModel->setSenha($_POST['senhaLogin']);                
    $resultado = DaoUsuario::logar($usuarioModel, 0);
    print_r($resultado);
    if($resultado[0] == true){
        $dados = $resultado[1];
        $usuario = new Usuario();
        $usuario->setId($dados['idUsuario']);
        $usuario->setNome($dados['nomeUsuario']);
        $usuario->setEmail($dados['emailUsuario']);
        $usuario->setCpf($dados['cpfUsuario']);
        $usuario->setSenha($dados['senhaUsuario']);
        $usuario->setAcesso($dados['tipoUsuario']);

        $empresas = DaoEmpresa::procurarPorUsuario($usuario);
        $_SESSION['empresas'] = serialize($empresas);

        $_SESSION['usuario'] = serialize($usuario);

        header('Location: ../../dash/index.php');

    } else {
        header('Location: ../../login/index.php');
    }

?>