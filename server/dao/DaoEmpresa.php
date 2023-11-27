<?php
 
    require_once(__DIR__.'/../model/Conexao.php');
    require_once(__DIR__.'/../model/Empresa.php');
    require_once(__DIR__.'/../model/Usuario.php');

    class DaoEmpresa{

        public static function cadastrar(Empresa $empresa){

            $conexao = Conexao::conectar();

            $queryInsert = 'INSERT INTO tbempresa(nomeEmpresa, cnpjEmpresa, cepEmpresa, cidadeEmpresa, ufEmpresa, bairroEmpresa, logradouroEmpresa, numeroEmpresa, complementoEmpresa, telefoneEmpresa, descEmpresa, idUsuario)
                       VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
                       
            $prepare = $conexao->prepare($queryInsert);
            $prepare->bindValue(1, $empresa->getNome());
            $prepare->bindValue(2, $empresa->getCnpj());
            $prepare->bindValue(3, $empresa->getCep());
            $prepare->bindValue(4, $empresa->getCidade());
            $prepare->bindValue(5, $empresa->getUf());
            $prepare->bindValue(6, $empresa->getBairro());
            $prepare->bindValue(7, $empresa->getLogradouro());
            $prepare->bindValue(8, $empresa->getNumero());
            $prepare->bindValue(9, $empresa->getComplemento());
            $prepare->bindValue(10, $empresa->getTelefone());
            $prepare->bindValue(11, $empresa->getAreaAtuacao());
            $prepare->bindValue(12, $empresa->getIdUsuario());

            try{
                $prepare->execute();
                return true;
            } catch(Exception $e) {
                return $e;
            }    

        }

        public static function procurarCNPJ(Empresa $empresa){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT * FROM tbempresa WHERE cnpjEmpresa = ?";

            $prepareStatement = $conexao->prepare($querySelect);
            $prepareStatement->bindValue(1, $empresa->getCnpj());
            $prepareStatement->execute();

            $resultado = $prepareStatement->fetch(PDO::FETCH_ASSOC);

            if($resultado != null){
                return $resultado;
            }
        }

        public static function contagemEmpresas(Usuario $usuario){

            $conexao = Conexao::conectar();
            $select = 'SELECT COUNT(idEmpresa) AS qtde FROM tbEmpresa WHERE idUsuario = ?';
            $prepare = $conexao->prepare($select);
            $prepare->bindValue(1, $usuario->getId());
            $prepare->execute();
            $qtde = $prepare->fetch(PDO::FETCH_ASSOC);

            return $qtde['qtde'];

        }

        public static function procurarId($id){

            $conexao = Conexao::conectar();
            $select = 'SELECT * FROM tbempresa WHERE idEmpresa = ?';
            $prepare = $conexao->prepare($select);
            $prepare->bindValue(1, $id);
            try{

                $prepare->execute();
                $lista = $prepare->fetch(PDO::FETCH_ASSOC);
                return [true, $lista];

            } catch (Exception $e){
                return false;
            }

        }

        public static function procurarPorUsuario(Usuario $usuario){

            $conexao = Conexao::conectar();

            $querySelect = "SELECT * FROM tbempresa WHERE idUsuario = ?";

            $prepareStatement = $conexao->prepare($querySelect);
            $prepareStatement->bindValue(1, $usuario->getId());
            $prepareStatement->execute();

            try{
                $resultado = $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }catch(Exception $e){
                return $e;
            }

            

        }

    }

?>