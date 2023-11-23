<?php

    session_start();
    require_once('../server/model/Usuario.php');
    require_once('../server/dao/DaoEmpresa.php');

    if($_SESSION['usuario'] == null || unserialize($_SESSION['usuario'])->getAcesso()!=1){
        header('Location: ../login/index.php');
    }

    if (isset($_SESSION['usuario'])) {
        
        $usuarioLogado = unserialize($_SESSION['usuario']);
        $nomeUsuario = $usuarioLogado->getNome();
        $empresas = unserialize($_SESSION['empresas']);
        if($empresas == 0){
            $_SESSION['qtde_empresas'] = 0;
        } else {
            $_SESSION['qtde_empresas'] = count($empresas);
        }
        
        
    } else {
        $nomeUsuario = "Visitante";
    }

?>