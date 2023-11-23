<?php

    require_once('../model/Conexao.php');
    require_once('../model/Usuario.php');

    class DaoUsuario{

        public static function cadastrar(Usuario $usuario){

            $conexao = Conexao::conectar();

            $queryInsert = 'INSERT INTO tbUsuario(nomeUsuario, cpfUsuario, emailUsuario, senhaUsuario, tipoUsuario)
                       VALUES (?,?,?,?,?)';
                       
            $prepare = $conexao->prepare($queryInsert);
            $prepare->bindValue(1, $usuario->getNome());
            $prepare->bindValue(2, $usuario->getCpf());
            $prepare->bindValue(3, $usuario->getEmail());
            $prepare->bindValue(4, password_hash($usuario->getSenha(),PASSWORD_DEFAULT));
            $prepare->bindValue(5, $usuario->getAcesso());

            $prepare->execute();

            return true;

        }

        public static function logar(Usuario $usuario, $dado){

            $conexao = Conexao::conectar();
            if($dado == 0){
                $select = 'SELECT COUNT(idUsuario) AS contagem FROM tbUsuario WHERE emailUsuario = ?';
                $prepare = $conexao->prepare($select);
                $prepare->bindValue(1,$usuario->getEmail());
                $select2 = 'SELECT idUsuario, nomeUsuario, cpfUsuario, emailUsuario, telefoneUsuario, dataNascUsuario, tipoUsuario, senhaUsuario FROM tbUsuario WHERE emailUsuario = ?';
                $prepare2 = $conexao->prepare($select2);
                $prepare2->bindValue(1, $usuario->getEmail());  
            } else {
                $select = 'SELECT COUNT(idUsuario) AS contagem FROM tbUsuario WHERE cpfUsuario = ?';
                $prepare = $conexao->prepare($select);
                $prepare->bindValue(1,$usuario->getCpf());
                $select2 = 'SELECT idUsuario, nomeUsuario, cpfUsuario, emailUsuario, telefoneUsuario, dataNascUsuario, tipoUsuario, senhaUsuario FROM tbUsuario WHERE cpfUsuario = ?';
                $prepare2 = $conexao->prepare($select2);
                $prepare2->bindValue(1, $usuario->getCpf());
            }

            $prepare->execute();
            $count = $prepare->fetch(PDO::FETCH_ASSOC);
            $prepare2->execute();
            $lista = $prepare2->fetch(PDO::FETCH_ASSOC);

            if($count['contagem']>0){

                if(password_verify($usuario->getSenha(), $lista['senhaUsuario'])==true){
                    return [true,$lista];
                } else {
                    return false;
                }

            } else {
                return false;
            }

        }

        public static function buscarId(Usuario $usuario){
            $conexao = Conexao::conectar();

            $select = 'SELECT idUsuario FROM tbUsuario WHERE cpfUsuario = ? or emailUsuario = ?';
            $prepare = $conexao->prepare($select);
            $prepare->bindValue(1, $usuario->getCpf());
            $prepare->bindValue(2, $usuario->getEmail());
            $prepare->execute();
            $resultado = $prepare->fetch(PDO::FETCH_ASSOC);

            return $resultado['idUsuario'];

        }

        public static function procurarCPF(Usuario $usuario){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT * FROM tbusuario WHERE cpfUsuario = ?";

            $prepareStatement = $conexao->prepare($querySelect);

            $prepareStatement->bindValue(1, $usuario->getCpf());

            $prepareStatement->execute();

            $resultado = $prepareStatement->fetch(PDO::FETCH_ASSOC);

            if($resultado != null){
                return true;
            }
        }

    }

?>